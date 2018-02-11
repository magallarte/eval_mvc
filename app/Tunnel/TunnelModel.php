<?php

class TunnelModel extends CoreManager {

    
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
    const TABLE = '`tunnel`';

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
    ** // Affichage des informations sur un tunnel sélectionné
     * @param   int    $idtunnel
     * @return  mixed (array|bool)
    **/
    public function selectOne( $idtunnel ) {
        
        $query = 'SELECT `t_id` AS `Id`, `t_progres` AS `Progression`, `VILLEDEPART`.`v_id` AS `Ville_depart`,
         `VILLEARRIVEE`.`v_id` AS `Ville_arrivée`
        FROM `tunnel`
        INNER JOIN `ville`  AS `VILLEDEPART` ON `VILLEDEPART`.`v_id`=`t_villedepart_fk`
        INNER JOIN `ville`  AS `VILLEARRIVEE` ON `VILLEARRIVEE`.`v_id`=`t_villearrivee_fk`
        WHERE `t_id`=:idtunnel';
        $options = array( 'idtunnel' => array( 'VAL' => $idtunnel, 'TYPE' => PDO::PARAM_INT ) );
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