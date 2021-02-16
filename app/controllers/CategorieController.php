<?php

class CategorieController extends Controller
{
	public function index() : void
	{
		$this->model('CategorieModel');
		$categories = $this->CategorieModel->findAllCategories();
		// var_dump($categories);

		$data = array(
			'title' => 'Categorie',
			'categories' => $categories
		);
		$this->view('categorie/index',$data);
	}

	public function create() : void
	{
		$this->model('CategorieModel');
		if(isset($_POST['categorie_submit'])){
			// var_dump($_POST['libelleCateg'].''.$_POST['descCateg']);
			try 
			{
				$data = [
					'libelleCateg' => $_POST['libelleCateg'],
					'descCateg' => $_POST['descCateg']
				];
				$this->CategorieModel->addCategorie($data);
			} 
			catch (ValidationException $e){
				$errors = $e->getError();
				echo "Erreur";
			}
		}
		$this->view('categorie/create');
	}


	public function edit($categ_id = 0) : void
	{
		// var_dump($categ_id);
		$this->model('CategorieModel');
		$categorie = $this->CategorieModel->findCategorie($categ_id);
		// var_dump($categorie);

		$data = [
			'categ_id' => $_POST['categ_id'],
			'libelleCateg' => $_POST['libelleCateg'],
			'descCateg' => $_POST['descCateg']
		];

		if(isset($_POST['categorie_update'])){
			// var_dump($data);
			try 
			{
				$this->CategorieModel->editCategorie($data);
			} 
			catch ( ValidationException $e ) {
				$errors = $e->getError();
			}
		}

		$this->view('categorie/edit',compact('categorie'));
	}

	public function delete($categ_id=0) : void
	{
		// var_dump($categ_id);
		$categ_id = (int)$categ_id;
		$this->model('CategorieModel');
		$this->CategorieModel->deleteCategorie($categ_id);
	}

}

class_alias('CategorieController','Categorie');
