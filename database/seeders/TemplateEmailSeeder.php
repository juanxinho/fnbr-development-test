<?php

namespace Database\Seeders;

use App\Models\Funiber\Template\TemplateEmail;
use Illuminate\Database\Seeder;

class TemplateEmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Template de confirmación',
                'description' => 'Template de confirmación',
                'short_code' => 'T1',
                'template' => '<html xmlns="http://www.w3.org/1999/xhtml">

                <head>
                    <meta http-equiv="content-type" content="text/html; charset=utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
                    <meta name="format-detection" content="telephone=no" />
                
                    <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
                                    https://github.com/konsav/email-templates/  -->
                
                    <style>
                        /* Reset styles */
                        body {
                            margin: 0;
                            padding: 0;
                            min-width: 100%;
                            width: 100% !important;
                            height: 100% !important;
                        }
                
                        body,
                        table,
                        td,
                        div,
                        p,
                        a {
                            -webkit-font-smoothing: antialiased;
                            text-size-adjust: 100%;
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%;
                            line-height: 100%;
                        }
                
                        table,
                        td {
                            mso-table-lspace: 0pt;
                            mso-table-rspace: 0pt;
                            border-collapse: collapse !important;
                            border-spacing: 0;
                        }
                
                        img {
                            border: 0;
                            line-height: 100%;
                            outline: none;
                            text-decoration: none;
                            -ms-interpolation-mode: bicubic;
                        }
                
                        #outlook a {
                            padding: 0;
                        }
                
                        .ReadMsgBody {
                            width: 100%;
                        }
                
                        .ExternalClass {
                            width: 100%;
                        }
                
                        .ExternalClass,
                        .ExternalClass p,
                        .ExternalClass span,
                        .ExternalClass font,
                        .ExternalClass td,
                        .ExternalClass div {
                            line-height: 100%;
                        }
                
                        /* Rounded corners for advanced mail clients only */
                        @media all and (min-width: 560px) {
                            .container {
                                border-radius: 2px;
                                -webkit-border-radius: 2px;
                                -moz-border-radius: 2px;
                                -khtml-border-radius: 2px;
                            }
                        }
                
                        /* Set color for auto links (addresses, dates, etc.) */
                        a,
                        a:hover {
                            color: #127DB3;
                        }
                
                        .footer a,
                        .footer a:hover {
                            color: #999999;
                        }
                    </style>
                
                    <!-- MESSAGE SUBJECT -->
                    <title>Message Subject Goes Here</title>
                
                </head>
                
                <!-- BODY -->
                <!-- Set message background color (twice) and text color (twice) -->
                
                <body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
                                    background-color: #FFFFFF;
                                    color: #000000;" bgcolor="#FFFFFF" text="#000000">
                
                    <!-- SECTION / BACKGROUND -->
                    <!-- Set message background color one again -->
                    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0"
                        style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background">
                        <tr>
                            <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;"
                                bgcolor="#FFFFFF">
                
                                <!-- WRAPPER / CONTEINER -->
                                <!-- Set conteiner background color -->
                                <table border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
                                    max-width: 560px;" class="container">
                
                                    <tr>
                                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 26px; font-weight: bold; line-height: 130%;
                padding-top: 25px;
                color: #000000;
                font-family: sans-serif;" class="header"> <a target="_blank" style="text-decoration: none;" href="" ""><img border="0"
                                                    vspace="0" hspace="0" src="https://www.funiber.org/themes/funiber/logos/es.svg"
                                                    width="250" height="75" alt="Logo" title="Logo"
                                                    style="
                color: #000000;
                font-size: 10px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;" /></a>
                                        </td>
                                    </tr>
                                    <!-- HEADER -->
                                    <!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
                                    <tr>
                                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 26px; font-weight: bold; line-height: 130%;
                                            padding-top: 25px;
                                            color: #000000;
                                            font-family: sans-serif;" class="header"> Tu solicitud de información </td>
                                    </tr>
                
                                    <!-- SUBHEADER -->
                                    <!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
                
                
                                    <!-- HERO IMAGE -->
                                    <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including "auto"). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
                                    <tr>
                
                                    </tr>
                
                                    <!-- PARAGRAPH -->
                                    <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
                                    <tr>
                                        <td align="justify" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 200; line-height: 160%;
                                            padding-top: 25px;
                                            color: #000000;
                                            font-family: sans-serif;" class="paragraph">
                                            Hola {{fullname}}.- <br> <br>
                
                                            Solicitastes información del área {{area}} con el programa {{program}} con los siguientes
                                            datos.
                                        </td>
                                    </tr>
                
                                    <!-- BUTTON -->
                                    <!-- Set button background color at TD, link/text color at A and TD, font family ("sans-serif" or "Georgia, serif") at TD. For verification codes add "letter-spacing: 5px;". Link format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Button-Name}}&utm_campaign={{Campaign-Name}} -->
                                    <tr>
                                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                            padding-top: 25px;
                                            padding-bottom: 5px;" class="button">
                                            <TABLE align="center" style="font-size: 20px;" width="500" height="100" BORDER>
                                                <TR>
                                                    <TH align="left" style="font-weight: bolder;" bgcolor="#E0DBDB">
                                                        <font color="#909192">Email:</font>
                                                    </TH>
                                                    <TD width="240">{{emailUser}}</TD>
                                                </TR>
                                                <TR>
                                                <TR>
                                                    <TH align="left" bgcolor="#E0DBDB">
                                                        <font color="#909192">Teléfono:</font>
                                                    </TH>
                                                    <TD>{{phoneUser}}</TD>
                                                </TR>
                                                <TR>
                                                    <TH align="left" bgcolor="#E0DBDB">
                                                        <font color="#909192">Pais: </font>
                                                    </TH>
                                                    <TD>{{countryUser}} </TD>
                                                </TR>
                                                <TR>
                                                    <TH align="left" bgcolor="#E0DBDB">
                                                        <font color="#909192">Estado: </font>
                                                    </TH>
                                                    <TD>{{stateUser}} </TD>
                                                </TR>
                                                <TR>
                                                    <TH align="left" bgcolor="#E0DBDB">
                                                        <font color="#909192">Ciudad: </font>
                                                    </TH>
                                                    <TD>{{cityUser}} </TD>
                                                </TR>
                                                <TR>
                                                    <TH align="left" bgcolor="#E0DBDB">
                                                        <font color="#909192">Comentarios: </font>
                                                    </TH>
                                                    <TD>{{commentUser}} </TD>
                                                </TR>
                                            </TABLE>
                                        </td>
                                    </tr>
                
                                    <!-- LINE -->
                                    <!-- Set line color -->
                                    <tr>
                                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                            padding-top: 25px;" class="line">
                                            <hr color="#E0E0E0" align="center" width="100%" size="1" noshade
                                                style="margin: 0; padding: 0;" />
                                        </td>
                                    </tr>
                
                                    <!-- LIST -->
                                    <tr>
                                        <td align="center" valign="top"
                                            style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 3.25%;"
                                            class="list-item">
                                            <table align="center" border="0" cellspacing="0" cellpadding="0"
                                                style="width: inherit; margin: 0; padding: 0; border-collapse: collapse; border-spacing: 0;">
                
                                                <!-- LIST ITEM -->
                
                
                                                <!-- LIST ITEM -->
                                                <tr>
                
                                                </tr>
                
                                            </table>
                                        </td>
                                    </tr>
                
                                    <!-- LINE -->
                                    <!-- Set line color -->
                                    <tr>
                                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                            padding-top: 25px;" class="line">
                                            <hr color="#E0E0E0" align="center" width="100%" size="1" noshade
                                                style="margin: 0; padding: 0;" />
                                        </td>
                                    </tr>
                
                
                
                                    <!-- End of WRAPPER -->
                                </table>
                
                                <!-- WRAPPER -->
                                <!-- Set wrapper width (twice) -->
                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
                                    max-width: 560px;" class="wrapper">
                
                                    <!-- SOCIAL NETWORKS -->
                                    <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 -->
                                    <tr>
                                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                            padding-top: 25px;" class="social-icons">
                                            <table width="256" border="0" cellpadding="0" cellspacing="0" align="center"
                                                style="border-collapse: collapse; border-spacing: 0; padding: 0;">
                                                <tr>
                
                                                    <!-- ICON 1 -->
                                                    <td align="center" valign="middle"
                                                        style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;">
                                                        <a target="_blank"
                                                            href="https://raw.githubusercontent.com/konsav/email-templates/"
                                                            style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                                                    color: #000000;" alt="F" title="Facebook" width="44" height="44"
                                                                src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/facebook.png"></a>
                                                    </td>
                
                                                    <!-- ICON 5 -->
                                                    <td align="center" valign="middle"
                                                        style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;">
                                                        <a target="_blank"
                                                            href="https://raw.githubusercontent.com/konsav/email-templates/"
                                                            style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                                                    color: #000000;" alt="I" title="Instagram" width="44" height="44"
                                                                src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/instagram.png"></a>
                                                    </td>
                
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                
                                    <!-- FOOTER -->
                                    <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
                                    <tr>
                                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 12px; font-weight: 200; line-height: 150%;
                                            padding-top: 20px;
                                            padding-bottom: 20px;
                                            color: #999999;
                                            font-family: sans-serif;" class="footer">
                
                                            ©2022. Todos los derechos reservados
                
                                            <!-- ANALYTICS -->
                                            <!-- http://www.google-analytics.com/collect?v=1&tid={{UA-Tracking-ID}}&cid={{Client-ID}}&t=event&ec=email&ea=open&cs={{Campaign-Source}}&cm=email&cn={{Campaign-Name}} -->
                                            <img width="1" height="1" border="0" vspace="0" hspace="0"
                                                style="margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;"
                                                src="https://raw.githubusercontent.com/konsav/email-templates/master/images/tracker.png" />
                
                                        </td>
                                    </tr>
                
                                    <!-- End of WRAPPER -->
                                </table>
                
                                <!-- End of SECTION / BACKGROUND -->
                            </td>
                        </tr>
                    </table>
                
                </body>
                
                </html>',
            ],

        ];

        foreach ($data as $value) {

            TemplateEmail::create([
                'name' => $value['name'],
                'description' => $value['description'],
                'short_code' => $value['short_code'],
                'template' => $value['template'],
            ]);
        }
    }
}
