<article id="accueil-article">
    <div class='accueil-header'>
        <div id='pic'>
            <!--<img src='img/pp.jpg'>-->
        </div>
        <div id='txt'>
            <h1>Benoît Bronsard</h1>
            <h2>- Etudiant en BTS SIO -</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque convallis aliquam est at sagittis. Fusce viverra, nibh eget gravida dictum. </p>
        </div>
    </div>
    <div class='accueil-container'>
        <div class='accueil-container-left'>
            <span><h2>A propos de Moi</h2></span>
            <p>Actuellement en 1ère année de BTS SIO, je suis à la recherche d'un stage.</p>
            <p>Attiré par l’informatique et les nouvelles technologies depuis mon enfance, je souhaite me diriger vers la Cybersécurité. C’est un enjeu majeur de nos jours pour les entreprises et atteindre cet objectif se fera par l’acquisition des savoir-faire d’un vrai professionnel.</p>
        </div>
        <div class='accueil-container-right'>
            <?php
                require_once('functions.php');
                $tab=\file_get_contents('data/accueil.yaml');
                $datas=yaml_parse($tab);

                echo("<ul>");
                foreach($datas as $cle=>$val){
                    echo("<li><span>".$cle." :</span> ".$val."</li>");
                }
                echo("</ul>");
            ?>
        </div>
    </div>

</article>
