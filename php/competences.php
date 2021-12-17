<?php
    require_once('functions.php');
    $comp=\file_get_contents('data/competences.yaml');
    $skills=yaml_parse($comp);

    $certif=\file_get_contents('data/certification2.yaml');
    $certif2=yaml_parse($certif);
?>

<article id="skills-article">
    <div class='skills-container-left'>
        <div class='skills-header-left'>
            <h1> Compétences</h1>
            <hr class='skills-hr-left'>
        </div>
                <?php
                    foreach($skills as $skills2) {
                        echo("<div class='skills-container-left-content'>");
                        foreach($skills2 as $cle=>$val){
                            echo("<p><span>".$cle."</span> : ".$val."%</p>");
                            echo("<div class='bar1'>
                                        <div id='".$cle."-bar'></div>
                                </div>");
                            echo("  <style>
                                        #".$cle."-bar{
                                            animation: ".$cle."-fill 2s forwards;
                                        }
                                        @keyframes ".$cle."-fill{
                                            100%{
                                                width: ".$val."%;
                                            }
                                        }
                                    </style>");
                        }
                    echo("</div>");
                    }
                ?>
    </div>
    <div class='skills-container-right'>
        <div class='skills-header-right'>
            <h1> Certifications </h1>
            <hr class='skills-hr-right'>
        </div>
            <?php
                foreach($certif2 as $certif3) {
                    echo("<div class='skills-container-right-content'</div>");
                    foreach($certif3 as $cle=>$val) {
                        if($cle=='Cambridge English Certificate' or $cle=='Deutsches Sprachdiplom' or $cle=='SecNum Académie (ANSSI)'){
                            echo("<p class='min-title'>".$cle."</p>
                                   <hr class='min-title-hr'>");
                        } else {
                            if($val==100){
                                echo("  <p><span>".$cle." : </span>C1</p>");
                            }elseif($val==80){
                                echo("  <p><span>".$cle." : </span>B1</p>");
                            }else{
                            echo("  <p><span>".$cle." : </span>".$val."%</p>");
                            }
                            echo("  <div class='bar2'>
                                        <div id='".$cle."-".$val."-bar'></div>
                                    </div>");
                            echo("  <style>
                                        #".$cle."-".$val."-bar{
                                            animation: ".$cle."-".$val."-fill 2s forwards;
                                        }
                                        @keyframes ".$cle."-".$val."-fill{
                                            100%{
                                                width:".$val."%;
                                        }
                                        </style>");
                        }
                    }
                    echo("</div>");
                }
            ?>
    </div>
</article>
