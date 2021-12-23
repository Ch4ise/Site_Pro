
<?php
    require_once('functions.php');
    $experiences=\file_get_contents('data/experiences.yaml');
    $experiences2=yaml_parse($experiences);
?>

<article id="form-article">
    <div class='form-header'>
        <h1>Expériences</h1>
        <a href='' download='img/icon-insta.png'>TELECHARGER CV</a>
    </div>
    <div class='accueil-container'>
        <div class="form">
            <ul class="tl">
                <?php
                    foreach($experiences2 as $data){
                        echo("  <li class='tl-item'>");
                        foreach($data as $cle=>$val){
                            if($cle=='Date'){
                                echo("<div class='exp-time'>
                                        ".$val."
                                    </div>");
                            }elseif($cle=='Titre'){
                                echo("<div class='tl-title'>".$val."</div>");
                            }else {
                                echo("<div class='tl-detail'>
                                        <p><span>".$cle." : </span>".nl2br($val)."</p></div>");
                            }
                        }
                    }
                ?>
            </ul>
        </div>
    </div>
</article>            

