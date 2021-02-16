<?php

class AnnuaireModel extends Model
{
	public function findAllAnnuaires() : array
	{
		$sql = Sql::query()
			->select('annuaire.*')
			->from('annuaire')
			->get();

		$stmt = $this->db->prepare($sql);
        $stmt->execute();
        // var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function findAnnuaire(int $annuaire_id)
	{
		$sql = Sql::query()
			->select('annuaire.*')
			->from('annuaire')
			->where('annuaire_id = :id')
			->get();
		$stmt = $this->db->prepare($sql);
		$stmt->execute(['id' => $annuaire_id]);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function addAnnuaire(array $annuaire) : void
	{
        // var_dump($annuaire['libelle_annuaire'].''.$annuaire['description_annuaire']);
		$libelle_annuaire = $annuaire['libelle_annuaire'];
        $description_annuaire = $annuaire['description_annuaire'];
        $categ_id = $annuaire['categ_id'];

        File::validate($annuaire['fiche_annuaire'], array( 'image/jpg', 'image/jpeg', 'image/png', 'image/gif','application/pdf'), 5000000);
        $fiche_annuaire = File::upload($annuaire['fiche_annuaire']);

		$sql = Sql::query()
			->insertInto('annuaire(libelle_annuaire,description_annuaire,categ_id,fiche_annuaire)')
			->values('(:libelle_annuaire,:description_annuaire,:categ_id,:fiche_annuaire)')
            ->get();
        // var_dump($sql);

        $data = compact('libelle_annuaire','description_annuaire','categ_id','fiche_annuaire');
        // var_dump($data);

        $stmt = $this->db->prepare($sql);
        $this->bind($stmt,$data);
        $stmt->execute();
		Site::redirect('/annuaire');
	}

	public function editAnnuaire(array $annuaire) : void
	{
        $annuaire_id = $annuaire['annuaire_id'];
        // var_dump($annuaire_id);
        $libelle_annuaire = $annuaire['libelle_annuaire'];
        $description_annuaire = $annuaire['description_annuaire'];
        $categ_id = $annuaire['categ_id'];

        $current_file = $this->findAnnuaire($annuaire_id);
        // var_dump($current_file);

		$sql = Sql::query()
			->update('annuaire')
			->set('libelle_annuaire = :libelle_annuaire, description_annuaire = :description_annuaire,categ_id=:categ_id')
			->where('annuaire_id = :annuaire_id')
			->get();

        $data = compact('annuaire_id','libelle_annuaire','description_annuaire','categ_id');
        // var_dump($data);

		$stmt = $this->db->prepare($sql);
		$this->bind($stmt, $data);
		$stmt->execute();
		Site::redirect('/annuaire');
	}

	public function deleteAnnuaire(int $annuaire_id) : void
	{
        // var_dump($annuaire_id);
		$sql = Sql::query()
			->delete()
			->from('annuaire')
			->where('annuaire_id = :id')
			->get();

		$stmt = $this->db->prepare($sql);
		$stmt->execute(['id' => $annuaire_id]);
		Site::redirect('/annuaire');
	}
}
