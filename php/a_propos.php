<?php
    require_once('functions.php');
    $apropos=\file_get_contents('data/a_propos.yaml');
    $ap2=yaml_parse($apropos);
?>

<article>
    <div class='header'>
        <div>
            <h1>Benoît Bronsard</h1>
            <h2>- Etudiant en BTS SIO Spé. SISR-</h2>
        </div>
    </div>
    <div class='container'>
        <?php
            foreach($ap2 as $ap2_tab) {
                foreach($ap2_tab as $cle=>$val){
                    if($cle=='Presentation'){
                        echo("<div class='ap-2nd-container'>
                                <div class='presentation'>
                                    <h2>Présentation</h2>
                                    <p>".nl2br($val)."</p>
                                </div>
                                <div class='pic'>
                                    <img src='img/pp.jpg'>
                                </div>
                            </div>
                            <div class='ap-3rd-container'>");
                    }
                    if($cle=='Interets'){
                        echo("<div class='ap-3rd-container-left'>
                                <h2>Centres d'Intérêts</h2>
                                    <ul>");
                                    foreach($val as $key=>$eng){
                                        echo("<li><span>".$key." : </span>".nl2br($eng)."</li>");
                                    }
                        echo("</ul>
                                    <br><p></p>
                            </div>");
                    }
                    if($cle=='Parcours'){
                        echo("<div class='ap-3rd-container-right'>
                                <h2>Parcours Scolaire</h2>
                                    <ul>");
                                    foreach($val as $key=>$eng){
                                        echo("<li><span>".$key." : </span>".nl2br($eng)."</li>");
                                    }
                        echo("</ul>
                            </div>");
                    }
                }
            }
        ?>
</article>
