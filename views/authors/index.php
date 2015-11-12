<h1><?=	htmlspecialchars($this->title)?></h1>

<table class="table table-striped table-hover">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Action</th>
	</tr>
	<?php foreach ($this->authors as $author) : ?>
		<tr>
			<td><?= htmlspecialchars($author['id'])?></td>
			<td><?= htmlspecialchars($author['name'])?></td>
			<td><a class="btn btn-danger btn-xs" href="/authors/delete/<?=$author['id']?>">Delete</a></td>
		</tr>
	<?php endforeach ?>
</table>

<a class="btn btn-warning" href="/authors/create">Create Author</a>