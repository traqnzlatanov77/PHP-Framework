<h1>Books</h1>

<div>
	<table class="table table-striped table-hover">
		<tr>
			<td>Book title</td>
		</tr>
		<?php foreach($this->books as $book) : ?>
			<tr>
				<td><?= $book['title'] ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>

<!-- <ul>
		<?php foreach($this->books as $book) : ?>
			<li>
				<?= $book['title'] ?>
			</li>
		<?php endforeach; ?>
	</ul> -->