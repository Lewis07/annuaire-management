<section>
	<h1>Editer un annuaire</h1>
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="annuaire_id" value="<?= $annuaire['annuaire_id']; ?>">
		<div>
			<label>Libelle</label>
			<input type="text" name="libelle_annuaire" value="<?= $annuaire['libelle_annuaire']; ?>" class="form-control">
		</div>
		<div>
			<label>Description</label>
			<textarea name="description_annuaire" class="form-control"><?= $annuaire['description_annuaire']; ?></textarea>
		</div>
		<div>
		  <label>Catégorie</label>
		  <select name="categ_id" class="form-control">
			<?php foreach ($categories as $categorie) : ?>
				<option value="<?php echo $categorie['categ_id']; ?>"><?php echo $categorie['libelleCateg']; ?></option>
			<?php endforeach; ?>
		  </select>
		</div>
		<br>
		<div>
			<input type="file" name="fiche_annuaire" id="fiche_annuaire" aria-describedby="fiche_annuaire" size="5000000" accept=".jpg, .jpeg, .png, .gif, .pdf">
			<label>Choisir un fichier</label>
		</div>
		<div class="mt-2">
			<button type="submit" name="annuaire_update" class="btn btn-success">Modifier</button>
			<a href="/annuaire" class="btn btn-warning">Retourner</a>
		</div>
	</form>
</section>