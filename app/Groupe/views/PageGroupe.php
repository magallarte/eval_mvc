<div class="flex-wrapper horizontal justify">
    <h3 class="legend">Fiche Groupe</h3>

            <aside class="x2" role="complementary" style="order:1">
                <form action="?c=groupe&a=Update&id=<?php echo $groupe->getId(); ?>" class="form" method="post">
                    <fieldset class="fieldset">
                        <legend class="legend">Descriptif</legend>

                            <div class="wrapper">
                                <p><span class="titre"> ID :</span>  <?php echo $groupe->getId(); ?><input type="hidden" name="idgroupemodif" value="<?php echo $groupe->getId(); ?>"></p>
                                <p><span class="titre"> Nain(s) né(s) dans cette ville :</span>
                                    <ul>
                                        <?php
                                        foreach ($listeidsnains as $key => $idnain)
                                        {
                                        echo '<li><a href= "?c=nain&a=Show&id='.$idnain. '" style="color:black">' .$listenomsnains[$key].'</a></p></li>';
                                        }
                                        ?>
                                    </ul>
                                <p><span class="titre"> Taverne :</span><a href= "<?php echo '?c=taverne&a=Show&id='.$groupe->getTaverne()->getId();?>" style="color:black"><?php echo $groupe->getTaverne()->getNom(); ?></a></p>
                                <p><span class="titre"> Horaires de travail :</span>  de <?php echo $groupe->getHoraire_Debut(); ?> à <?php echo $groupe->getHoraire_Fin(); ?> </p>
                                <p><span class="titre"> Tunnel :</span>  n°<?php echo $groupe->getTunnel()->getId(); ?> allant de la ville <a href= "<?php echo '?c=ville&a=Show&id='.$groupe->getTunnel()->getVille_Depart()->getId();?>" style="color:black"><?php echo $groupe->getTunnel()->getVille_Depart()->getNom(); ?></a> à la ville <a href= "<?php echo '?c=ville&a=Show&id='.$groupe->getTunnel()->getVille_Arrivee()->getId();?>" style="color:black"><?php echo $groupe->getTunnel()->getVille_Arrivee()->getNom(); ?></a> </p>
                                <p><span class="titre"> Action dans le tunnel : </span><?php echo ($groupe->getTunnel()->getProgression()=='100')? ' entretien': 'creusage à '.$groupe->getTunnel()->getProgression().'%'; ?> </p>
                            </div>

                            <!--   Formulaire pour changement des horaires -->

                            <div class="wrapper">
                            <h3 class="legend">Modification des horaires</h3>
                                <br>
                                    <label for="modifhorairedebut">Horaires de début</label>
                                    <input type="time" id="modifhorairedebut" name="modifhorairedebut" value="<?php echo $groupe->getHoraire_debut(); ?>">
                                    <label for="modifhorairefin">Horaires de fin</label>
                                    <input type="time" id="modifhorairefin" name="modifhorairefin" value="<?php echo $groupe->getHoraire_fin(); ?>">
                            </div>
                                    
                            <!--   Formulaire pour changement de tunnel -->
                            <div class="wrapper">
                                <h3 class="legend">Modification du tunnel</h3>
                                <br>
                                    <label for="liste-groupe">Tunnel</label>
                                    <select id="liste-groupe" name="modiftunnel">
                                        <?php
                                            foreach ($tunnels as $value)
                                            {
                                                if ($value['t_id']===$groupe->getTunnel()->getId())
                                                {
                                                echo '<option selected="selected" value="'.$value['t_id'].'">' .$value['t_id']. '</option>';
                                                }
                                                else
                                                {
                                                echo '<option value="'.$value['t_id'].'">' .$value['t_id']. '</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                            </div>
                                    
                            <!--   Formulaire pour changement de taverne -->
                            <div class="wrapper">
                                <h3 class="legend">Modification de la taverne</h3>
                                <br>
                                    <label for="liste-groupe">Taverne</label>
                                    <select id="liste-groupe" name="modiftaverne">
                                            <?php
                                            foreach ($tavernes as $value)
                                            {
                                                if ($value['t_id']===$groupe->getTaverne()->getId())
                                                {
                                                echo ($value['chambresLibres']>'0')? '<option selected="selected" value="'.$value['t_id'].'">' .$value['t_nom']. '</option>': '';
                                                }
                                                else
                                                {
                                                echo ($value['chambresLibres']>'0')? '<option value="'.$value['t_id'].'">' .$value['t_nom']. '</option>': '';
                                                }
                                            }
                                            ?>
                                    </select>
                            </div>
                    </fieldset>

                    <div style="text-align:middle;">
                        <button class="button add dark" type="submit"><span class="inner">Modifier</span></button>
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