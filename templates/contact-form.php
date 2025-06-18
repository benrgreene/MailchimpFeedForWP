<?php $classes = array_key_exists('className', $attributes) ? $attributes['className'] : ''; ?>

<div class="<?= $classes ?>">
	<form class="form" ajax-form action="<?= site_url() ?>/wp-json/mailchimp/contact-submit" method="POST">
		<div class="input-wrapper">
			<label for="email">
				Email *
			</label>
			<input name="email" id="email" type="email" required="required" />
		</div>

		<div class="input-wrapper">
			<label for="subject">
				Subject *
			</label>
			<input name="subject" id="subject" type="text" required="required" />
		</div>

		<div class="input-wrapper">
			<label for="message">
				Message *
			</label>
			<textarea name="message" id="message" required="required"></textarea>
		</div>

		<div class="check-wrapper">
			<input name="subscribe" id="subscribe" type="checkbox" />
			<label for="subscribe">
				Subscribe to our newsletter
			</label>
		</div>

		<input type="submit" value="Send Message" class="button" />
	</form>
</div>
