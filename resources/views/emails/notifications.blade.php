<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>{{ $subtitle or 'Welcome to DigitalTown'}}</title> 
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
                    <th><a href="https://digitaltown.com/"><img src="https://s3-us-west-2.amazonaws.com/dt-media-assets/email_templates/logo.png" alt="" title="" ></a></th>
                </tr>
                <tr>
                    <th style="line-height:8px; height:8px;">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="background:url(https://s3-us-west-2.amazonaws.com/dt-media-assets/email_templates/banner.jpg);background-repeat:no-repeat; text-align:center;">
                         <h1 style="font-size:30px; color:#ffffff; margin:49px 0 14px 0; padding:0px; text-transform:uppercase; font-weight:400;font-family: 'Century Gothic'; 
                         font-weight:bold; letter-spacing:2px;">{{ $title or 'CONGRATULATIONS'}}</h1>
                         <span><img src="https://s3-us-west-2.amazonaws.com/dt-media-assets/email_templates/seprator.png" alt="" title="" ></span>
                         <p style=" margin:28px 0 60px 0; color:#fff; font-size:20px; font-style:italic; font-weight:300;font-family: 'Century Gothic';">{{ $subtitle or 'Welcome to DigitalTown'}}</p>
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
              <td style="line-height:2px; height:2px;">&nbsp;</td>
              </tr>
            <tr>
              <td style="padding:0 37px 0 28px;" class="no-padding"><a href="https://digitaltown.com/"><img src="https://s3-us-west-2.amazonaws.com/dt-media-assets/email_templates/logo.png" alt="" title="" ></a></td>
              </tr>
            <tr>
              <td style="line-height:70px; height:70px;">&nbsp;</td>
              </tr>
            <tr>
              <td style="padding:18px 0 16px 0; text-align:center; border-top:1px solid #eeeeee; border-bottom:1px solid #eeeeee;">
                <span style="font-size:16px; color:#28282e; font-weight:bold; vertical-align:middle;mso-line-height-rule:exactly; line-height:26px;">Follow us on</span>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <a href="https://www.facebook.com/Digitaltownsmartcities/"><img src="https://s3-us-west-2.amazonaws.com/dt-media-assets/email_templates/fb-icon.png" alt="facebook" title="" style="vertical-align:bottom" ></a>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <a href="https://twitter.com/Digi_Town"><img src="https://s3-us-west-2.amazonaws.com/dt-media-assets/email_templates/twitter-icon.png" alt="twitter" title="" style="vertical-align:bottom" ></a>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <a href="https://www.linkedin.com/company-beta/372967/"><img src="https://s3-us-west-2.amazonaws.com/dt-media-assets/email_templates/linked-in.png" alt="linkedin" title="" style="vertical-align:bottom" ></a>
                </td>
              </tr>
            <tr>
              <td style="line-height:15px; height:15px;">&nbsp;</td>
              </tr>
            <tr>
              <td style="font-size:13px; line-height:24px; color:#444444; padding:0 40px 0 30px; text-align:center; letter-spacing:-0.1px;">
                &copy; 2017 DigitalTown Inc - DigitalTown.com. All Rights Reserved. 
                </td>
              </tr>
            <tr>
                <td style="line-height:16px; height:16px;">&nbsp;</td>
            </tr>
            <tr>
                <td style="line-height:11px;height:11px;background:#f9f9f9;">&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align:center;background:#f9f9f9;">
                    @if(isset($why_url))
                    <a href="{{$why_url}}" style="color:#888888; font-size:12px; text-decoration:none; padding-right:6px;">why did I get this?</a>
                        <span style="color:#888888; font-size:12px; padding-right:6px;">|</span>
                    @endif
                    @if(isset($unsubscribe_url))
                    <a href="{{$unsubscribe_url}}" style="color:#888888; font-size:12px; text-decoration:none;  padding-right:6px;">unsubscribe from this list</a>
                    <span style="color:#888888; font-size:12px; padding-right:6px;">|</span>
                    @endif
                    @if(isset($preferences_url))
                    <a href="{{$preferences_url}}" style="color:#888888; font-size:12px; text-decoration:none; padding:0;">update subscription preferences </a>
                    @endif
                </td>
            </tr>
            <tr>
                <td style="line-height:19px;height:19px;background:#f9f9f9;">&nbsp;</td>
            </tr>
                </tbody>
    </table>
     
</body>
</html>