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
        <table border="0" cellpadding="0" cellspacing="0"
               style="outline: 0; width: 100%; min-width: 100%; height: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; box-sizing: border-box; color: #000000; border-top-style: solid !important; margin: 0; border-color: #cbd5e0; border-width: 2px 0 0; padding: 0 16px;">
            <tbody style="width: 100%; max-width: 600px; margin: 0 auto; display: block;">
                <tr>
                    <td style="text-align: center; padding: 45px 0;">
                        @include('rocket::mail.templates.header', ['url' => config('app.url')])
                    </td>
                </tr>
                <tr>
                    <td class="content">
                        <div class="card py-9">
                            <div class="card-body px-4">
                                @yield('content')
                            </div>
                        </div>
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
