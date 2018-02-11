<?php

class Ville {
    use TypeTest;

    private $id;
    private $nom;
    private $superficie;
    private $nains;
    private $tavernes;
    private $tunnel_depart;
    private $tunnel_arrivee;

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
     * Get the value of superficie
     */ 
    public function getSuperficie()
    {
        return $this->superficie;
    }

    /**
     * Set the value of superficie
     *
     * @return  self
     */ 
    public function setSuperficie($superficie)
    {
        $this->superficie = $superficie;

        return $this;
    }

    /**
     * Get the value of nains
     */ 
    public function getNains()
    {
        return $this->nains;
    }

    /**
     * Set the value of nains
     *
     * @return  self
     */ 
    public function setNains($nains)
    {
        $this->nains = $nains;

        return $this;
    }

    /**
     * Get the value of tavernes
     */ 
    public function getTavernes()
    {
        return $this->tavernes;
    }

    /**
     * Set the value of tavernes
     *
     * @return  self
     */ 
    public function setTavernes($tavernes)
    {
        $this->tavernes = $tavernes;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTunnel_depart()
    {
        return $this->tunnel_depart;
    }

    /**
     * @param mixed $tunnel_depart
     *
     * @return self
     */
    public function setTunnel_depart($tunnel_depart)
    {
        $this->tunnel_depart = $tunnel_depart;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTunnel_arrivee()
    {
        return $this->tunnel_arrivee;
    }

    /**
     * @param mixed $tunnel_arrivee
     *
     * @return self
     */
    public function setTunnel_arrivee($tunnel_arrivee)
    {
        $this->tunnel_arrivee = $tunnel_arrivee;

        return $this;
    }
}