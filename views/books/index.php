<h1>Books</h1>

<table class="table table-striped table-hover">
	<tr>
		<th>Id</th>
		<th>Title</th>
	</tr>
	<?php foreach ($this->books as $book): ?>
		<tr>
			<td><?php echo $book[0] ?></td>
			<td><?php echo $book[1]?></td>
		</tr>
	<?php endforeach; ?>
</table>

<?php if($this->page > 0) :  ?>
<a href="/books/index/<?php echo $this->page - 1 ?>/<?php echo $this->pageSize ?>">Previous</a>
<?php endif; ?>
<a href="/books/index/<?php echo $this->page + 1 ?>/<?php echo $this->pageSize ?>">Next</a>



