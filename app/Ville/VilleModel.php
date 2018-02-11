<?php

class VilleModel extends CoreManager {

     
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
    const TABLE = '`ville`';

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
    ** // Affichage des informations sur toutes les villes
     * @return  mixed (array|bool)
    **/
    public function selectAll() {
        
        $query ='SELECT `v_id` AS `Id`, `v_nom` AS `Nom`, `v_superficie` AS `Superficie` FROM `ville` GROUP BY  `v_id` ORDER BY  `v_id` ASC';
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
    ** // Affichage des informations sur une  ville sélectionnée
     * @param   Groupe   $groupe
     * @return  mixed (array|bool)
    **/
    public function selectOne( $idville ) {
        
         $query = 'SELECT `VILLE`.`v_id` AS `Id`, `VILLE`.`v_nom` AS `Nom`, `VILLE`.`v_superficie` AS `Superficie`,
          GROUP_CONCAT(DISTINCT`n_nom` SEPARATOR ",") AS `Nains`, GROUP_CONCAT(DISTINCT`n_id` SEPARATOR ",") AS `Id_nains`,
           GROUP_CONCAT(DISTINCT `taverne`.`t_nom` SEPARATOR ",") AS `Tavernes`, GROUP_CONCAT(DISTINCT `taverne`.`t_id` SEPARATOR ",") AS `Id_tavernes`,
            `TUNNELDEPART`.`t_id` AS `Tunnel_depart`, `TUNNELARRIVEE`.`t_id` AS `Tunnel_arrivee`,
            `TUNNELDEPART`.`t_progres` AS `Progression_tunnel_depart`, `TUNNELARRIVEE`.`t_progres` AS `Progression_tunnel_arrivee`  
            FROM `ville` AS `VILLE`
             INNER JOIN `nain` ON `VILLE`.`v_id`=`n_ville_fk`
              INNER JOIN `taverne` ON `t_ville_fk`= `VILLE`.`v_id`
               INNER JOIN `tunnel` AS `TUNNELDEPART` ON `TUNNELDEPART`.`t_villedepart_fk`= `VILLE`.`v_id` 
               INNER JOIN `tunnel` AS `TUNNELARRIVEE` ON `TUNNELARRIVEE`.`t_villearrivee_fk`= `VILLE`.`v_id`
        WHERE `VILLE`.`v_id`=:idville';

        $options = array( 'idville' => array( 'VAL' => $idville, 'TYPE' => PDO::PARAM_INT ) );
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