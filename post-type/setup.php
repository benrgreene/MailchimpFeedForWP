<?php

add_action('init', function () {
	register_post_type('news-campaigns',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('Campaigns'),
				'singular_name' => __('Campaign')
			),
			'public' => true,
			'has_archive' => false,
			'show_in_rest' => true,
			'menu_icon' => 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBmaWxsPSJ3aGl0ZSI+PHBhdGggZD0iTTk2IDk2YzAtMzUuMyAyOC43LTY0IDY0LTY0bDI4OCAwYzM1LjMgMCA2NCAyOC43IDY0IDY0bDAgMzIwYzAgMzUuMy0yOC43IDY0LTY0IDY0TDgwIDQ4MGMtNDQuMiAwLTgwLTM1LjgtODAtODBMMCAxMjhjMC0xNy43IDE0LjMtMzIgMzItMzJzMzIgMTQuMyAzMiAzMmwwIDI3MmMwIDguOCA3LjIgMTYgMTYgMTZzMTYtNy4yIDE2LTE2TDk2IDk2em02NCAyNGwwIDgwYzAgMTMuMyAxMC43IDI0IDI0IDI0bDExMiAwYzEzLjMgMCAyNC0xMC43IDI0LTI0bDAtODBjMC0xMy4zLTEwLjctMjQtMjQtMjRMMTg0IDk2Yy0xMy4zIDAtMjQgMTAuNy0yNCAyNHptMjA4LThjMCA4LjggNy4yIDE2IDE2IDE2bDQ4IDBjOC44IDAgMTYtNy4yIDE2LTE2cy03LjItMTYtMTYtMTZsLTQ4IDBjLTguOCAwLTE2IDcuMi0xNiAxNnptMCA5NmMwIDguOCA3LjIgMTYgMTYgMTZsNDggMGM4LjggMCAxNi03LjIgMTYtMTZzLTcuMi0xNi0xNi0xNmwtNDggMGMtOC44IDAtMTYgNy4yLTE2IDE2ek0xNjAgMzA0YzAgOC44IDcuMiAxNiAxNiAxNmwyNTYgMGM4LjggMCAxNi03LjIgMTYtMTZzLTcuMi0xNi0xNi0xNmwtMjU2IDBjLTguOCAwLTE2IDcuMi0xNiAxNnptMCA5NmMwIDguOCA3LjIgMTYgMTYgMTZsMjU2IDBjOC44IDAgMTYtNy4yIDE2LTE2cy03LjItMTYtMTYtMTZsLTI1NiAwYy04LjggMC0xNiA3LjItMTYgMTZ6Ii8+PC9zdmc+',
			'supports' => ['title', 'editor', 'custom-fields', 'thumbnail', 'excerpt'],
			'auth_callback' => function() {
				return current_user_can('edit_posts');
			}
		)
	);
});
