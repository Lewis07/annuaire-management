<section>
	<h1 class="card-title">Enregistrement d'un catégorie</h1>
	<form action="" method="POST" enctype="multipart/form-data">
		<div>
			<label>Libelle</label>
			<input type="text" name="libelleCateg" class="form-control">
		</div>
		<div>
			<label>Description</label>
			<textarea name="descCateg" class="form-control"></textarea>
		</div>
		<div class="mt-2">
			<button type="submit" name="categorie_submit" class="btn btn-primary">Enregistrer</button>
			<a href="/categorie" class="btn btn-warning">Retourner</a>
		</div>
	</form>
</section>