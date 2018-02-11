<?php

class tunnel {
    use TypeTest;

    private $id;
    private $progression;
    private $ville_depart;
    private $ville_arrivee;

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
       $this->hydrate($datas);
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
     * Get the value of progression
     */ 
    public function getProgression()
    {
        return $this->progression;
    }

    /**
     * Set the value of progression
     *
     * @return  self
     */ 
    public function setProgression($progression)
    {
        $this->progression = $progression;

        return $this;
    }

    /**
     * Get the value of ville_depart
     */ 
    public function getVille_depart()
    {
        return $this->ville_depart;
    }

    /**
     * Set the value of ville_depart
     *
     * @return  self
     */ 
    public function setVille_depart($ville_depart)
    {
        $this->ville_depart = $ville_depart;

        return $this;
    }

    /**
     * Get the value of ville_arrivée
     */ 
    public function getVille_arrivee()
    {
        return $this->ville_arrivée;
    }

    /**
     * Set the value of ville_arrivée
     *
     * @return  self
     */ 
    public function setVille_arrivee($ville_arrivée)
    {
        $this->ville_arrivée = $ville_arrivée;

        return $this;
    }
}