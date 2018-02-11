<?php

class groupe {
    use TypeTest;

    private $id;
    private $nains;
    private $taverne;
    private $horaire_debut;
    private $horaire_fin;
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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNains()
    {
        return $this->nains;
    }

    /**
     * @param mixed $nains
     *
     * @return self
     */
    public function setNains($nains)
    {
        $this->nains = $nains;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHoraire_debut()
    {
        return $this->horaire_debut;
    }

    /**
     * @param mixed $horaire_debut
     *
     * @return self
     */
    public function setHoraire_debut($horaire_debut)
    {
        $this->horaire_debut = $horaire_debut;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHoraire_fin()
    {
        return $this->horaire_fin;
    }

    /**
     * @param mixed $horaire_fin
     *
     * @return self
     */
    public function setHoraire_fin($horaire_fin)
    {
        $this->horaire_fin = $horaire_fin;

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

}