<h1>Welcome to Traqn Zlatanov Forum!</h1>
<?php if(!$this->isLoggedIn) : ?> 
	<div id="log-reg-container">
		<a class="btn btn-success btn-lg" id="login-btn" href="/account/login">Login</a>	
		<a class="btn btn-primary btn-lg" id="register-btn" href="/account/register">Register</a>	
	</div>
<?php endif; ?>

<div id="books">
	
</div>

<button class="btn btn-info btn-lg" id="show-books">Show books</button>

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



