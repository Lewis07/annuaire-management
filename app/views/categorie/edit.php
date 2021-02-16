<section>
	<h1>Editer un catégorie</h1>
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="categ_id" value="<?= $categorie['categ_id']; ?>">
		<div>
			<label>Libelle</label>
			<input type="text" name="libelleCateg" value="<?= $categorie['libelleCateg']; ?>" class="form-control">
		</div>
		<div>
			<label>Description</label>
			<textarea name="descCateg" class="form-control"><?= $categorie['descCateg']; ?></textarea>
		</div>
		<div class="mt-2">
			<button type="submit" name="categorie_update" class="btn btn-success">Modifier</button>
			<a href="/categorie" class="btn btn-warning">Retourner</a>
		</div>
	</form>
</section>