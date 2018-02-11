<?php

class TaverneController
{
	private $model;
	private $taverne;

    public function __construct()
	{
        $this->model=new TaverneModel;
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
		$detailstaverne=$this->model->selectOne($get['id']);
		$taverne=new Taverne($detailstaverne[0]);
		$ville=new Ville(array('id'=>$detailstaverne[0]['Id_ville'],'nom'=>$detailstaverne[0]['Ville']));

		$taverne->setVille($ville);

        include('inc/header.php');
        include('app/Taverne/views/PageTaverne.php');
        include('inc/footer.php');
        }
	}

	public function UpdateAction($idnain, $modifgroupe)
	{
		if( isset( $_POST['modifgroupe'] ) && isset( $_POST['idnainmodifgroupe'] ))
		$this->model->updateOne($idnain, $modifgroupe);
	}
}


    