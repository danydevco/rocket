<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <!-- Compiled with Bootstrap Email version: 1.4.0 -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="x-apple-disable-message-reformatting">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        @include('rocket::mail.templates.style')

    </head>
    <body>
        <table class="wrapper" border="0" cellpadding="0" cellspacing="0">
            <tbody class="wrap">
                <tr>
                    <td class="header">
                        @include('rocket::mail.templates.header', ['url' => config('app.url')])
                    </td>
                </tr>
                <tr>
                    <td class="content">
                        @yield('content')
                    </td>
                </tr>
                <tr>
                    <td class="footer">
                        @include('rocket::mail.templates.footer', ['url' => config('app.url')])
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
