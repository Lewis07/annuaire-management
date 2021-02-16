<section>
	<h1>Annuaire</h1>
	<a href="/annuaire/create" class="btn btn-primary mb-3">Nouveau annuaire</a>
	<?php if (!empty($annuaires)) : ?>
		<table class="table">
			<thead class="bg-info text-white">
				<tr>
					<th>Libellé</th>
					<th>Description</th>
					<th>Catégorie</th>
					<th>Fiche</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($annuaires as $annuaire) : ?>
					<tr>
						<td>
							<?= $annuaire['libelle_annuaire']; ?>
						</td>
						<td>
							<?= $annuaire['description_annuaire']; ?>
						</td>
						<td>
							<?= $annuaire['categ_id']; ?>
						</td>
						<td>
							<?php if($annuaire['fiche_annuaire'] != ""): ?>
								<a href="<?= $annuaire['fiche_annuaire']; ?>">Fichier</a>
							<?php else: ?>
								
							<?php endif; ?>
						</td>
						<?php $id = $annuaire['annuaire_id']; ?>
						<td>
							<a href="/annuaire/edit/<?= $id;?>" class="btn btn-success">Editer</a>
							<a href="/annuaire/delete/<?= $id; ?>" class="btn btn-danger">Supprimer</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php else : ?>
		<div>Aucun annuaire</div>
	<?php endif; ?>
</section>