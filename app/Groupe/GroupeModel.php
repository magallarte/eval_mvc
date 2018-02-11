<?php

class GroupeModel extends CoreManager {

    /**
     * --------------------------------------------------
     * PROPERTIES
     * --------------------------------------------------
    **/
    protected $db;



    /**
     * --------------------------------------------------
     * MAGIC METHODS
     * --------------------------------------------------
    **/
    /**
     * __construct - Class constructor
     * @param   PDO     $instance
     * @return
    **/
    public function __construct() {
        $this->db = SPDO::getInstance()->getPdo(); // Defines PDO instance
    }

    /**
     * --------------------------------------------------
     * CONSTANTS
     * --------------------------------------------------
    **/
    const TABLE = '`groupe`';

       /**
     * --------------------------------------------------
     * GETTERS & SETTERS
     * --------------------------------------------------
     **/

         /**
     * Get --------------------------------------------------
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * Set --------------------------------------------------
     *
     * @return  self
     */
    public function setDb($db)
    {
        $this->db = $db;

        return $this;
    }
       /**
     * --------------------------------------------------
    ** // Affichage des informations sur tous les groupes
     * @return  mixed (array|bool)
    **/
    public function selectAll() {

        $query ='SELECT `g_id` AS `Groupe` FROM `groupe` GROUP BY  `g_id` ORDER BY  `g_id` ASC';
        try {
            return $this->executeQuery( $query, $options);
        } catch( CoreException $e ) {
            throw $e;
        } catch( PDOException $e ) {
            throw new CoreException( $e->getMessage() );
        } catch( Exception $e ) {
            throw new CoreException( $e->getMessage() );
        }
     }

  /**
     * --------------------------------------------------
    ** // Affichage des informations sur un groupe sélectionné
     * @param   int   $idgroupe
     * @return  mixed (array|bool)
    **/
    public function selectOne( $id ) {

         $query = 'SELECT `g_id` AS `Id`, GROUP_CONCAT(DISTINCT`n_nom` SEPARATOR ",") AS `Nains`, GROUP_CONCAT(DISTINCT`n_id` SEPARATOR ",") AS `Id_nains`,
         `t_nom` AS `Taverne`, `taverne`.`t_id` AS `Id_taverne`,
          `t_villedepart_fk` AS `Id_ville_depart`, `VILLEDEPART`.`v_nom` AS `Ville_depart`,
          `t_villearrivee_fk` AS `Id_ville_arrivee`, `VILLEARRIVEE`.`v_nom` AS `Ville_arrivee`,
            `g_debuttravail` AS `Horaire_debut`,`g_fintravail` AS `Horaire_fin`, `t_progres` AS `Progression`, `tunnel`.`t_id` AS `Tunnel`,
            `t_chambres` AS `Chambres`,
            (`t_chambres` - COUNT(`n_id`)) AS `Chambres_libres`
           FROM `groupe`
            LEFT JOIN `nain` ON `g_id`=`n_groupe_fk`
             LEFT JOIN `taverne` ON `taverne`.`t_id`=`g_taverne_fk`
              LEFT JOIN `tunnel` ON `g_tunnel_fk`=`tunnel`.`t_id`
              LEFT JOIN `ville`  AS `VILLEARRIVEE` ON `VILLEARRIVEE`.`v_id`=`t_villearrivee_fk`
                LEFT JOIN `ville`  AS `VILLEDEPART` ON `VILLEDEPART`.`v_id`=`t_villedepart_fk`
               WHERE `g_id`=:id';
        $options = array( 'id' => array( 'VAL' => $id, 'TYPE' => PDO::PARAM_INT ) );
        try {
            return $this->executeQuery( $query, $options);
        } catch( CoreException $e ) {
            throw $e;
        } catch( PDOException $e ) {
            throw new CoreException( $e->getMessage() );
        } catch( Exception $e ) {
            throw new CoreException( $e->getMessage() );
        }
    }
  /**
     * --------------------------------------------------
    ** // Mise à jour de la base de données si une modification est demandée
    * @param   Groupe $groupe
     * @return
    **/
    public function updateOne( groupe $groupe) {

        $query = 'UPDATE `groupe` SET `groupe`.`g_debuttravail`=:modifhorairedebut, `groupe`.`g_fintravail`=:modifhorairefin,  `groupe`.`g_tunnel_fk`=:modiftunnel, `groupe`.`g_taverne_fk`=:modiftaverne WHERE `g_id`=:id';
        $options = array( 'id' => array( 'VAL' => $groupe->getId(), 'TYPE' => PDO::PARAM_INT ), 'modifhorairedebut' => array('VAL' => $groupe->getHoraire_debut(), 'TYPE' => PDO::PARAM_INT ), 'modifhorairefin' => array( 'VAL' => $groupe->getHoraire_fin(), 'TYPE' => PDO::PARAM_INT ),'modiftunnel' => array( 'VAL' => $groupe->getTunnel(), 'TYPE' => PDO::PARAM_INT ), 'modiftaverne' =>array( 'VAL' =>$groupe->getTaverne(), 'TYPE' => PDO::PARAM_INT ));
        try {
            return $this->executeQuery( $query, $options);
        } catch( CoreException $e ) {
            throw $e;
        } catch( PDOException $e ) {
            throw new CoreException( $e->getMessage() );
        } catch( Exception $e ) {
            throw new CoreException( $e->getMessage() );
        }
    }

         /**
     * --------------------------------------------------
    ** // Sélection de la liste des tunnels disponibles
     * @return  mixed (array|bool)
    **/
    public function SelectTunnelsList() {

         $query = 'SELECT `t_id` FROM `tunnel` GROUP BY `t_id`';
        try {
            return $this->executeQuery( $query, $options);
        } catch( CoreException $e ) {
            throw $e;
        } catch( PDOException $e ) {
            throw new CoreException( $e->getMessage() );
        } catch( Exception $e ) {
            throw new CoreException( $e->getMessage() );
        }
    }

     /**
     * --------------------------------------------------
    ** // Sélection de la liste des tavernes disponibles
     * @return  mixed (array|bool)
    **/
    public function SelectTavernesList() {

         $query = 'SELECT `t_id`, `t_nom`, (`t_chambres` - COUNT(`n_id`)) AS `chambresLibres`
                                                FROM `taverne`
                                                LEFT JOIN `groupe` ON `g_taverne_fk`=`t_id`
                                                LEFT JOIN `nain` ON `g_id`=`n_groupe_fk`
                                                GROUP BY `t_nom`';
        try {
            return $this->executeQuery( $query, $options);
        } catch( CoreException $e ) {
            throw $e;
        } catch( PDOException $e ) {
            throw new CoreException( $e->getMessage() );
        } catch( Exception $e ) {
            throw new CoreException( $e->getMessage() );
        }
    }

}