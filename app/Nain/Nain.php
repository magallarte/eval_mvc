<?php

class Nain {
    use TypeTest;

    private $id;
    private $nom;
    private $barbe;
    private $groupe;
    private $ville_natale;
    private $taverne;
    private $tunnel;

/**
     * --------------------------------------------------
     * MAGIC METHODS
     * --------------------------------------------------
    **/
    /**
     * __construct - Class constructor
     * @param   array   $datas
     * @return  
    **/
    public function __construct( $datas )
    {
        $this->hydrate( $datas );
    }

/**
     * --------------------------------------------------
     *METHODS
     * --------------------------------------------------
    **/
    public function hydrate($settings)
        {
            if(!is_null ($settings))
            {
                foreach ($settings as $property => $value)
                {
                    $property = strtolower($property);
                    $methodName='set'. ucwords($property);
                if(method_exists($this,$methodName))
                    $this->$methodName($value);
                }
            }
        }
    /**
     * --------------------------------------------------
     *GETTERS & SETTERS
     * --------------------------------------------------
    **/ 

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of barbe
     */ 
    public function getBarbe()
    {
        return $this->barbe;
    }

    /**
     * Set the value of barbe
     *
     * @return  self
     */ 
    public function setBarbe($barbe)
    {
        $this->barbe = $barbe;

        return $this;
    }

    /**
     * Get the value of groupe
     */ 
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * Set the value of groupe
     *
     * @return  self
     */ 
    public function setGroupe($groupe)
    {
        $this->groupe = $groupe;

        return $this;
    }

    /**
     * Get the value of ville_natale
     */ 
    public function getVille_natale()
    {
        return $this->ville_natale;
    }

    /**
     * Set the value of ville_natale
     *
     * @return  self
     */ 
    public function setVille_natale($ville_natale)
    {
        $this->ville_natale = $ville_natale;

        return $this;
    }

    /**
     * Get the value of taverne
     */ 
    public function getTaverne()
    {
        return $this->taverne;
    }

    /**
     * Set the value of taverne
     *
     * @return  self
     */ 
    public function setTaverne($taverne)
    {
        $this->taverne = $taverne;

        return $this;
    }

    /**
     * Get the value of tunnel
     */ 
    public function getTunnel()
    {
        return $this->tunnel;
    }

    /**
     * Set the value of tunnel
     *
     * @return  self
     */ 
    public function setTunnel($tunnel)
    {
        $this->tunnel = $tunnel;

        return $this;
    }
}