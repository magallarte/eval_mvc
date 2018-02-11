<?php

class AccueilController
{
private $nainmodel;
private $villemodel;
private $groupemodel;
private $tavernemodel;

/**
     * --------------------------------------------------
     * METHODS
     * --------------------------------------------------
    **/
    /**
     * Affiche le listing des nains,villes,groupes et tavernes
     * @return  
    **/
    public function ShowListingsAction( )
    {
        $this->nainmodel= new NainModel;
        $listingnain=$this->nainmodel->SelectAll();
        $this->villemodel= new VilleModel;
        $listingville=$this->villemodel->SelectAll();
        $this->groupemodel= new GroupeModel;
        $listinggroupe=$this->groupemodel->SelectAll();
        $this->tavernemodel= new TaverneModel;
        $listingtaverne=$this->tavernemodel->SelectAll();

        if( isset( $listingnain ) && count( $listingnain )>0 && isset( $listingville ) && count( $listingville )>0 && isset( $listinggroupe) && count( $listinggroupe )>0 && isset( $listingtaverne ) && count( $listingtaverne )>0 )
            {
            include('inc/header.php');
            include('App/Accueil/views/PageAccueil.php');
            include('inc/footer.php');
            }
    }

 }