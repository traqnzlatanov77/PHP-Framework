<h1>Books</h1>

<button class="btn btn-info btn-lg" id="show-books">Show books</button>
<div id="books">
	
</div>

<script>
	$("#show-books").on('click', function(ev) {
		$.ajax({
			url: '/books/showBooks',
			method: 'GET'
		}).success(function(data) {
			$('#books').html(data);
		})
	})
</script>

