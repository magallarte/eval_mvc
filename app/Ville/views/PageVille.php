<div class="flex-wrapper horizontal justify">
        <h3 class="legend">Fiche Ville</h3>

            <aside class="x2" role="complementary" style="order:1">
                
                    <fieldset class="fieldset">
                        <legend class="legend">Descriptif</legend>

                        <div class="wrapper">
                            <p><span class="titre"> ID :</span>  <?php echo $ville->getId(); ?></p>
                            <p><span class="titre"> Ville :</span>  <?php echo $ville->getNom(); ?></p>
                            <p><span class="titre"> Superficie :</span>  <?php echo $ville->getSuperficie(); ?> m2 </p>
                            <p><span class="titre"> Nain(s) né(s) dans cette ville :</span>
                            <ul>
                                <?php
                                foreach ($listeidsnains as $key => $value)
                                {
                                echo '<li><a href="?c=nain&a=Show&id='.$value. '" style="color:black">' .$listenomsnains[$key].'</a></p></li>';
                                }
                                ?>
                            </ul>
                            <p><span class="titre"> Taverne(s) présente(s) dans cette ville :</span>
                            <ul>
                                <?php
                                foreach ($listeidstavernes as $key => $value)
                                {
                                echo '<li><a href= "?c=taverne&a=Show&id='.$value. '" style="color:black">' .$listenomstavernes[$key].'</a></p></li>';
                                }
                                ?>
                            </ul>
                            <p><span class="titre"> Tunnel vers cette ville : </span><?php echo $ville->getTunnel_arrivee()->getId(); ?></p>
                            <p><span class="titre"> Progression du tunnel : </span><?php echo ($ville->getTunnel_arrivee()->getProgression()=='100')? $ville->getTunnel_arrivee()->getProgression().'%(ouvert)': $ville->getTunnel_arrivee()->getProgression().'%'; ?> </p>
                            <p><span class="titre"> Tunnel au départ de cette ville : </span><?php echo $ville->getTunnel_depart()->getId(); ?></p>
                            <p><span class="titre"> Progression du tunnel : </span><?php echo ($ville->getTunnel_depart()->getProgression()=='100')? $ville->getTunnel_depart()->getProgression().'%(ouvert)': $ville->getTunnel_depart()->getProgression().'%'; ?> </p>
                        </div>
                    </fieldset>
                
            </aside>
</div>