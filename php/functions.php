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
                    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css'>
                    <link rel='stylesheet' href='style.css'>
                    <script src='https://www.hCaptcha.com/1/api.js' async defer></script>
                </head>
                <body> ";
}

function createNavBar() {
    $navbar=\file_get_contents("data/navbar.yaml");
    $navbar_data=yaml_parse($navbar);
    echo "  <div class='nav'>
                <h1> <span>Bronsard</span> Benoît </h1>  
                <label for='toggle'>&#9776</label>
                <input type='checkbox' id='toggle'>
                <div class='menu'>
                    <ul>";
    foreach ($navbar_data as $navlink=>$navtitle){
        echo "      <li><a href='#".$navlink."'>".$navtitle."</a></li>";
    }
    echo "          </ul>
                </div>
            </div>";
}

function createSection() {
    $section=\file_get_contents("data/navbar.yaml");
    $section_data=array_reverse(yaml_parse($section));
    foreach ($section_data as $section_link=>$section_title){
        echo "  <section id='".$section_link."'>";
        include('php/'.$section_link.'.php');
        echo "  </section>";
    }
}


function htmlfooter():void {
    echo "      </body>
                <footer>
                    <button class='kc_fab_main_btn'>i</button>
                </footer>
            </html>";
}


