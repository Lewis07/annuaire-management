<?php

class CategorieModel extends Model
{
	public function findAllCategories() : array
	{
		$sql = Sql::query()
			->select('categorie.*')
			->from('categorie')
			->get();

		$stmt = $this->db->prepare($sql);
        $stmt->execute();
        // var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function findCategorie(int $categ_id)
	{
		$sql = Sql::query()
			->select('categorie.*')
			->from('categorie')
			->where('categ_id = :id')
			->get();
		$stmt = $this->db->prepare($sql);
		$stmt->execute(['id' => $categ_id]);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function addCategorie(array $categorie) : void
	{
        // var_dump($categorie['libelleCateg'].''.$categorie['descCateg']);
		$libelleCateg = $categorie['libelleCateg'];
        $descCateg = $categorie['descCateg'];
        
		$sql = Sql::query()
			->insertInto('categorie(libelleCateg,descCateg)')
			->values('(:libelleCateg,:descCateg)')
            ->get();
        // var_dump($sql);

        $data = compact('libelleCateg','descCateg');
        // var_dump($data);

        $stmt = $this->db->prepare($sql);
        $this->bind($stmt,$data);
        $stmt->execute();
		Site::redirect( '/categorie');
	}

	public function editCategorie(array $categorie) : void
	{
        $categ_id = $categorie['categ_id'];
        // var_dump($categ_id);
        $libelleCateg = $categorie['libelleCateg'];
        $descCateg = $categorie['descCateg'];

		$sql = Sql::query()
			->update('categorie')
			->set('libelleCateg = :libelleCateg, descCateg = :descCateg')
			->where('categ_id = :categ_id')
			->get();

        $data = compact('categ_id','libelleCateg','descCateg');

		$stmt = $this->db->prepare($sql);
		$this->bind($stmt, $data);
		$stmt->execute();
		Site::redirect('/categorie');
	}

	public function deleteCategorie(int $categ_id) : void
	{
        // var_dump($categ_id);
		$sql = Sql::query()
			->delete()
			->from('categorie')
			->where('categ_id = :id')
			->get();

		$stmt = $this->db->prepare($sql);
		$stmt->execute(['id' => $categ_id]);
		Site::redirect('/categorie');
	}
}
