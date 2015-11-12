<?php
if (isset($_SESSION['messages'])) {
	foreach ($_SESSION['messages'] as $msg) {
		?> 
		<script type="text/javascript">
		var myvar = "<?php echo $msg['text'] ?>";

		$.noty.defaults.killer = true;	

		var n = noty({ 
			text: myvar,
			theme: 'relax',
			layout: 'center',
			closeWith: ['click', 'hover'],
			type: 'alert'
		});
	</script> 
	<?php
	}
	unset($_SESSION['messages']); 
}