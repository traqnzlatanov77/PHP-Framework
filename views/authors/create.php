<h1>Create new author</h1>

<div class="col-kg-6">
	<div class="well bs-component">
	<fieldset>
		<legend>Create author</legend>
		<form class="form-horizontal" method="POST" action="/authors/create">
			<label for="author_name">Name: </label>
			<input type="text" name="author_name" id="author_name">
			<?php if($this->getValidationError('author_name'));?>
			<?php echo $this->getValidationError('author_name'); ?>
			<input class="btn btn-warning" type="submit" value="create">
		</form>		
	</fieldset>
	</div>
</div>

