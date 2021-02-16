<section>
	<h1>Catégorie</h1>
	<a href="/categorie/create" class="btn btn-primary mb-3">Nouveau catégorie</a>
	<?php if (!empty($categories)) : ?>
		<table class="table">
			<thead class="bg-info text-white">
				<tr>
					<th>Libellé</th>
					<th>Description</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($categories as $categorie) : ?>
					<tr>
						<td>
							<?= $categorie['libelleCateg']; ?>
						</td>
						<td>
							<?= $categorie['descCateg']; ?>
						</td>
						<td>
							<a href="/categorie/edit/<?= $categorie['categ_id']; ?>" class="btn btn-success">Editer</a>
							<a href="/categorie/delete/<?= $categorie['categ_id']; ?>" class="btn btn-danger">Supprimer</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php else : ?>
		<div>Aucun catégorie</div>
	<?php endif; ?>
</section>