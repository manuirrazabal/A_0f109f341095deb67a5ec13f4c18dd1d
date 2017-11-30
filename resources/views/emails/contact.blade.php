<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>{{ $subtitle or 'Notificaciones Anuncios'}}</title> 
<style>
    @font-face {
    font-family: 'Century Gothic';
    src: url('fonts/CenturyGothic.eot');
    src: url('fonts/CenturyGothic.eot?#iefix') format('embedded-opentype'),
        url('fonts/CenturyGothic.woff2') format('woff2'),
        url('fonts/CenturyGothic.woff') format('woff'),
        url('fonts/CenturyGothic.ttf') format('truetype'),
        url('fonts/CenturyGothic.svg#CenturyGothic') format('svg');
    font-weight: normal;
    font-style: normal;
}
    img { border:0px !important;}
    @media only screen and (max-width: 600px) {
        table { max-width:100% !important; width:100% !important;}
        img { max-width:100% !important;}
        .visit-browser { display:block !important;}
        .no-padding { padding:0 15px !important;}
    }
</style>
</head>
<body style="margin:0px; padding:0px;background:#f9f9f9; ">
    <table border="0" cellspacing="0" cellpadding="0" align="center" style="width:600px;margin:0 auto; background:#fff;font-family:Tahoma, Geneva, sans-serif;">
        <thead>
            <tr>
                <tr>
                    <th style="line-height:48px;height:48px;background:#f9f9f9;"></th>
            </tr>
                <tr>
                    <th style="line-height:18px;height:18px;background:#f9f9f9;">&nbsp;</th>
                </tr>
            </tr>
            <tr>
                <th style="line-height:17px; height:17px;">&nbsp;</th>
            </tr>
            <tr>
                <th><a href="url('/')"><img src="{{ url('/img/logo.png') }}" alt="Logo"></a></th>
            </tr>
            <tr>
                <th style="line-height:8px; height:8px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                     <h1 style="font-size:30px; color:#ffffff; margin:49px 0 14px 0; padding:0px; text-transform:uppercase; font-weight:400;font-family: 'Century Gothic'; 
                     font-weight:bold; letter-spacing:2px;">{{ 'Contacto' }}</h1>
                     <span><img src="https://s3-us-west-2.amazonaws.com/dt-media-assets/email_templates/seprator.png" alt="" title="" ></span>
                     <p style=" margin:28px 0 60px 0; color:#fff; font-size:20px; font-style:italic; font-weight:300;font-family: 'Century Gothic';">{{ $title or 'Haz recibido un nuevo correo de contacto' }}</p>

                     <table border="0" style="width: 80%; margin-left: 10px;">
                        <tr>
                            <td><b>Nombre</b></td>
                            <td>{{ $nombre }}</td>
                        </tr>
                        <tr>
                            <td><b>Email</b></td>
                            <td>{{ $email }}</td>
                        </tr>
                        <tr>
                            <td><b>Mensaje</b></td>
                            <td>{{ $message }}</td>
                        </tr>
                     </table>
                </td>
            </tr>
            <tr>
                <td style="line-height:27px; height:27px;">&nbsp;</td>
            </tr>
            <tr>
                <td style="line-height:24px; height:24px;">&nbsp;</td>
            </tr>
            <tr>
                <td style="line-height:10px; height:10px;">&nbsp;</td>
            </tr>
            <tr>
                <td style="line-height:11px;height:11px;background:#f9f9f9;">&nbsp;</td>
            </tr>
        </tbody>
    </table>
     
</body>
</html>