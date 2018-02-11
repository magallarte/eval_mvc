<?php

class Accueil
{
    private $listingnain;
    private $listingville;
    private $listinggroupe;
    private $listingtaverne;

    /**
     * Get the value of listingnain
     */ 
    public function getListingnain()
    {
        return $this->listingnain;
    }

    /**
     * Set the value of listingnain
     *
     * @return  self
     */ 
    public function setListingnain($listingnain)
    {
        $this->listingnain = $listingnain;

        return $this;
    }

    /**
     * Get the value of listingville
     */ 
    public function getListingville()
    {
        return $this->listingville;
    }

    /**
     * Set the value of listingville
     *
     * @return  self
     */ 
    public function setListingville($listingville)
    {
        $this->listingville = $listingville;

        return $this;
    }

    /**
     * Get the value of listinggroupe
     */ 
    public function getListinggroupe()
    {
        return $this->listinggroupe;
    }

    /**
     * Set the value of listinggroupe
     *
     * @return  self
     */ 
    public function setListinggroupe($listinggroupe)
    {
        $this->listinggroupe = $listinggroupe;

        return $this;
    }

    /**
     * Get the value of listingtaverne
     */ 
    public function getListingtaverne()
    {
        return $this->listingtaverne;
    }

    /**
     * Set the value of listingtaverne
     *
     * @return  self
     */ 
    public function setListingtaverne($listingtaverne)
    {
        $this->listingtaverne = $listingtaverne;

        return $this;
    }
}