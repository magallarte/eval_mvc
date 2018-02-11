<?php
/**
 * ------------------------------------------------------------
 * SINGLETON PDO
 * ------------------------------------------------------------
**/
class SPDO {
    /**
     * --------------------------------------------------
     * STATICS
     * --------------------------------------------------
    **/
    private static $_instance;
    /**
     * --------------------------------------------------
     * PROPERTIES
     * --------------------------------------------------
    **/
    private $_db;
    private $host;
    private $dbname;
    private $login;
    private $pass;
    private $charset;
    private $collate;




    /**
     * --------------------------------------------------
     * MAGIC METHODS
     * --------------------------------------------------
    **/
    /**
     * __construct - Class constructor
     * @param   string  $host
     *          string  $dbname
     *          string  $login
     *          string  $pass
     *          string  $charset
     *          string  $collate
     * @return  
    **/
    private function __construct() {
    }



    /**
     * --------------------------------------------------
     * STATIC METHODS
     * --------------------------------------------------
    **/
    /**
     * getInstance - 
     * @param   [string     $host]
     *          [string     $dbname]
     *          [string     $login]
     *          [string     $pass]
     *          [string     $charset]
     *          [string     $collate]
     * @return  
    **/
    public static function getInstance() {
        try {
            if( !isset( self::$_instance ) )
                self::$_instance = new SPDO;

            return self::$_instance;
        } catch( Exception $e ) {
            throw $e;
        }
    }



    /**
     * --------------------------------------------------
     * GETTERS
     * --------------------------------------------------
    **/
    /**
     * getPDO - 
     * @param   
     * @return  
    **/
    public function getPDO() {
        return $this->_db;
    }

    public function ini($host, $dbname, $login, $pass, $charset = 'utf8', $collate = 'utf8_general_ci')
    {
        $this->host=$host;
        $this->dbname=$dbname;
        $this->login=$login;
        $this->pass=$pass;
        $this->charset=$charset;
        $this->collate=$collate;
        $this->set_db();
    }

    /**
     * Get --------------------------------------------------
     */ 
    public function get_db()
    {
        return $this->_db;
    }

    /**
     * Set --------------------------------------------------
     *
     * @return  self
     */ 
    public function set_db()
    {
        try {
            $this->_db = new PDO( 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=' . $this->charset, $this->login, $this->pass, array( PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES ' . $this->charset . ' COLLATE ' . $this->collate, PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION ) );
        } catch( PDOException $e ) {
            throw $e;
        }

        return $this;
    }

    /**
     * Get the value of dbname
     */ 
    public function getDbname()
    {
        return $this->dbname;
    }

    /**
     * Set the value of dbname
     *
     * @return  self
     */ 
    public function setDbname($dbname)
    {
        $this->dbname = $dbname;

        return $this;
    }

    /**
     * Get the value of login
     */ 
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */ 
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

        /**
         * Get the value of pass
         */ 
        public function getPass()
        {
                return $this->pass;
        }

        /**
         * Set the value of pass
         *
         * @return  self
         */ 
        public function setPass($pass)
        {
                $this->pass = $pass;

                return $this;
        }
}