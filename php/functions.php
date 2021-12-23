<?php

function htmlHeader():void {
    echo "  <!DOCTYPE html>
            <html lang='fr'>
                <head>
                    <meta charset='utf-8'>
                    <title>Site Professionnel</title>
                    <link rel='preconnect' href='https://fonts.googleapis.com'>
                    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
                    <link href='https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap' rel='stylesheet'>
                    <link rel='preconnect' href='https://fonts.googleapis.com'>
                    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
                    <link href='https://fonts.googleapis.com/css2?family=K2D:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,800&display=swap' rel='stylesheet'>
                    <link rel='preconnect' href='https://fonts.googleapis.com'>
                    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
                    <link href='https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap' rel='stylesheet'>
                    <link rel='stylesheet' href='style.css'>
                    <script src='https://www.hCaptcha.com/1/api.js' async defer></script>
                </head>
                <body> ";
}

function createNavBar() {
    $navbar=\file_get_contents("data/navbar.yaml");
    $navbar_data=yaml_parse($navbar);
    echo "  <nav>
                <h1><span>Bronsard</span> Benoît</h1>
                <label for='toggle'>&#9776</label>
                <input type='checkbox' id='toggle'>
                    <ul>";
    foreach ($navbar_data as $navlink=>$navtitle){
        echo "      <div class='nav-container'></div>
                        <li><a href='#".$navlink."'>".$navtitle."</a></li>";
    }
    echo "          </ul>
            </nav>";
}

function createSection() {
    $section=\file_get_contents("data/navbar.yaml");
    $section_data=array_reverse(yaml_parse($section));
    foreach ($section_data as $section_link=>$section_title){
        echo "  <section id='".$section_link."'>";
        include('php/'.$section_link.'.php');
        echo "</section>";
    }
}


function htmlfooter() {
    echo "      </body>
                <footer>
                    <div class='footer-left'>
                        <p>Copyright © Bronsard Benoît - Tous droits réservés</p>
                    </div>
                    <div class='footer-right'>
                        <div>
                            <p>E-mail</p>
                            <span>benoit.bronsard@hotmail.fr</span>
                        </div>
                        <div>
                            <p>Tel</p>
                            <span>06 02 07 70 03</span>
                        </div>
                        <div>
                            <p>Online</p>
                            <div class='footer-img'>
                                <a href='https://www.instagram.com/benoit_bsd/' target='_blank'><img src='img/icon-insta.png'></a>
                                <img src='img/icon-twitter.png'>
                                <img src='img/icon-linkedin.png'>
                            </div>
                        </div>
                    </div>
                </footer>
            </html>";
}


