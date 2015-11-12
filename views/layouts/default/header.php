	<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/content/libs/bootstrap-3.3.5-dist/css/bootstrap-theme-cyborg.css">
		<link rel="stylesheet" type="text/css" href="/content/style.css">	

		<script type="text/javascript" src="/content/libs/jquery.js"></script>
		<script type="text/javascript" src="/content/libs/noty-2.3.7/js/noty/jquery.noty.js"></script>
		<script type="text/javascript" src="/content/libs/noty-2.3.7/js/noty/layouts/center.js"></script>
		<script type="text/javascript" src="/content/libs/noty-2.3.7/js/noty/themes/relax.js"></script>

		<title>
			<?php if (isset($this->title)) echo htmlspecialchars($this->title); ?>
		</title>
	</head>
	<body>
		<header>
			<ul class="nav navbar-nav">
				<li><a href="/"><img src="/content/images/site-logo.jpeg"></a></li>
				<li><a href="/">Home</a></li>
				<?php if ($this->isLoggedIn) : ?>
					<li><a href="/authors">Authors</a></li>
					<li><a href="/books">Books</a></li>
				<?php endif; ?>
			</ul>
			<?php if ($this->isLoggedIn) : ?>
				<div id="logged-in-info">
					<span id="user-info-name">Hello, <?php echo $_SESSION['username']; ?></span>
					<form action="/account/logout">
						<button class="btn btn-default btn-xs" type="submit">Logout</button>
					</form>
				</div>
			<?php endif; ?>
			<br/>
		</header>

		<?php include('messages.php'); ?>

		
		<script>
			// $.noty.defaults.killer = true;	

			// var n = noty({ 
			// 	text: 'My first notification using noty',
			// 	theme: 'relax',
			// 	layout: 'center',
			// 	closeWith: ['click', 'hover'],
			// 	type: 'alert'
			// });
		</script>
