<?php

class NainController
{
	private $model;

	public function __construct()
	{
		$this->model=new NainModel;
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
		$detailsnain=$this->model->selectOne($get['id']);
		$nain=new Nain($detailsnain[0]);

		$groupe=new Groupe(array('id'=>$detailsnain[0]['Groupe'],'horaire_debut'=>$detailsnain[0]['Horaire_debut'], 'horaire_fin'=>$detailsnain[0]['Horaire_fin'] ));
		$taverne=new Taverne(array('id'=>$detailsnain[0]['Id_taverne'], 'nom'=>$detailsnain[0]['Taverne'] ));
		$tunnel=new Tunnel(array('ville_depart'=>$detailsnain[0]['Ville_depart'],'id_ville_depart'=>$detailsnain[0]['Id_ville_depart'],'ville_arrivee'=>$detailsnain[0]['Ville_arrivee'], 'id_ville_depart'=>$detailsnain[0]['Id_ville_depart'] ));
		$groupe->setTaverne($taverne);
		$groupe->setTunnel($tunnel);
		$nain->setGroupe($groupe);

		$ville=new Ville (array('id'=>$detailsnain[0]['Id_ville_natale'], 'nom'=>$detailsnain[0]['Ville_natale'] ));
		$nain->setVille_natale($ville);


		$groupes = $this->model->SelectGroupList();
		
        include('inc/header.php');
        include('App/Nain/views/PageNain.php');
        include('inc/footer.php');
        }
	}

	public function UpdateAction($post,$get)
	{
		if( isset( $post['modifgroupe'] ))
		{
		$detailsnain=$this->model->selectOne($get['id']);
		
		$nain = new Nain( $detailsnain[0] );
			if( $post['modifgroupe']==0 )
			{
				$nain->setGroupe( null );
			}
			else
			{
				$nain->setGroupe( $post['modifgroupe'] );
			}
		if( $this->model->updateOne($nain))
		{
            $_SESSION['message'] = 'Groupe du nain modifié';
		}
		else
		{
            $_SESSION['message'] = 'Modification échouée';
        }

		$this->ShowAction($get);
		}
	}

}

