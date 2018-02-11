<?php

class NainModel extends CoreManager {

    
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
    const TABLE = '`nain`';

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
    ** // Affichage des informations sur tous les nains
     * @return  mixed (array|bool)
    **/
    public function selectAll() {
        
        $query = 'SELECT `n_id` AS `Id`,`n_nom` AS `Nom`FROM `nain` ORDER BY  `n_id` ASC';
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
    ** // Affichage des informations sur un nain sélectionné
     * @param   Nain    $nain
     * @return  mixed (array|bool)
    **/
    public function selectOne( $idnain ) {
        
        $query = 'SELECT `n_id` AS `Id`,`n_nom` AS `Nom`, `n_barbe` AS `Barbe`, `VILLENAISSANCE`.`v_id` AS `Id_ville_natale`, `VILLENAISSANCE`.`v_nom` AS `Ville_natale`,
         `n_groupe_fk` AS `Groupe`, `taverne`.`t_id` AS `Id_taverne`,`t_nom` AS `Taverne`, `tunnel`.`t_id` AS `Tunnel`,`VILLEDEPART`.`v_nom` AS `Ville_depart`,
          `VILLEDEPART`.`v_id` AS `Id_ville_depart`,`VILLEARRIVEE`.`v_nom` AS `Ville_arrivee`, `VILLEARRIVEE`.`v_id` AS `Id_ville_arrivee`, `g_debuttravail` AS `Horaire_debut`, `g_fintravail` AS `Horaire_fin`
        FROM `nain`
        LEFT JOIN `groupe` ON `g_id`=`n_groupe_fk`
        LEFT JOIN `taverne` ON `taverne`.`t_id`=`g_taverne_fk`
        LEFT JOIN `tunnel` ON `g_tunnel_fk`=`tunnel`.`t_id`
        LEFT JOIN `ville` AS `VILLENAISSANCE` ON `VILLENAISSANCE`.`v_id`=`n_ville_fk`
        LEFT JOIN `ville` AS `VILLEDEPART` ON `VILLEDEPART`.`v_id`=`t_villedepart_fk`
        LEFT JOIN `ville` AS `VILLEARRIVEE` ON `VILLEARRIVEE`.`v_id`=`t_villearrivee_fk`
        WHERE `n_id`=:idnain';
        $options = array( 'idnain' => array( 'VAL' => $idnain, 'TYPE' => PDO::PARAM_INT ) );
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
    ** // Mise à jour de la base de données si une modification de groupe est demandée
    * @param   Nain    $nain
    * @param   int    $modifgroupe
     * @return
    **/
    public function updateOne( nain $nain ) {
        
        $query = 'UPDATE `nain` SET `n_groupe_fk`=:modifgroupe WHERE `n_id`=:idnain';
        $options = array( 'modifgroupe' => array( 'VAL' => $nain->getGroupe(), 'TYPE' => PDO::PARAM_INT ), 'idnain' => array( 'VAL' => $nain->getId(), 'TYPE' => PDO::PARAM_INT ) );
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
    ** // Sélection de la liste des groupes disponibles
     * @return  mixed (array|bool)
    **/
    public function SelectGroupList() {
        
         $query = 'SELECT `n_groupe_fk` FROM `nain` GROUP BY `n_groupe_fk`';
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