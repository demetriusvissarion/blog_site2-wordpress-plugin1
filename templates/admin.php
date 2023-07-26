<div class="wrap">
	<h1>Demetrius1 Plugin</h1>
	<?php settings_errors(); ?>

	<form method="post" action="options.php">
		<?php
		settings_fields('demetrius1_option_group');
		do_settings_sections('demetrius1_plugin');
		submit_button();
		?>
	</form>
</div>