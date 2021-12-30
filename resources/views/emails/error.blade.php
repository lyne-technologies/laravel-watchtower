<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
        /* -------------------------------------
            GLOBAL RESETS
        ------------------------------------- */
        img {
            border: none;
            -ms-interpolation-mode: bicubic;
            max-width: 100%;
        }
        body {
            background-color: #f6f6f6;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 14px;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        table {
            border-collapse: separate;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            width: 100%; }
        table td {
            font-family: sans-serif;
            font-size: 14px;
            vertical-align: top;
        }
        /* -------------------------------------
            TYPOGRAPHY
        ------------------------------------- */
        p,
        ul,
        ol {
            font-family: sans-serif;
            font-size: 14px;
            font-weight: normal;
            margin: 0;
            margin-bottom: 15px;
        }
        p li,
        ul li,
        ol li {
            list-style-position: inside;
            margin-left: 5px;
        }
        a {
            color: #3498db;
            text-decoration: underline;
        }

        /* -------------------------------------
            CUSTOM
        ------------------------------------- */
        table, td, div, h1, p {font-family: Arial, sans-serif;}
        .text-center{text-align: center;}
        .logo{
            font-size: 15px;
            line-height: 19px;
        }
        .logo span{background-color: #F97316}
        .foot-note{
            text-align: center;
            margin-top: 20px;
            color: #d3d3d3;
        }
    </style>
</head>
<body style="background-color: #f5f5f5; min-height: 100%; padding: 10px 0px;">
    <div style="max-width: 600px; margin: 0 auto; ">
        <p class="logo">Laravel<br/><span>Watchtower</span></p>
        <div style="background-color: white; padding: 15px;">
            An error occurred on: {{config('app.url')}}

            <p style="margin-bottom: 0px;font-size: 18px;"><strong>{{$errorMessage}}</strong></p>
            <p style="margin-top: 0px;font-size: 15px;margin-bottom: 20px;">{{$file}}</p>

            <div style="background-color: #f5f5f5;">
                <table style="width: 100%; padding: 4px 5px;">
                    <tbody>
                        @foreach($location as $lineData)
                            <tr style="{{$lineData['problem'] ? 'background-color: #ffedd5;' : ''}} width: 100%;">
                                <td style="padding:3px; font-size: 14px; text-align: center;">{{$lineData['number']}}</td>
                                <td style="padding:3px; font-size: 14px">{{$lineData['line']}}</td>
                            </tr>
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
        <p class="foot-note">Laravel Watchtower ♥ Lyne Technologies</p>
    </div>
</body>
</html>