<?php

namespace LyneTechnologies\LaravelWatchtower;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
use LyneTechnologies\LaravelWatchtower\Mail\Error;

class LaravelWatchtower
{
    private $errorLocation;
    private $localLink = null;

    public function capture($exception){


//        dd(__METHOD__,
//            "An error has occurred: ",
//            $exception->getMessage(),
//            file($exception->getFile(), FILE_IGNORE_NEW_LINES)[$exception->getLine() - 3],
//            file($exception->getFile(), FILE_IGNORE_NEW_LINES)[$exception->getLine() - 2],
//            file($exception->getFile(), FILE_IGNORE_NEW_LINES)[$exception->getLine() - 1],
//            file($exception->getFile(), FILE_IGNORE_NEW_LINES)[$exception->getLine()],
//            file($exception->getFile(), FILE_IGNORE_NEW_LINES)[$exception->getLine() + 1],
//            $exception->getTrace(),
//        );
        
        self::consumeException($exception);

        if(config('laravel-watchtower.notifications.local.active')){
            self::local($exception);
        }

        if(config('laravel-watchtower.notifications.email.active')){
           self::email($exception);
        }

        if(config('laravel-watchtower.notifications.slack.active')){
            self::slack($exception);
        }

        return true;
    }

    private function consumeException($exception)
    {
        for ($line = -3; $line <= 3; $line++) {
            try {
                $this->errorLocation[] = [
                    'problem' =>  $line == 0,
                    'number' => $exception->getLine()+$line,
                    'line' => file($exception->getFile(), FILE_IGNORE_NEW_LINES)[($exception->getLine()+$line)-1]
                ];
            }catch (\Exception $e){
                //Should only hit here if the file doesn't have the key $exception->getLine() + $line.
            }
        }
    }

    private function email($exception)
    {
        $emails = explode(',', config('laravel-watchtower.notifications.email.recipients'));

        foreach($emails as $email){
            Mail::to($email)->send(new Error($exception->getMessage(),$exception->getFile(), $this->errorLocation, $this->localLink));
        }

    }

    private function local($exception)
    {
        $stackTrace = [];

        $stackTrace[] = [
            'file'  =>  $exception->getFile(),
            'line'  =>  $exception->getLine(),
            'content'   => self::buildFileContentArray($exception->getFile(), $exception->getLine())
        ];

        foreach($exception->getTrace() as $item){
            if(isset($item['file'])){
                $stackTrace[] = [
                    'file'  =>  $item['file'],
                    'line'  =>  $item['line'],
                    'content'   => self::buildFileContentArray($item['file'], $item['line'])
                ];
            }
        }

        $newError = new \LyneTechnologies\LaravelWatchtower\Models\Error();
        $newError->message = $exception->getMessage();
        $newError->file = $exception->getFile();
        $newError->stack_trace = $stackTrace;
        $newError->save();

        $this->localLink = route(config('laravel-watchtower.notifications.local.routes.show.name'), ['error'=>$newError->id]);

        return;
    }

    private function buildFileContentArray($fileName, $erroredLine){
        $data = [];
        for ($line = -7; $line <= 7; $line++) {
            try {
                $data[] = [
                    'number' => ($erroredLine + $line)+1,
                    'code' => file($fileName, FILE_IGNORE_NEW_LINES)[$erroredLine + $line]
                ];
            }catch (\Exception $e){
                //Should only hit here if the file doesn't have the key $item['line'] + $line.
            }
        }
        return $data;
    }

    private function slack($exception)
    {
        $error = implode("\n", Arr::pluck($this->errorLocation, 'line'));

        $payload = [
            'text' => "An error has occurred on: " . config('app.url'),
            "blocks" => [
                [
                    "type"=> "section",
                    "text"=> [
                        "type"=> "mrkdwn",
                        "text"=> 'An error has occurred on: ' . config('app.url') . '',
                    ]
                ],
                [
                    "type"=> "section",
                    "text"=> [
                        "type"=> "mrkdwn",
                        "text"=> "*{$exception->getMessage()}*",
                    ]
                ],
                [
                    "type"=> "section",
                    "text"=> [
                        "type"=> "mrkdwn",
                        "text"=> "*File:* {$exception->getFile()}: `{$exception->getLine()}`",
                    ]
                ],
                [
                    "type"=> "section",
                    "text"=> [
                        "type"=> "mrkdwn",
                        "text"=> "``` {$error} ```"
                    ]
                ]
            ],

            'username' => 'Laravel Watchtower',
            'icon_emoji' => ':rotating_light:',
            'channel' => config('laravel-watchtower.notifications.slack.channel')
        ];

        if($this->localLink){
            $payload['blocks'] = array_merge($payload['blocks'], [
                [
                    "type" => "actions",
                    "elements" => [
                        [
                            "type" => "button",
                            "text" => [
                            "type" => "plain_text",
                                "text" => "View Error",
                                "emoji" => true
                            ],
                            "url" => $this->localLink,
                            'style' => 'primary'
                        ]
                    ]
                ],
                [
                    "type" => "divider"
                ]
            ]);
        } else {
            $payload['blocks'] = array_merge($payload['blocks'], [
                [
                    "type" => "divider"
                ]
            ]);
        }

        Http::post('https://hooks.slack.com/services/'.config('laravel-watchtower.notifications.slack.hook'), $payload);
    }

}
