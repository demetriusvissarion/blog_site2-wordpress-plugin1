<form id="demetrius1-auth-form" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
	<div class="auth-btn">
		<input class="wp-block-search__button wp-element-button" type="button" value="Login" id="demetrius1-show-auth-form">
	</div>
	<div id="demetrius1-auth-container" class="auth-container">
		<a id="demetrius1-auth-close" class="close" href="#">&times;</a>
		<h2>Site Login</h2>
		<label for="username">Username</label>
		<input id="username" type="text" name="username">
		<label for="password">Password</label>
		<input id="password" type="password" name="password">
		<input class="wp-block-button wp-element-button" type="submit" value="Login" name="submit">
		<p class="status"></p>

		<p class="actions">
			<a href="<?php echo wp_lostpassword_url(); ?>">Forgot Password?</a> - <a href="<?php echo wp_registration_url(); ?>">Register</a>
		</p>

		<?php wp_nonce_field('ajax-login-nonce', 'demetrius1_auth'); ?>
	</div>
</form>