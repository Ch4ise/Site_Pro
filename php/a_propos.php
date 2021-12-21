<?php
    require_once('functions.php');
    $apropos=\file_get_contents('data/a_propos.yaml');
    $ap2=yaml_parse($apropos);
?>

<article id="accueil-article">
    <div class='ap-header'>
        <div>
            <h1>Benoît Bronsard</h1>
            <h2>- Etudiant en BTS SIO -</h2>
        </div>
    </div>
    <div class='ap-container'>
        <?php
            foreach($ap2 as $ap2_tab) {
                foreach($ap2_tab as $cle=>$val){
                    if($cle=='Presentation'){
                        echo("<div class='ap-2nd-container'>
                                <h2>Présentation</h2>
                                    <p>".nl2br($val)."</p>
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
