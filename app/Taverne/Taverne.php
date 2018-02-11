<?php

class taverne {
    use TypeTest;

    private $id;
    private $nom;
    private $chambres;
    private $chambres_libres;
    private $blonde;
    private $brune;
    private $rousse;
    private $ville;
    private $groupe;


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
     * Get the value of chambres
     */ 
    public function getChambres()
    {
        return $this->chambres;
    }

    /**
     * Set the value of chambres
     *
     * @return  self
     */ 
    public function setChambres($chambres)
    {
        $this->chambres = $chambres;

        return $this;
    }

    /**
     * Get the value of chambresLibres
     */ 
    public function getChambres_libres()
    {
        return $this->chambres_libres;
    }

    /**
     * Set the value of chambresLibres
     *
     * @return  self
     */ 
    public function setChambres_libres($chambres_libres)
    {
        $this->chambres_libres = $chambres_libres;

        return $this;
    }

    /**
     * Get the value of blonde
     */ 
    public function getBlonde()
    {
        return $this->blonde;
    }

    /**
     * Set the value of blonde
     *
     * @return  self
     */ 
    public function setBlonde($blonde)
    {
        $this->blonde = $blonde;

        return $this;
    }

    /**
     * Get the value of brune
     */ 
    public function getBrune()
    {
        return $this->brune;
    }

    /**
     * Set the value of brune
     *
     * @return  self
     */ 
    public function setBrune($brune)
    {
        $this->brune = $brune;

        return $this;
    }

    /**
     * Get the value of rousse
     */ 
    public function getRousse()
    {
        return $this->rousse;
    }

    /**
     * Set the value of rousse
     *
     * @return  self
     */ 
    public function setRousse($rousse)
    {
        $this->rousse = $rousse;

        return $this;
    }

    /**
     * Get the value of ville
     */ 
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function setVille($ville)
    {
        $this->ville = $ville;

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
}