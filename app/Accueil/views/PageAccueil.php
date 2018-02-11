
    <div class="flex-wrapper horizontal justify">
        <div class="x3" style="order:3">

            <!-- Affichage de la liste des nains -->
            <section>
                <h3 class="legend">Liste des nains</h3>

                        <table>
                            <thead>
                                <tr>
                                    <th class="text-cap">ID </th>
                                    <th class="text-cap">Nom </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach( $listingnain as $line ) : ?>
                                <tr>
                                    <td><?php echo $line['Id']; ?></td>
                                    <td><?php echo $line['Nom'];?></td>
                                    <td><a href="?c=nain&a=Show&id=<?php echo $line['Id']; ?>">Voir fiche</a></td>
                                </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>

                        <br>

            </section>

            <!-- Affichage de la liste des villes -->
            <section>
                <h3 class="legend">Liste des villes</h3>

                        <table>
                            <thead>
                                <tr>
                                    <th class="text-cap">ID </th>
                                    <th class="text-cap">Ville </th>
                                    <th></th>
                              </tr>
                            </thead>
                            <tbody>

                                <?php foreach( $listingville as $line ) : ?>
                                <tr style="border-bottom:thin solid;">
                                    <td><?php echo $line['Id']; ?></td>
                                    <td><?php echo $line['Nom']; ?></td>
                                    <td><a href="?c=nain&a=Show&id=<?php echo $line['Id']; ?>">Voir fiche</a></td>
                               </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>

                        <br>

            </section>

            <!-- Affichage de la liste des groupes -->
            <section>
                <h3 class="legend">Liste des groupes</h3>

                        <table>
                            <thead>
                                <tr>
                                    <th class="text-cap">Groupe </th>
                                    <th></th>
                               </tr>
                            </thead>
                            <tbody>

                                <?php foreach( $listinggroupe as $line ) : ?>
                                <tr>
                                    <td><?php echo $line['Groupe']; ?></td>
                                    <td><a href="?c=groupe&a=Show&id=<?php echo $line['Groupe']; ?>">Voir fiche</a></td>
                                </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>

                        <br>

            </section>

            <!-- Affichage de la liste des tavernes -->
            <section>
                <h3 class="legend">Liste des tavernes</h3>

                        <table>
                            <thead>
                                <tr>
                                    <th class="text-cap">ID </th>
                                    <th class="text-cap">Taverne </th>
                                    <th></th>
                             </tr>
                            </thead>
                            <tbody>

                                <?php foreach( $listingtaverne as $line ) : ?>
                                <tr>
                                    <td><?php echo $line['Id']; ?></td>
                                    <td><?php echo $line['Nom']; ?></td>
                                    <td><a href="?c=taverne&a=Show&id=<?php echo $line['Id']; ?>">Voir Fiche</a></td>
                                    
                                </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
            </section>

        </div>
    </div>