<?php

require('core/init.php');

try {
	$topic = new Topic;
	$user  = new User;

	$template = new Template('templates/frontpage.php');
	$template->topics          = $topic->getAllTopics();
	$template->totalTopics     = $topic->getTotalTopics();
	$template->totalCategories = $topic->getTotalCategories();
	$template->totalUsers      = $user->getTotalUsers();
	echo $template;
} catch (Throwable $e) {
	error_log('[forum] frontpage failed: ' . $e->getMessage());
	http_response_code(503);
	echo '<!doctype html><meta charset="utf-8"><title>Forum unavailable</title>'
		. '<style>body{font-family:system-ui;margin:4rem auto;max-width:40rem;padding:0 1rem}</style>'
		. '<h1>Forum is temporarily unavailable</h1>'
		. '<p>The database is unreachable right now. Try again later.</p>';
}
