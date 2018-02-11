    <div class="flex-wrapper horizontal justify">
        <h3 class="legend">Fiche Nain</h3>

            <aside class="x2" role="complementary" style="order:1">
                <form action="?c=nain&a=Update&id=<?php echo $nain->getId(); ?>" class="form" method="post">
                    <fieldset class="fieldset">
                        <legend class="legend">Identité</legend>

                            <div class="wrapper">
                                    <p><span class="titre"> ID :</span>  <?php echo $nain->getId(); ?><input type="hidden" name="id" value="<?php echo $nain->getId() ?>"></p>
                                    <p><span class="titre"> Nom :</span>  <?php echo $nain->getNom(); ?></p>
                                    <p><span class="titre"> Longueur de barbe :</span>  <?php echo $nain->getBarbe(); ?> cm </p>
                                    <p><span class="titre"> Ville de naissance :</span><a href= "<?php echo '?c=ville&a=Show&id='.$nain->getVille_natale()->getId();?>"><?php echo $nain->getVille_natale()->getNom(); ?></a></p>
                                    <p><span class="titre"> Taverne :</span><a href= "<?php echo '?c=taverne&a=Show&id='.$nain->getGroupe()->GetTaverne()->GetId();?>"><?php echo ($nain->getGroupe()->GetTaverne()->GetId()==NULL)? '': ''.$nain->getGroupe()->GetTaverne()->GetNom().''; ?></a></p>
                                    <p><span class="titre"> Horaires de travail :</span>  de <?php echo $nain->getGroupe()->getHoraire_debut(); ?> à <?php echo $nain->getGroupe()->getHoraire_fin(); ?> </p>
                                    <p><span class="titre"> Tunnel :</span>  allant de <a href= "<?php echo '?c=ville&a=Show&id='.$nain->getGroupe()->GetTunnel()->getVille_depart();?>"><?php echo $nain->getGroupe()->GetTunnel()->getVille_depart(); ?></a> à <a href= "<?php echo DOMAIN. "?c=ville&a=Show&id=".$nain->getGroupe()->GetTunnel()->getVille_arrivee();?>"><?php echo $nain->getGroupe()->GetTunnel()->getVille_arrivee(); ?></a> </p>
                                    <p><span class="titre"> Groupe :</span><?php echo ($nain->getGroupe()->getId()==NULL)? 'Aucun groupe': '<a href= "?c=groupe&a=Show&id='. $nain->getGroupe()->getId().'"'. $nain->getGroupe()->getId(); ?></a></p>

                            </div>
                              <!--   Formulaire pour changement du groupe -->
                            <div class="wrapper">
                                <h3 class="legend">Modification du groupe</h3>
                                    <br>
                                    <label for="liste-groupe">Groupe</label>
                                        <select id="liste-groupe" name="modifgroupe">
                                        <?php foreach ($groupes as $groupe)
                                                 {
                                                     if($groupe['n_groupe_fk']===$nain->getGroupe())
                                                     {
                                                    echo '<option selected="selected" value="'.$groupe['n_groupe_fk'].'">' .$groupe['n_groupe_fk']. '</option>';
                                                    }
                                                    else
                                                    {
                                                    echo '<option value="'.$groupe['n_groupe_fk'].'">' .$groupe['n_groupe_fk']. '</option>';
                                                    }

                                                }
                                        ?>
                                        </select>
                            </div>
                    </fieldset>
                    <br>
                    <div style="text-align:middle;">
                        <button class="button add dark" type="submit"><span class="inner">Modifier le groupe</span></button>
                    </div>
                    <?php
                        if( isset( $_SESSION['message'] ) ) {
                            echo $_SESSION['message'];
                            unset( $_SESSION['message'] );
                        }
                    ?>
                </form>
            </aside>
    </div>    