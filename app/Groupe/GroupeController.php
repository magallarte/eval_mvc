<?php

class GroupeController
{
	private $model;

	public function __construct()
	{
		$this->model=new GroupeModel;
	}

	public function setModel($model)
	{
		$this->model = $model;

		return $this;
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
		$detailsgroupe=$this->model->selectOne($get['id']);
		$groupe=new Groupe($detailsgroupe[0]);

		$listenomsnains= explode(",", $detailsgroupe[0]['Nains']);
		$listeidsnains= explode(",", $detailsgroupe[0]['Id_nains']);

		$taverne=new Taverne(array('id'=>$detailsgroupe[0]['Id_taverne'], 'nom'=>$detailsgroupe[0]['Taverne'],'chambres_libres'=>$detailsgroupe[0]['Chambres_libres']));
		$villedepart=New Ville (array('id'=>$detailsgroupe[0]['Id_ville_depart'], 'nom'=>$detailsgroupe[0]['Ville_depart']));
		$villearrivee=New Ville (array('id'=>$detailsgroupe[0]['Id_ville_arrivee'], 'nom'=>$detailsgroupe[0]['Ville_arrivee']));
		$tunnel=new Tunnel(array('id'=>$detailsgroupe[0]['Tunnel'], 'progression'=>$detailsgroupe[0]['Progression']));
		$tunnel->setVille_depart($villedepart);
		$tunnel->setVille_arrivee($villearrivee);
		$groupe->setTaverne($taverne);
		$groupe->setTunnel($tunnel);
		
		$tunnels = $this->model->SelectTunnelsList();
		$tavernes = $this->model->SelectTavernesList();

        include('inc/header.php');
        include('app/Groupe/views/PageGroupe.php');
        include('inc/footer.php');
        }
	}

	public function UpdateAction($post,$get)
	{
		if( isset( $post ))
		{
		$detailsgroupe=$this->model->selectOne($get['id']);
		
		$groupe = new Groupe( $detailsgroupe[0] );
		$groupe->setHoraire_debut( $post['modifhorairedebut'] );
		$groupe->setHoraire_fin( $post['modifhorairefin'] );
		$groupe->setTunnel( $post['modiftunnel'] );
		$groupe->setTaverne( $post['modiftaverne'] );

		if( $this->model->updateOne($groupe))
		{
            $_SESSION['message'] = 'Modification(s) réussie(s)';
		}
		else
		{
            $_SESSION['message'] = 'Modification échouée';
        }

		$this->ShowAction($get);
		}
	}


}