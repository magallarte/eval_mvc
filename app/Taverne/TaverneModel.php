<?php

class TaverneModel extends CoreManager {

     
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
    const TABLE = '`taverne`';

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
        
        $query ='SELECT `t_id` AS `Id`, `t_nom` AS `Nom` FROM `taverne` GROUP BY  `t_id` ORDER BY  `t_id` ASC';
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
    ** // Affichage des informations sur une taverne sélectionnée
     * @param   Groupe   $groupe
     * @return  mixed (array|bool)
    **/
    public function selectOne( $idtaverne ) {
        
         $query = 'SELECT `t_id` AS `Id`, `t_nom` AS `Nom`,`t_chambres` AS `chambres`,`t_blonde` AS `Blonde`, `t_brune` AS `Brune`, `t_rousse` AS `Rousse`, `VILLETAVERNE`.`v_id` AS `Id_ville`, `VILLETAVERNE`.`v_nom` AS `Ville`, (`t_chambres` - COUNT(`n_id`)) AS `Chambres_libres`, `g_taverne_fk` AS `groupe`
                FROM `taverne`
                LEFT JOIN `groupe` ON `t_id`=`g_taverne_fk`
                LEFT JOIN `nain` ON `g_id`=`n_groupe_fk`
                LEFT JOIN `ville` AS `VILLETAVERNE` ON `VILLETAVERNE`.`v_id`=`t_ville_fk`
                WHERE `taverne`.`t_id`=:idtaverne
                GROUP BY `t_nom`';
        $options = array( 'idtaverne' => array( 'VAL' => $idtaverne, 'TYPE' => PDO::PARAM_INT ) );
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
