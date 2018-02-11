<?php

class VilleController
{
	private $model;
    private $ville;
    
    public function __construct()
	{
        $this->model=new VilleModel;
	}

	public function ShowAction($get)
	{
		if(!isset($get['id']))
		{
		    header('Location:.');
		    exit;
		}
		else
		{

		$detailsville=$this->model->selectOne($get['id']);
		$ville=new Ville($detailsville[0]);

		$listenomsnains= explode(",", $detailsville[0]['Nains']);
		$listeidsnains= explode(",", $detailsville[0]['Id_nains']);

		$listenomstavernes= explode(",", $detailsville[0]['Tavernes']);
		$listeidstavernes= explode(",", $detailsville[0]['Id_tavernes']);

		$tunnel_depart=new Tunnel(array('Id'=>$detailsville[0]['Tunnel_depart'], 'Progression'=>$detailsville[0]['Progression_tunnel_depart'], 'Ville_depart'=>$detailsville[0]['Id']));
		$ville->setTunnel_depart($tunnel_depart);

		$tunnel_arrivee=new Tunnel(array('Id'=>$detailsville[0]['Tunnel_arrivee'], 'Progression'=>$detailsville[0]['Progression_tunnel_arrivee'], 'Ville_arrivee'=>$detailsville[0]['Id']));
		$ville->setTunnel_arrivee($tunnel_arrivee);

		
        include('inc/header.php');
        include('App/Ville/views/PageVille.php');
        include('inc/footer.php');
        }
	}

	public function UpdateAction($idnain, $modifgroupe)
	{
		if( isset( $_POST['modifgroupe'] ) && isset( $_POST['idnainmodifgroupe'] ))
		$this->model->updateOne($idnain, $modifgroupe);
	}
}