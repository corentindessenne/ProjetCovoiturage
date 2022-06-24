<?php

//On récupère le mail a modifier et l'emplacement de ce dernier dans les fichiers en fonction du formulaire remplit
if($_POST['mail']=='DeleteAccount'){
    $file='../mails/template_mail_suppression_compte.php';
    $newfile="<!DOCTYPE html>
    <html lang='fr'>
    <head>
        <title>Confirmation de suppression de compte - LBR Covoiturage</title>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'/>
        <style type='text/css'>
            /* FONTS */
            @media screen {
                @font-face {
                    font-family: 'Cereal';
                    src: url('../fonts/Cereal/airbnbcereal_w_lt.woff2') format('woff2'),
                    url('../fonts/Cereal/airbnbcereal_w_lt.woff') format('woff');
                    font-weight: auto;
                    font-style: normal;
                }
    
                @font-face {
                    font-family: 'Cereal';
                    src: url('../fonts/Cereal/airbnbcereal_w_md.woff2') format('woff2'),
                    url('../fonts/Cereal/airbnbcereal_w_md.woff') format('woff');
                    font-weight: normal;
                    font-style: normal;
                }
    
                @font-face {
                    font-family: 'Cereal';
                    src: url('../fonts/Cereal/airbnbcereal_w_xbd.woff2') format('woff2'),
                    url('../fonts/Cereal/airbnbcereal_w_xbd.woff') format('woff');
                    font-weight: bold;
                    font-style: normal;
                }
            }
    
            /* CLIENT-SPECIFIC STYLES */
            body, table, td, a {
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }
    
            table, td {
                mso-table-lspace: 0;
                mso-table-rspace: 0;
            }
    
            img {
                -ms-interpolation-mode: bicubic;
            }
    
            /* RESET STYLES */
            img {
                border: 0;
                height: auto;
                line-height: 100%;
                outline: none;
                text-decoration: none;
            }
    
            table {
                border-collapse: collapse !important;
            }
    
            body {
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }
    
            /* iOS BLUE LINKS */
            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
            }
    
            /* MOBILE STYLES */
            @media screen and (max-width: 600px) {
                h1 {
                    font-size: 32px !important;
                    line-height: 32px !important;
                }
            }
    
            /* ANDROID CENTER FIX */
            div[style*='margin: 16px 0;'] {
                margin: 0 !important;
            }
        </style>
    </head>
    
    <body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>
    
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
        <!-- LOGO -->
        <tr>
            <td bgcolor='#3671B3' align='center'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'>
                            <a href='https://lesbriquesrouges.fr/' target='_blank'>
                                <img alt='Logo Les Briques Rouges'
                                     src='https://www.lesbriquesrouges.fr/_nuxt/img/lesbriquesrougesRedWhite.43247f2.png'
                                     width='200' height='200'
                                     style='display: block; width: 220px; max-width: 220px; min-width: 220px; font-family: 'Cereal', Helvetica, Arial, sans-serif; color: #ffffff; font-size: 18px;'
                                     border='0'>
                            </a>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- HERO -->
        <tr>
            <td bgcolor='#3671B3' align='center' style='padding: 0 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td bgcolor='#ffffff' align='center' valign='top'
                            style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0 0; color: #111111; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 1px; line-height: 48px;'>
                            <h1 style='font-size: 48px; font-weight: 400; margin: 0;'>".$_POST["h1"]."</h1>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- COPY BLOCK -->
        <tr>
            <td bgcolor='#FFFEE6' align='center' style='padding: 0 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px; text-align: justify;'>
                            <p style='margin: 0; text-align: justify;'>".$_POST["p1"]."</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 20px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0; text-align: justify;'>".$_POST["p2"]."</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 40px 30px; border-radius: 0 0 4px 4px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>".$_POST["p3"]."</p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- SUPPORT CALLOUT -->
        <tr>
            <td bgcolor='#FFFEE6' align='center' style='padding: 30px 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <!-- HEADLINE -->
                    <tr>
                        <td bgcolor='#3671B3' align='center'
                            style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <h2 style='font-size: 20px; font-weight: 400; color: #FFFEE6; margin: 0;'>Tu souhaites nous
                                contacter ?</h2>
                            <p style='margin: 0;'><a href='mailto:contact@lesbriquesrouges.fr' target='_blank'
                                                     style='color: #FFFEE6;'>C'est par ici !</a></p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- FOOTER -->
        <tr>
            <td bgcolor='#FFFEE6' align='center' style='padding: 0 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <!-- NAVIGATION -->
                    <tr>
                        <td bgcolor='#FFFEE6' align='left'
                            style='padding: 30px 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                            <p style='margin: 0;'>
                                <a href='https://www.lesbriquesrouges.fr/reglement.pdf' target='_blank'
                                   style='color: #111111; font-weight: 700;'>Règlement</a>
                                -
                                <a href='https://www.lesbriquesrouges.fr/mentions-legales' target='_blank'
                                   style='color: #111111; font-weight: 700;'>Mentions légales</a>
                                -
                                <a href='https://www.lesbriquesrouges.fr/politique-de-confidentialite' target='_blank'
                                   style='color: #111111; font-weight: 700;'>Politique de confidentialité</a>
                            </p>
                        </td>
                    </tr>
                    <!-- PERMISSION REMINDER -->
                    <tr>
                        <td bgcolor='#FFFEE6' align='left'
                            style='padding: 0 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                            <p style='margin: 0;'>Tu as reçu(e) ce mail, car tu viens de supprimer ton compte de la plateforme. Pour visualiser le mail correctement, <a
                                        href='https://localhost/Plateforme%20Covoiturage/mails/suppression_compte.php'
                                        target='_blank'
                                        style='color: #111111; font-weight: 700;'>affiche la version en ligne</a>.
                            </p>
                        </td>
                    </tr>
                    <!-- ADDRESS -->
                    <tr>
                        <td bgcolor='#FFFEE6' align='left'
                            style='padding: 0 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                            <p style='margin: 0;'>© 2022 Les Briques Rouges Festival | 13 rue de Toul, 59800 Lille</p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
    </table>
    
    </body>
    </html>";
}
else if($_POST["mail"]=="DeleteTraject"){
    $file='../mails/template_mail_suppression_trajet.php';
    $newfile="<!DOCTYPE html>
    <html lang='fr'>
    <head>
        <title>Ton conducteur a supprimé son trajet - LBR Covoiturage</title>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'/>
        <style type='text/css'>
            /* FONTS */
            @media screen {
                @font-face {
                    font-family: 'Cereal';
                    src: url('../fonts/Cereal/airbnbcereal_w_lt.woff2') format('woff2'),
                    url('../fonts/Cereal/airbnbcereal_w_lt.woff') format('woff');
                    font-weight: auto;
                    font-style: normal;
                }
    
                @font-face {
                    font-family: 'Cereal';
                    src: url('../fonts/Cereal/airbnbcereal_w_md.woff2') format('woff2'),
                    url('../fonts/Cereal/airbnbcereal_w_md.woff') format('woff');
                    font-weight: normal;
                    font-style: normal;
                }
    
                @font-face {
                    font-family: 'Cereal';
                    src: url('../fonts/Cereal/airbnbcereal_w_xbd.woff2') format('woff2'),
                    url('../fonts/Cereal/airbnbcereal_w_xbd.woff') format('woff');
                    font-weight: bold;
                    font-style: normal;
                }
            }
    
            /* CLIENT-SPECIFIC STYLES */
            body, table, td, a {
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }
    
            table, td {
                mso-table-lspace: 0;
                mso-table-rspace: 0;
            }
    
            img {
                -ms-interpolation-mode: bicubic;
            }
    
            /* RESET STYLES */
            img {
                border: 0;
                height: auto;
                line-height: 100%;
                outline: none;
                text-decoration: none;
            }
    
            table {
                border-collapse: collapse !important;
            }
    
            body {
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }
    
            /* iOS BLUE LINKS */
            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
            }
    
            /* MOBILE STYLES */
            @media screen and (max-width: 600px) {
                h1 {
                    font-size: 32px !important;
                    line-height: 32px !important;
                }
            }
    
            /* ANDROID CENTER FIX */
            div[style*='margin: 16px 0;'] {
                margin: 0 !important;
            }
        </style>
    </head>
    
    <body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>
    
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
        <!-- LOGO -->
        <tr>
            <td bgcolor='#3671B3' align='center'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'>
                            <a href='https://lesbriquesrouges.fr/' target='_blank'>
                                <img alt='Logo'
                                     src='https://www.lesbriquesrouges.fr/_nuxt/img/lesbriquesrougesRedWhite.43247f2.png'
                                     width='200' height='200'
                                     style='display: block; width: 220px; max-width: 220px; min-width: 220px; font-family: 'Cereal', Helvetica, Arial, sans-serif; color: #ffffff; font-size: 18px;'
                                     border='0'>
                            </a>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- HERO -->
        <tr>
            <td bgcolor='#3671B3' align='center' style='padding: 0 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td bgcolor='#ffffff' align='center' valign='top'
                            style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0 0; color: #111111; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 1px; line-height: 48px;'>
                            <h1 style='font-size: 48px; font-weight: 400; margin: 0;'>".$_POST["h1"]."</h1>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- COPY BLOCK -->
        <tr>
            <td bgcolor='#FFFEE6' align='center' style='padding: 0 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px; text-align: justify;'>
                            <p style='margin: 0;'>".$_POST["p1"]."</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left' style='padding: 0 30px 20px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>".$_POST["p2"]."</p>
                        </td>
                    </tr>
                    <!-- BULLETPROOF BUTTON -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'>
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                    <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'>
                                        <table border='0' cellspacing='0' cellpadding='0'>
                                            <tr>
                                                <td align='center' style='border-radius: 3px;' bgcolor='#000000'>
                                                    <a href='https://localhost/ProjetCovoiturage/html/TousLesTrajets.php' target='_blank' style='font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #000000; display: inline-block;'>Réserver un autre trajet</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 20px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'".$_POST["p3"]."</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 40px 30px; border-radius: 0 0 4px 4px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>A bientôt !<br>L'équipe des Briques Rouges</p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- SUPPORT CALLOUT -->
        <tr>
            <td bgcolor='#FFFEE6' align='center' style='padding: 30px 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <!-- HEADLINE -->
                    <tr>
                        <td bgcolor='#FFF0D1' align='center'
                            style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <h2 style='font-size: 20px; font-weight: 400; color: #111111; margin: 0;'>Tu souhaites nous
                                contacter ?</h2>
                            <p style='margin: 0;'><a href='mailto:contact@lesbriquesrouges.fr' target='_blank'
                                                     style='color: #9B4503;'>C'est par ici !</a></p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- FOOTER -->
        <tr>
            <td bgcolor='#FFFEE6' align='center' style='padding: 0 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;clude'>
                    <!-- NAVIGATION -->
                    <tr>
                        <td bgcolor='#FFFEE6' align='left'
                            style='padding: 30px 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                            <p style='margin: 0;'>
                                <a href='https://www.lesbriquesrouges.fr/reglement.pdf' target='_blank'
                                   style='color: #111111; font-weight: 700;'>Règlement</a>
                                -
                                <a href='https://www.lesbriquesrouges.fr/mentions-legales' target='_blank'
                                   style='color: #111111; font-weight: 700;'>Mentions légales</a>
                                -
                                <a href='https://www.lesbriquesrouges.fr/politique-de-confidentialite' target='_blank'
                                   style='color: #111111; font-weight: 700;'>Politique de confidentialité</a>
                            </p>
                        </td>
                    </tr>
                    <!-- PERMISSION REMINDER -->
                    <tr>
                        <td bgcolor='#FFFEE6' align='left'
                            style='padding: 0 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                            <p style='margin: 0;'>Pour visualiser le mail correctement, <a
                                        href='https://localhost/ProjetCovoiturage/mails/template_mail_suppression_trajet.php'
                                        target='_blank'
                                        style='color: #111111; font-weight: 700;'>affiche la version en ligne</a>.
                            </p>
                        </td>
                    </tr>
                    <!-- ADDRESS -->
                    <tr>
                        <td bgcolor='#FFFEE6' align='left'
                            style='padding: 0 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                            <p style='margin: 0;'>© 2022 Les Briques Rouges Festival | 13 rue de Toul, 59800 Lille</p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
    </table>
    
    </body>
    </html>
    ";
}
else if($_POST["mail"]=="Request"){
    $file='../mails/template_mail_proposition_trajet.php';
    $newfile="<!DOCTYPE html>
    <html lang='fr'>
    <head>
        <title>Demande pour rejoindre ton trajet - LBR Covoiturage</title>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'/>
        <style type='text/css'>
            /* FONTS */
            @media screen {
                @font-face {
                    font-family: 'Cereal';
                    src: url('../fonts/Cereal/airbnbcereal_w_lt.woff2') format('woff2'),
                    url('../fonts/Cereal/airbnbcereal_w_lt.woff') format('woff');
                    font-weight: auto;
                    font-style: normal;
                }
    
                @font-face {
                    font-family: 'Cereal';
                    src: url('../fonts/Cereal/airbnbcereal_w_md.woff2') format('woff2'),
                    url('../fonts/Cereal/airbnbcereal_w_md.woff') format('woff');
                    font-weight: normal;
                    font-style: normal;
                }
    
                @font-face {
                    font-family: 'Cereal';
                    src: url('../fonts/Cereal/airbnbcereal_w_xbd.woff2') format('woff2'),
                    url('../fonts/Cereal/airbnbcereal_w_xbd.woff') format('woff');
                    font-weight: bold;
                    font-style: normal;
                }
            }
    
            /* CLIENT-SPECIFIC STYLES */
            body, table, td, a {
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }
    
            table, td {
                mso-table-lspace: 0;
                mso-table-rspace: 0;
            }
    
            img {
                -ms-interpolation-mode: bicubic;
            }
    
            /* RESET STYLES */
            img {
                border: 0;
                height: auto;
                line-height: 100%;
                outline: none;
                text-decoration: none;
            }
    
            table {
                border-collapse: collapse !important;
            }
    
            body {
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }
    
            /* iOS BLUE LINKS */
            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
            }
    
            /* MOBILE STYLES */
            @media screen and (max-width: 600px) {
                h1 {
                    font-size: 32px !important;
                    line-height: 32px !important;
                }
            }
    
            /* ANDROID CENTER FIX */
            div[style*='margin: 16px 0;'] {
                margin: 0 !important;
            }
        </style>
    </head>
    
    <body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>
    
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
        <!-- LOGO -->
        <tr>
            <td bgcolor='#3671B3' align='center'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'>
                            <a href='https://lesbriquesrouges.fr/' target='_blank'>
                                <img alt='Logo'
                                     src='https://www.lesbriquesrouges.fr/_nuxt/img/lesbriquesrougesRedWhite.43247f2.png'
                                     width='200' height='200'
                                     style='display: block; width: 220px; max-width: 220px; min-width: 220px; font-family: 'Cereal', Helvetica, Arial, sans-serif; color: #ffffff; font-size: 18px;'
                                     border='0'>
                            </a>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- HERO -->
        <tr>
            <td bgcolor='#3671B3' align='center' style='padding: 0 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td bgcolor='#ffffff' align='center' valign='top'
                            style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0 0; color: #111111; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 1px; line-height: 48px;'>
                            <h1 style='font-size: 48px; font-weight: 400; margin: 0;'>".$_POST["h1"]."</h1>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- COPY BLOCK -->
        <tr>
            <td bgcolor='#FFFEE6' align='center' style='padding: 0 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px; text-align: justify;'>
                            <p style='margin: 0;'>".$_POST["p1"]."</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 20px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>".$_POST["p2"]."</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 40px 30px; border-radius: 0 0 4px 4px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>A bientôt !<br>L'équipe des Briques Rouges</p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- SUPPORT CALLOUT -->
        <tr>
            <td bgcolor='#FFFEE6' align='center' style='padding: 30px 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <!-- HEADLINE -->
                    <tr>
                        <td bgcolor='#FFF0D1' align='center'
                            style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <h2 style='font-size: 20px; font-weight: 400; color: #111111; margin: 0;'>Tu souhaites nous
                                contacter ?</h2>
                            <p style='margin: 0;'><a href='mailto:contact@lesbriquesrouges.fr' target='_blank'
                                                     style='color: #9B4503;'>C'est par ici !</a></p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- FOOTER -->
        <tr>
            <td bgcolor='#FFFEE6' align='center' style='padding: 0 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <!-- NAVIGATION -->
                    <tr>
                        <td bgcolor='#FFFEE6' align='left'
                            style='padding: 30px 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                            <p style='margin: 0;'>
                                <a href='https://www.lesbriquesrouges.fr/reglement.pdf' target='_blank'
                                   style='color: #111111; font-weight: 700;'>Règlement</a>
                                -
                                <a href='https://www.lesbriquesrouges.fr/mentions-legales' target='_blank'
                                   style='color: #111111; font-weight: 700;'>Mentions légales</a>
                                -
                                <a href='https://www.lesbriquesrouges.fr/politique-de-confidentialite' target='_blank'
                                   style='color: #111111; font-weight: 700;'>Politique de confidentialité</a>
                            </p>
                        </td>
                    </tr>
                    <!-- PERMISSION REMINDER -->
                    <tr>
                        <td bgcolor='#FFFEE6' align='left'
                            style='padding: 0 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                            <p style='margin: 0;'>Pour visualiser le mail correctement, <a
                                    href='https://localhost/ProjetCovoiturage/mails/template_mail_proposition_trajet.php'
                                    target='_blank'
                                    style='color: #111111; font-weight: 700;'>affiche la version en ligne</a>.
                            </p>
                        </td>
                    </tr>
                    <!-- ADDRESS -->
                    <tr>
                        <td bgcolor='#FFFEE6' align='left'
                            style='padding: 0 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                            <p style='margin: 0;'>© 2022 Les Briques Rouges Festival | 13 rue de Toul, 59800 Lille</p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
    </table>
    
    </body>
    </html>
    ";
    
}
else if($_POST["mail"]=="Reservation"){
    $file='../mails/template_mail_demande_trajet.php';
    $newfile="<!DOCTYPE html>
    <html lang='fr'>
    <head>
        <title>Demande pour rejoindre ton trajet - LBR Covoiturage</title>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'/>
        <style type='text/css'>
            /* FONTS */
            @media screen {
                @font-face {
                    font-family: 'Cereal';
                    src: url('../fonts/Cereal/airbnbcereal_w_lt.woff2') format('woff2'),
                    url('../fonts/Cereal/airbnbcereal_w_lt.woff') format('woff');
                    font-weight: auto;
                    font-style: normal;
                }
    
                @font-face {
                    font-family: 'Cereal';
                    src: url('../fonts/Cereal/airbnbcereal_w_md.woff2') format('woff2'),
                    url('../fonts/Cereal/airbnbcereal_w_md.woff') format('woff');
                    font-weight: normal;
                    font-style: normal;
                }
    
                @font-face {
                    font-family: 'Cereal';
                    src: url('../fonts/Cereal/airbnbcereal_w_xbd.woff2') format('woff2'),
                    url('../fonts/Cereal/airbnbcereal_w_xbd.woff') format('woff');
                    font-weight: bold;
                    font-style: normal;
                }
            }
    
            /* CLIENT-SPECIFIC STYLES */
            body, table, td, a {
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }
    
            table, td {
                mso-table-lspace: 0;
                mso-table-rspace: 0;
            }
    
            img {
                -ms-interpolation-mode: bicubic;
            }
    
            /* RESET STYLES */
            img {
                border: 0;
                height: auto;
                line-height: 100%;
                outline: none;
                text-decoration: none;
            }
    
            table {
                border-collapse: collapse !important;
            }
    
            body {
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }
    
            /* iOS BLUE LINKS */
            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
            }
    
            /* MOBILE STYLES */
            @media screen and (max-width: 600px) {
                h1 {
                    font-size: 32px !important;
                    line-height: 32px !important;
                }
            }
    
            /* ANDROID CENTER FIX */
            div[style*='margin: 16px 0;'] {
                margin: 0 !important;
            }
        </style>
    </head>
    
    <body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>
    
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
        <!-- LOGO -->
        <tr>
            <td bgcolor='#3671B3' align='center'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'>
                            <a href='https://lesbriquesrouges.fr/' target='_blank'>
                                <img alt='Logo'
                                     src='https://www.lesbriquesrouges.fr/_nuxt/img/lesbriquesrougesRedWhite.43247f2.png'
                                     width='200' height='200'
                                     style='display: block; width: 220px; max-width: 220px; min-width: 220px; font-family: 'Cereal', Helvetica, Arial, sans-serif; color: #ffffff; font-size: 18px;'
                                     border='0'>
                            </a>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- HERO -->
        <tr>
            <td bgcolor='#3671B3' align='center' style='padding: 0 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td bgcolor='#ffffff' align='center' valign='top'
                            style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0 0; color: #111111; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 1px; line-height: 48px;'>
                            <h1 style='font-size: 48px; font-weight: 400; margin: 0;'>".$_POST["h1"]."</h1>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- COPY BLOCK -->
        <tr>
            <td bgcolor='#FFFEE6' align='center' style='padding: 0 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px; text-align: justify;'>
                            <p style='margin: 0;'>".$_POST["p1"]."</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 20px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>".$_POST["p2"]."</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 40px 30px; border-radius: 0 0 4px 4px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>".$_POST["p3"]."</p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- SUPPORT CALLOUT -->
        <tr>
            <td bgcolor='#FFFEE6' align='center' style='padding: 30px 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <!-- HEADLINE -->
                    <tr>
                        <td bgcolor='#FFF0D1' align='center'
                            style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <h2 style='font-size: 20px; font-weight: 400; color: #111111; margin: 0;'>Tu souhaites nous
                                contacter ?</h2>
                            <p style='margin: 0;'><a href='mailto:contact@lesbriquesrouges.fr' target='_blank'
                                                     style='color: #9B4503;'>C'est par ici !</a></p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- FOOTER -->
        <tr>
            <td bgcolor='#FFFEE6' align='center' style='padding: 0 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <!-- NAVIGATION -->
                    <tr>
                        <td bgcolor='#FFFEE6' align='left'
                            style='padding: 30px 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                            <p style='margin: 0;'>
                                <a href='https://www.lesbriquesrouges.fr/reglement.pdf' target='_blank'
                                   style='color: #111111; font-weight: 700;'>Règlement</a>
                                -
                                <a href='https://www.lesbriquesrouges.fr/mentions-legales' target='_blank'
                                   style='color: #111111; font-weight: 700;'>Mentions légales</a>
                                -
                                <a href='https://www.lesbriquesrouges.fr/politique-de-confidentialite' target='_blank'
                                   style='color: #111111; font-weight: 700;'>Politique de confidentialité</a>
                            </p>
                        </td>
                    </tr>
                    <!-- PERMISSION REMINDER -->
                    <tr>
                        <td bgcolor='#FFFEE6' align='left'
                            style='padding: 0 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                            <p style='margin: 0;'>Tu as reçu(e) ce mail, car tu viens de recevoir une demande de trajet sur notre plateforme. Pour visualiser le mail correctement, <a
                                        href='https://localhost/Plateforme%20Covoiturage/mails/template_mail_demande_trajet.php'
                                        target='_blank'
                                        style='color: #111111; font-weight: 700;'>affiche la version en ligne</a>.
                            </p>
                        </td>
                    </tr>
                    <!-- ADDRESS -->
                    <tr>
                        <td bgcolor='#FFFEE6' align='left'
                            style='padding: 0 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                            <p style='margin: 0;'>© 2022 Les Briques Rouges Festival | 13 rue de Toul, 59800 Lille</p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
    </table>
    
    </body>
    </html>
    ";
}
else if($_POST["mail"]=="ConfirmDemande"){
    $file='../mails/template_mail_coordonnees_conducteur.php';
    $newfile="<!DOCTYPE html>
    <html lang='fr'>
    <head>
        <title>Coordonnées de ton conducteur - LBR Covoiturage</title>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'/>
        <style type='text/css'>
            /* FONTS */
            @media screen {
                @font-face {
                    font-family: 'Cereal';
                    src: url('../fonts/Cereal/airbnbcereal_w_lt.woff2') format('woff2'),
                    url('../fonts/Cereal/airbnbcereal_w_lt.woff') format('woff');
                    font-weight: auto;
                    font-style: normal;
                }
    
                @font-face {
                    font-family: 'Cereal';
                    src: url('../fonts/Cereal/airbnbcereal_w_md.woff2') format('woff2'),
                    url('../fonts/Cereal/airbnbcereal_w_md.woff') format('woff');
                    font-weight: normal;
                    font-style: normal;
                }
    
                @font-face {
                    font-family: 'Cereal';
                    src: url('../fonts/Cereal/airbnbcereal_w_xbd.woff2') format('woff2'),
                    url('../fonts/Cereal/airbnbcereal_w_xbd.woff') format('woff');
                    font-weight: bold;
                    font-style: normal;
                }
            }
    
            /* CLIENT-SPECIFIC STYLES */
            body, table, td, a {
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }
    
            table, td {
                mso-table-lspace: 0;
                mso-table-rspace: 0;
            }
    
            img {
                -ms-interpolation-mode: bicubic;
            }
    
            /* RESET STYLES */
            img {
                border: 0;
                height: auto;
                line-height: 100%;
                outline: none;
                text-decoration: none;
            }
    
            table {
                border-collapse: collapse !important;
            }
    
            body {
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }
    
            /* iOS BLUE LINKS */
            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
            }
    
            /* MOBILE STYLES */
            @media screen and (max-width: 600px) {
                h1 {
                    font-size: 32px !important;
                    line-height: 32px !important;
                }
            }
    
            /* ANDROID CENTER FIX */
            div[style*='margin: 16px 0;'] {
                margin: 0 !important;
            }
        </style>
    </head>
    
    <body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>
    
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
        <!-- LOGO -->
        <tr>
            <td bgcolor='#3671B3' align='center'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'>
                            <a href='https://lesbriquesrouges.fr/' target='_blank'>
                                <img alt='Logo'
                                     src='https://www.lesbriquesrouges.fr/_nuxt/img/lesbriquesrougesRedWhite.43247f2.png'
                                     width='200' height='200'
                                     style='display: block; width: 220px; max-width: 220px; min-width: 220px; font-family: 'Cereal', Helvetica, Arial, sans-serif; color: #ffffff; font-size: 18px;'
                                     border='0'>
                            </a>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- HERO -->
        <tr>
            <td bgcolor='#3671B3' align='center' style='padding: 0 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td bgcolor='#ffffff' align='center' valign='top'
                            style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0 0; color: #111111; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 1px; line-height: 48px;'>
                            <h1 style='font-size: 48px; font-weight: 400; margin: 0;'>".$_POST["h1"]."</h1>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- COPY BLOCK -->
        <tr>
            <td bgcolor='#FFFEE6' align='center' style='padding: 0 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px; text-align: justify;'>
                            <p style='margin: 0;'>".$_POST["p1"]."</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 0 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0; text-align: justify;'>".$_POST["p2"]."</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 20px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>{{Prenom_conducteur}} {{Nom_conducteur}}</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 20px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>{{Telephone_conducteur}}</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 20px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>{{Mail_conducteur}}</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 20px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>".$_POST["p3"]."</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 40px 30px; border-radius: 0 0 4px 4px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>A bientôt !<br>L'équipe des Briques Rouges</p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- SUPPORT CALLOUT -->
        <tr>
            <td bgcolor='#FFFEE6' align='center' style='padding: 30px 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <!-- HEADLINE -->
                    <tr>
                        <td bgcolor='#FFF0D1' align='center'
                            style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <h2 style='font-size: 20px; font-weight: 400; color: #111111; margin: 0;'>Tu souhaites nous
                                contacter ?</h2>
                            <p style='margin: 0;'><a href='mailto:contact@lesbriquesrouges.fr' target='_blank'
                                                     style='color: #9B4503;'>C'est par ici !</a></p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- FOOTER -->
        <tr>
            <td bgcolor='#FFFEE6' align='center' style='padding: 0 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <!-- NAVIGATION -->
                    <tr>
                        <td bgcolor='#FFFEE6' align='left'
                            style='padding: 30px 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                            <p style='margin: 0;'>
                                <a href='https://www.lesbriquesrouges.fr/reglement.pdf' target='_blank'
                                   style='color: #111111; font-weight: 700;'>Règlement</a>
                                -
                                <a href='https://www.lesbriquesrouges.fr/mentions-legales' target='_blank'
                                   style='color: #111111; font-weight: 700;'>Mentions légales</a>
                                -
                                <a href='https://www.lesbriquesrouges.fr/politique-de-confidentialite' target='_blank'
                                   style='color: #111111; font-weight: 700;'>Politique de confidentialité</a>
                            </p>
                        </td>
                    </tr>
                    <!-- PERMISSION REMINDER -->
                    <tr>
                        <td bgcolor='#FFFEE6' align='left'
                            style='padding: 0 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                            <p style='margin: 0;'>Pour visualiser le mail correctement, <a
                                    href='https://localhost/ProjetCovoiturage/mails/template_mail_coordonnees_conducteur.php'
                                    target='_blank'
                                    style='color: #111111; font-weight: 700;'>affiche la version en ligne</a>.
                            </p>
                        </td>
                    </tr>
                    <!-- ADDRESS -->
                    <tr>
                        <td bgcolor='#FFFEE6' align='left'
                            style='padding: 0 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                            <p style='margin: 0;'>© 2022 Les Briques Rouges Festival | 13 rue de Toul, 59800 Lille</p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
    </table>
    
    </body>
    </html>
    ";
}
else if($_POST["mail"]=="ConfirmAccount"){
    $file='../mails/template_mail_confirmation_mail.php';
    $newfile="<!DOCTYPE html>
<html lang='fr'>
<head>
    <title></title>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'/>
    <!--Favicon-->
    <link rel='icon' href='../images/LBR Ressources/intiniales.png' type='images/png'/> 

    <style type='text/css'>
        /* FONTS */
        @media screen {
            @font-face {
                font-family: 'Cereal';
                src: url('../fonts/Cereal/airbnbcereal_w_lt.woff2') format('woff2'),
                url('../fonts/Cereal/airbnbcereal_w_lt.woff') format('woff');
                font-weight: auto;
                font-style: normal;
            }

            @font-face {
                font-family: 'Cereal';
                src: url('../fonts/Cereal/airbnbcereal_w_md.woff2') format('woff2'),
                url('../fonts/Cereal/airbnbcereal_w_md.woff') format('woff');
                font-weight: normal;
                font-style: normal;
            }

            @font-face {
                font-family: 'Cereal';
                src: url('../fonts/Cereal/airbnbcereal_w_xbd.woff2') format('woff2'),
                url('../fonts/Cereal/airbnbcereal_w_xbd.woff') format('woff');
                font-weight: bold;
                font-style: normal;
            }
        }

        /* CLIENT-SPECIFIC STYLES */
        body, table, td, a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table, td {
            mso-table-lspace: 0;
            mso-table-rspace: 0;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* RESET STYLES */
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media screen and (max-width: 600px) {
            h1 {
                font-size: 32px !important;
                line-height: 32px !important;
            }
        }

        /* ANDROID CENTER FIX */
        div[style*='margin: 16px 0;'] {
            margin: 0 !important;
        }
    </style>
</head>

<body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>

<table border='0' cellpadding='0' cellspacing='0' width='100%'>
    <!-- LOGO -->
    <tr>
        <td bgcolor='#FFA73B' align='center'>
            <!--[if (gte mso 9)|(IE)]>
            <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                <tr>
                    <td align='center' valign='top' width='600'>
            <![endif]-->
            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                <tr>
                    <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'>
                        <a href='https://lesbriquesrouges.fr/' target='_blank'>
                            <img alt='Logo'
                                 src='https://www.lesbriquesrouges.fr/_nuxt/img/lesbriquesrouges.f55472d.png'
                                 width='200' height='200'
                                 style='display: block; width: 220px; max-width: 220px; min-width: 220px; font-family: 'Cereal', Helvetica, Arial, sans-serif; color: #ffffff; font-size: 18px;'
                                 border='0'>
                        </a>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- HERO -->
    <tr>
        <td bgcolor='#FFA73B' align='center' style='padding: 0 10px 0 10px;'>
            <!--[if (gte mso 9)|(IE)]>
            <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                <tr>
                    <td align='center' valign='top' width='600'>
            <![endif]-->
            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                <tr>
                    <td bgcolor='#ffffff' align='center' valign='top'
                        style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0 0; color: #111111; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 1px; line-height: 48px;'>
                        <h1 style='font-size: 48px; font-weight: 400; margin: 0;'>".$_POST["h1"]."</h1>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- COPY BLOCK -->
    <tr>
        <td bgcolor='#f4f4f4' align='center' style='padding: 0 10px 0 10px;'>
            <!--[if (gte mso 9)|(IE)]>
            <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                <tr>
                    <td align='center' valign='top' width='600'>
            <![endif]-->
            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                <!-- COPY -->
                <tr>
                    <td bgcolor='#ffffff' align='left'
                        style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px; text-align: justify;'>
                        <p style='margin: 0;'>".$_POST["p1"]."</p>
                    </td>
                </tr>
                <!-- BULLETPROOF BUTTON -->
                <tr>
                    <td bgcolor='#ffffff' align='left'>
                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                            <tr>
                                <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'>
                                    <table border='0' cellspacing='0' cellpadding='0'>
                                        <tr>
                                            <td align='center' style='border-radius: 3px;' bgcolor='#000000'>
                                                {{Bouton}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- COPY -->
                <tr>
                    <td bgcolor='#ffffff' align='left'
                        style='padding: 0 30px 0 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                        <p style='margin: 0; text-align: justify;'>".$_POST["p2"]."</p>
                    </td>
                </tr>
                <!-- COPY -->
                <tr>
                    <td bgcolor='#ffffff' align='left'
                        style='padding: 20px 30px 20px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                        <p style='margin: 0;'>{{Lien}}</p>
                    </td>
                </tr>
                <!-- COPY -->
                <tr>
                    <td bgcolor='#ffffff' align='left'
                        style='padding: 0 30px 20px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                        <p style='margin: 0;'>".$_POST["p3"]."</p>
                    </td>
                </tr>
                <!-- COPY -->
                <tr>
                    <td bgcolor='#ffffff' align='left'
                        style='padding: 0 30px 40px 30px; border-radius: 0 0 4px 4px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                        <p style='margin: 0;'>".$_POST["p4"]."</p>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- SUPPORT CALLOUT -->
    <tr>
        <td bgcolor='#f4f4f4' align='center' style='padding: 30px 10px 0 10px;'>
            <!--[if (gte mso 9)|(IE)]>
            <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                <tr>
                    <td align='center' valign='top' width='600'>
            <![endif]-->
            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                <!-- HEADLINE -->
                <tr>
                    <td bgcolor='#FFF0D1' align='center'
                        style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                        <h2 style='font-size: 20px; font-weight: 400; color: #111111; margin: 0;'>Tu souhaites nous
                            contacter ?</h2>
                        <p style='margin: 0;'><a href='mailto:contact@lesbriquesrouges.fr' target='_blank'
                                                 style='color: #9B4503;'>C'est par ici !</a></p>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- FOOTER -->
    <tr>
        <td bgcolor='#f4f4f4' align='center' style='padding: 0 10px 0 10px;'>
            <!--[if (gte mso 9)|(IE)]>
            <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                <tr>
                    <td align='center' valign='top' width='600'>
            <![endif]-->
            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                <!-- NAVIGATION -->
                <tr>
                    <td bgcolor='#f4f4f4' align='left'
                        style='padding: 30px 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                        <p style='margin: 0;'>
                            <a href='https://www.lesbriquesrouges.fr/reglement.pdf' target='_blank'
                               style='color: #111111; font-weight: 700;'>Règlement</a>
                            -
                            <a href='https://www.lesbriquesrouges.fr/mentions-legales' target='_blank'
                               style='color: #111111; font-weight: 700;'>Mentions légales</a>
                            -
                            <a href='https://www.lesbriquesrouges.fr/politique-de-confidentialite' target='_blank'
                               style='color: #111111; font-weight: 700;'>Politique de confidentialité</a>
                        </p>
                    </td>
                </tr>
                <!-- PERMISSION REMINDER -->
                <tr>
                    <td bgcolor='#f4f4f4' align='left'
                        style='padding: 0 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                        <p style='margin: 0;'>Tu as reçu(e) ce mail, car tu viens de créer un compte sur notre
                            plateforme. Pour visualiser le mail correctement, <a
                                    href='https://localhost/Plateforme%20Covoiturage/mails/confirmation_mail.php'
                                    target='_blank'
                                    style='color: #111111; font-weight: 700;'>affiche la version en ligne</a>.
                        </p>
                    </td>
                </tr>
                <!-- ADDRESS -->
                <tr>
                    <td bgcolor='#f4f4f4' align='left'
                        style='padding: 0 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                        <p style='margin: 0;'>© 2022 Les Briques Rouges Festival | 13 rue de Toul, 59800 Lille</p>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>

</body>
</html>
";
}
else if($_POST["mail"]=="ResetPassword"){
    $file='../mails/template_mail_reset_mot_de_passe.php';
    $newfile="<!DOCTYPE html>
    <html lang='fr'>
    <head>
        <title>Demande de réinitialisation de mot de passe - LBR Covoiturage</title>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'/>
        <style type='text/css'>
            /* FONTS */
            @media screen {
                @font-face {
                    font-family: 'Cereal';
                    src: url('../fonts/Cereal/airbnbcereal_w_lt.woff2') format('woff2'),
                    url('../fonts/Cereal/airbnbcereal_w_lt.woff') format('woff');
                    font-weight: auto;
                    font-style: normal;
                }
    
                @font-face {
                    font-family: 'Cereal';
                    src: url('../fonts/Cereal/airbnbcereal_w_md.woff2') format('woff2'),
                    url('../fonts/Cereal/airbnbcereal_w_md.woff') format('woff');
                    font-weight: normal;
                    font-style: normal;
                }
    
                @font-face {
                    font-family: 'Cereal';
                    src: url('../fonts/Cereal/airbnbcereal_w_xbd.woff2') format('woff2'),
                    url('../fonts/Cereal/airbnbcereal_w_xbd.woff') format('woff');
                    font-weight: bold;
                    font-style: normal;
                }
            }
    
            /* CLIENT-SPECIFIC STYLES */
            body, table, td, a {
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }
    
            table, td {
                mso-table-lspace: 0;
                mso-table-rspace: 0;
            }
    
            img {
                -ms-interpolation-mode: bicubic;
            }
    
            /* RESET STYLES */
            img {
                border: 0;
                height: auto;
                line-height: 100%;
                outline: none;
                text-decoration: none;
            }
    
            table {
                border-collapse: collapse !important;
            }
    
            body {
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }
    
            /* iOS BLUE LINKS */
            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
            }
    
            /* MOBILE STYLES */
            @media screen and (max-width: 600px) {
                h1 {
                    font-size: 32px !important;
                    line-height: 32px !important;
                }
            }
    
            /* ANDROID CENTER FIX */
            div[style*='margin: 16px 0;'] {
                margin: 0 !important;
            }
        </style>
    </head>
    
    <body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>
    
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
        <!-- LOGO -->
        <tr>
            <td bgcolor='#3671B3' align='center'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'>
                            <a href='https://lesbriquesrouges.fr/' target='_blank'>
                                <img alt='Logo Les Briques Rouges'
                                     src='https://www.lesbriquesrouges.fr/_nuxt/img/lesbriquesrougesRedWhite.43247f2.png'
                                     width='200' height='200'
                                     style='display: block; width: 220px; max-width: 220px; min-width: 220px; font-family: 'Cereal', Helvetica, Arial, sans-serif; color: #ffffff; font-size: 18px;'
                                     border='0'>
                            </a>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- HERO -->
        <tr>
            <td bgcolor='#3671B3' align='center' style='padding: 0 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td bgcolor='#ffffff' align='center' valign='top'
                            style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0 0; color: #111111; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 1px; line-height: 48px;'>
                            <h1 style='font-size: 48px; font-weight: 400; margin: 0;'>".$_POST["h1"]."</h1>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- COPY BLOCK -->
        <tr>
            <td bgcolor='#FFFEE6' align='center' style='padding: 0 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px; text-align: justify;'>
                            <p style='margin: 0;'>".$_POST["p1"]."</p>
                        </td>
                    </tr>
                    <!-- BULLETPROOF BUTTON -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'>
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                    <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'>
                                        <table border='0' cellspacing='0' cellpadding='0'>
                                            <tr>
                                                <td align='center' style='border-radius: 3px;' bgcolor='#3671B3'>
                                                    {{Bouton}}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 20px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>".$_POST["p2"]."</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 40px 30px; border-radius: 0 0 4px 4px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>".$_POST["p3"]."</p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- SUPPORT CALLOUT -->
        <tr>
            <td bgcolor='#FFFEE6' align='center' style='padding: 30px 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <!-- HEADLINE -->
                    <tr>
                        <td bgcolor='#3671B3' align='center'
                            style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <h2 style='font-size: 20px; font-weight: 400; color: #FFFEE6; margin: 0;'>Tu souhaites nous
                                contacter ?</h2>
                            <p style='margin: 0;'><a href='mailto:contact@lesbriquesrouges.fr' target='_blank'
                                                     style='color: #FFFEE6;'>C'est par ici !</a></p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- FOOTER -->
        <tr>
            <td bgcolor='#FFFEE6' align='center' style='padding: 0 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <!-- NAVIGATION -->
                    <tr>
                        <td bgcolor='#FFFEE6' align='left'
                            style='padding: 30px 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                            <p style='margin: 0;'>
                                <a href='https://www.lesbriquesrouges.fr/reglement.pdf' target='_blank'
                                   style='color: #111111; font-weight: 700;'>Règlement</a>
                                -
                                <a href='https://www.lesbriquesrouges.fr/mentions-legales' target='_blank'
                                   style='color: #111111; font-weight: 700;'>Mentions légales</a>
                                -
                                <a href='https://www.lesbriquesrouges.fr/politique-de-confidentialite' target='_blank'
                                   style='color: #111111; font-weight: 700;'>Politique de confidentialité</a>
                            </p>
                        </td>
                    </tr>
                    <!-- PERMISSION REMINDER -->
                    <tr>
                        <td bgcolor='#FFFEE6' align='left'
                            style='padding: 0 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                            <p style='margin: 0;'>Tu as reçu(e) ce mail, car tu viens de créer un compte sur notre
                                plateforme. Pour visualiser le mail correctement, <a
                                        href='https://localhost/Plateforme%20Covoiturage/mails/reset_mot_de_passe.php'
                                        target='_blank'
                                        style='color: #111111; font-weight: 700;'>affiche la version en ligne</a>.
                            </p>
                        </td>
                    </tr>
                    <!-- ADDRESS -->
                    <tr>
                        <td bgcolor='#FFFEE6' align='left'
                            style='padding: 0 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                            <p style='margin: 0;'>© 2022 Les Briques Rouges Festival | 13 rue de Toul, 59800 Lille</p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
    </table>
    
    </body>
    </html>";
}
else if($_POST["mail"]=="ConfirmDriver"){
    $file='../mails/template_mail_coordonnees_passagers.php';
    $newfile="<!DOCTYPE html>
    <html lang='fr'>
    <head>
        <title>Coordonnées de tes passagers - LBR Covoiturage</title>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'/>
        <style type='text/css'>
            /* FONTS */
            @media screen {
                @font-face {
                    font-family: 'Cereal';
                    src: url('../fonts/Cereal/airbnbcereal_w_lt.woff2') format('woff2'),
                    url('../fonts/Cereal/airbnbcereal_w_lt.woff') format('woff');
                    font-weight: auto;
                    font-style: normal;
                }
    
                @font-face {
                    font-family: 'Cereal';
                    src: url('../fonts/Cereal/airbnbcereal_w_md.woff2') format('woff2'),
                    url('../fonts/Cereal/airbnbcereal_w_md.woff') format('woff');
                    font-weight: normal;
                    font-style: normal;
                }
    
                @font-face {
                    font-family: 'Cereal';
                    src: url('../fonts/Cereal/airbnbcereal_w_xbd.woff2') format('woff2'),
                    url('../fonts/Cereal/airbnbcereal_w_xbd.woff') format('woff');
                    font-weight: bold;
                    font-style: normal;
                }
            }
    
            /* CLIENT-SPECIFIC STYLES */
            body, table, td, a {
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }
    
            table, td {
                mso-table-lspace: 0;
                mso-table-rspace: 0;
            }
    
            img {
                -ms-interpolation-mode: bicubic;
            }
    
            /* RESET STYLES */
            img {
                border: 0;
                height: auto;
                line-height: 100%;
                outline: none;
                text-decoration: none;
            }
    
            table {
                border-collapse: collapse !important;
            }
    
            body {
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }
    
            /* iOS BLUE LINKS */
            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
            }
    
            /* MOBILE STYLES */
            @media screen and (max-width: 600px) {
                h1 {
                    font-size: 32px !important;
                    line-height: 32px !important;
                }
            }
    
            /* ANDROID CENTER FIX */
            div[style*='margin: 16px 0;'] {
                margin: 0 !important;
            }
        </style>
    </head>
    
    <body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>
    
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
        <!-- LOGO -->
        <tr>
            <td bgcolor='#3671B3' align='center'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'>
                            <a href='https://lesbriquesrouges.fr/' target='_blank'>
                                <img alt='Logo'
                                     src='https://www.lesbriquesrouges.fr/_nuxt/img/lesbriquesrougesRedWhite.43247f2.png'
                                     width='200' height='200'
                                     style='display: block; width: 220px; max-width: 220px; min-width: 220px; font-family: 'Cereal', Helvetica, Arial, sans-serif; color: #ffffff; font-size: 18px;'
                                     border='0'>
                            </a>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- HERO -->
        <tr>
            <td bgcolor='#3671B3' align='center' style='padding: 0 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td bgcolor='#ffffff' align='center' valign='top'
                            style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0 0; color: #111111; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 1px; line-height: 48px;'>
                            <h1 style='font-size: 48px; font-weight: 400; margin: 0;'>".$_POST["h1"]."</h1>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- COPY BLOCK -->
        <tr>
            <td bgcolor='#FFFEE6' align='center' style='padding: 0 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px; text-align: justify;'>
                            <p style='margin: 0;'>".$_POST["p1"]."</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 0 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0; text-align: justify;'>".$_POST["p2"]."</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 20px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>{{Prenom}} {{Nom}}</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 20px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>{{Telephone}}</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 20px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>{{Adresse mail}}</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 20px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>".$_POST["p3"]."</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left'
                            style='padding: 0 30px 40px 30px; border-radius: 0 0 4px 4px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>A bientôt !<br>L'équipe des Briques Rouges</p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- SUPPORT CALLOUT -->
        <tr>
            <td bgcolor='#FFFEE6' align='center' style='padding: 30px 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <!-- HEADLINE -->
                    <tr>
                        <td bgcolor='#FFF0D1' align='center'
                            style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <h2 style='font-size: 20px; font-weight: 400; color: #111111; margin: 0;'>Tu souhaites nous
                                contacter ?</h2>
                            <p style='margin: 0;'><a href='mailto:contact@lesbriquesrouges.fr' target='_blank'
                                                     style='color: #9B4503;'>C'est par ici !</a></p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <!-- FOOTER -->
        <tr>
            <td bgcolor='#FFFEE6' align='center' style='padding: 0 10px 0 10px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                    <tr>
                        <td align='center' valign='top' width='600'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <!-- NAVIGATION -->
                    <tr>
                        <td bgcolor='#FFFEE6' align='left'
                            style='padding: 30px 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                            <p style='margin: 0;'>
                                <a href='https://www.lesbriquesrouges.fr/reglement.pdf' target='_blank'
                                   style='color: #111111; font-weight: 700;'>Règlement</a>
                                -
                                <a href='https://www.lesbriquesrouges.fr/mentions-legales' target='_blank'
                                   style='color: #111111; font-weight: 700;'>Mentions légales</a>
                                -
                                <a href='https://www.lesbriquesrouges.fr/politique-de-confidentialite' target='_blank'
                                   style='color: #111111; font-weight: 700;'>Politique de confidentialité</a>
                            </p>
                        </td>
                    </tr>
                    <!-- PERMISSION REMINDER -->
                    <tr>
                        <td bgcolor='#FFFEE6' align='left'
                            style='padding: 0 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                            <p style='margin: 0;'>Pour visualiser le mail correctement, <a
                                    href='https://localhost/ProjetCovoiturage/mails/template_mail_coordonnees_passagers.php'
                                    target='_blank'
                                    style='color: #111111; font-weight: 700;'>affiche la version en ligne</a>.
                            </p>
                        </td>
                    </tr>
                    <!-- ADDRESS -->
                    <tr>
                        <td bgcolor='#FFFEE6' align='left'
                            style='padding: 0 30px 30px 30px; color: #666666; font-family: 'Cereal', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'>
                            <p style='margin: 0;'>© 2022 Les Briques Rouges Festival | 13 rue de Toul, 59800 Lille</p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
    </table>
    
    </body>
    </html>
    ";
}
else{
    echo "erreur";          //Si on ne récupère aucune information alors une erreur c'est produite
    die();
}

file_put_contents($file,$newfile);              //On remplace l'email avec les nouveaux textes
//echo file_get_contents($file);                  //On affiche le nouvel email
header("Location: email.php");





?>