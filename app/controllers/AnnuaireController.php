<?php

class AnnuaireController extends Controller
{
	public function index() : void
	{
		$this->model('AnnuaireModel');
		$annuaires = $this->AnnuaireModel->findAllAnnuaires();
		// var_dump($annuaires);

		$data = array(
			'title' => 'Annuaire',
			'annuaires' => $annuaires,
		);
		$this->view('annuaire/index',$data);
	}

	public function create() : void
	{
		$this->model('AnnuaireModel');
		$this->model('CategorieModel');
		$categories = $this->CategorieModel->findAllCategories();
		if(isset($_POST['annuaire_submit'])){
			// var_dump($_POST['libelle_annuaire'].''.$_POST['description_annuaire'].''.$_POST['categ_id']);
			try 
			{
				$data = [
					'libelle_annuaire' => $_POST['libelle_annuaire'],
					'description_annuaire' => $_POST['description_annuaire'],
					'categ_id' => $_POST['categ_id'],
					'fiche_annuaire' => $_FILES['fiche_annuaire']
				];
				// var_dump($data);
				$this->AnnuaireModel->addAnnuaire($data);
			} 
			catch (ValidationException $e){
				$errors = $e->getError();
				echo "Erreur";
			}
		}
		$this->view('annuaire/create',compact('categories'));
	}


	public function edit($annuaire_id = 0) : void
	{
		// var_dump($annuaire_id);
		$this->model('AnnuaireModel');
		$this->model('CategorieModel');
		$annuaire = $this->AnnuaireModel->findAnnuaire($annuaire_id);
		$categories = $this->CategorieModel->findAllCategories();

		$data = [
			'annuaire_id' => $_POST['annuaire_id'],
			'libelle_annuaire' => $_POST['libelle_annuaire'],
			'description_annuaire' => $_POST['description_annuaire'],
			'categ_id' => $_POST['categ_id']
		];

		if(isset($_POST['annuaire_update'])){
			// var_dump($data);
			try 
			{
				$this->AnnuaireModel->editAnnuaire($data);
			} 
			catch ( ValidationException $e ) {
				$errors = $e->getError();
			}
		}

		$this->view('annuaire/edit',compact('annuaire','categories'));
	}

	public function delete($annuaire_id = 0) : void
	{
		// var_dump($annuaire_id);
		$annuaire_id = (int)$annuaire_id;
		$this->model('AnnuaireModel');
		$annuaire = $this->AnnuaireModel->findAnnuaire($annuaire_id);
		if (!empty( $annuaire['fiche_annuaire'])){
			File::delete( $annuaire['fiche_annuaire'] );
		}
		$this->AnnuaireModel->deleteAnnuaire($annuaire_id);
	}
}

class_alias('AnnuaireController','Annuaire');
