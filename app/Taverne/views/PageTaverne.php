    <div class="flex-wrapper horizontal justify">
        <h3 class="legend">Fiche Taverne</h3>

            <aside class="x2" role="complementary" style="order:1">
                <form action="" class="form" method="post">
                    <fieldset class="fieldset">
                        <legend class="legend">Descriptif</legend>

                            <div class="wrapper">
                                <p><span class="titre"> ID :</span>  <?php echo $taverne->getId(); ?></p>
                                <p><span class="titre"> Nom :</span>  <?php echo $taverne->getNom(); ?></p>
                                <p><span class="titre"> Ville :</span><a href= "<?php echo '?c=ville&a=Show&id='.$taverne->getVille()->getId();?>" style="color:black"><?php echo $taverne->getVille()->getNom(); ?></a></p>
                                <p><span class="titre"> Bière(s) :</span>  <?php echo ($taverne->getBlonde()=='1')? 'blonde, ': ''; ?><?php echo ($taverne->getBrune()=='1')? 'brune, ': ''; ?><?php echo ($taverne->getRousse()=='1')? 'rousse': ''; ?></p>
                                <p><span class="titre"> Nombre total de chambres :</span>  <?php echo $taverne->getId(); ?></p>
                                <p><span class="titre"> Nombre de chambre(s) libre(s) :</span>  <?php echo $taverne->getChambres_libres(); ?></p>

                            </div>
                    </fieldset>
                </form>
            </aside>
    </div>