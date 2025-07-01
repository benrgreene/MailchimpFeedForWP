<?php
	$classes = array_key_exists('className', $attributes) ? $attributes['className'] : '';
	$posts = get_posts(array(
		'post_type' => 'news-campaigns',
		'numberposts' => -1
	));
	$years = array();
	foreach ($posts as $post) {
		$year = explode('-', $post->post_date)[0];
		if (!in_array($year, $years)) {
			$years[] = $year;
		}
	}
?>

<div class="<?= $classes ?>">
	<div class="input-wrapper input-wrapper__horizontal">
		<label for="campaign-select">View Newsletters For Year:</label>
		<select id="campaign-select">
			<?php foreach($years as $year) { ?>
				<option value="<?= $year ?>"><?= $year ?></option>
			<?php } ?>
		</select>
	</div>
	<div aria-live="polite">
		<h2><span id="newsletter-year-title"><?= $years[0] ?></span> Newsletters</h2>
		<ul>
			<?php foreach ($posts as $post) { ?>
				<?php $post_year = explode('-', $post->post_date)[0]; ?>
				<li data-year="<?= $post_year ?>" class="<?= $post_year == $years[0] ? '' : 'hidden' ?>">
					<a href="<?= get_post_meta($post->ID, 'link', true) ?>" target="_blank"><?= $post->post_title ?></a>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>

<script type="text/javascript">
	const campaignSelect = document.querySelector('#campaign-select');
	const campaigns = document.querySelectorAll('[data-year]');
	const campaignYear = document.querySelector('#newsletter-year-title');
	campaignSelect.addEventListener('change', () => {
		campaignYear.innerText = campaignSelect.value;
		campaigns.forEach((campaign) => {
			if (campaign.getAttribute('data-year') == campaignSelect.value) {
				campaign.classList.remove('hidden');
			} else {
				campaign.classList.add('hidden');
			}
		});
	});
</script>

