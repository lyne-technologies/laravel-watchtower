<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
        table, td, div, h1, p {font-family: Arial, sans-serif;}
        .text-center{text-align: center;}
    </style>
</head>
<body style="background-color: #f5f5f5; min-height: 100%; padding: 10px 0px;">
    <div style="max-width: 600px; margin: 0 auto; ">
        <p>Laravel<br/><span style="background-color: #F97316">Watchtower</span></p>
        <div style="background-color: white; padding: 15px;">
            An error occurred on: {{config('app.url')}}

            <p style="margin-bottom: 0px;font-size: 18px;"><strong>{{$errorMessage}}</strong></p>
            <p style="margin-top: 0px;font-size: 15px;margin-bottom: 20px;">{{$file}}</p>

            <div style="background-color: #f5f5f5;">
                <table style="width: 100%; padding: 5px 0px;">
                    <tbody>
                        @foreach($location as $lineData)
                            <tr style="{{$lineData['problem'] ? 'background-color: #ffedd5;' : ''}} width: 100%;">
                                <td style="padding:4px 3px; font-size: 14px; text-align: center;">{{$lineData['number']}}</td>
                                <td style="padding:4px; font-size: 14px">{{$lineData['line']}}</td>
                            </tr>
                            <p></p>
                        @endforeach
                    </tbody>
                </table>

            </div>
            @if($localLink)
                <div style="margin: 25px 0px 10px; text-align:center">
                    <a href="{{$localLink}}" style="background-color: #F97316;padding: 8px 10px;text-decoration: none;color: white;">View Error</a>
                </div>
            @endif
        </div>
        <p class="text-center" style="color: #d3d3d3">Laravel Watchtower ♥ Lyne Technologies</p>
    </div>
</body>
</html>