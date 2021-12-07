<?php

namespace LyneTechnologies\LaravelWatchtower\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Error extends Mailable
{
    use Queueable, SerializesModels;

    public $errorMessage;
    public $file;
    public $location;
    public $localLink;

    public function __construct($errorMessage, $file, $location, $localLink)
    {
        $this->errorMessage = $errorMessage;
        $this->location = $location;
        $this->file = $file;
        $this->localLink = $localLink;
    }

    public function build()
    {
        return $this->view('laravel-watchtower::emails.error');
    }
}