<?php

require __DIR__ . '/../vendor/autoload.php';

use Dgcollard\Dogebot\Service\Slack\Attachment;
use Dgcollard\Dogebot\Service\Slack\IncomingWebhookMessage;
use Dgcollard\Dogebot\Service\Dogr\DogrServiceProvider;
use Dgcollard\Dogebot\Service\Slack\IncomingWebhookServiceProvider;
use Silex\Application;
use Silex\Provider\MonologServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Application;

// Register application service providers.

$app->register(new DogrServiceProvider);

$app->register(new IncomingWebhookServiceProvider, [
	'slack.in.url' => getenv('DOGEBOT_SLACK_URL'),
]);

// Register third-party service providers.

$app->register(new MonologServiceProvider, [
	'monolog.logfile' => 'php://stderr',
]);

// Register application routes.

$app->post('/doge', function (Request $req) use ($app) {

	$text = $req->get('text');
	$strings = explode(',', $text);

	$attachment = new Attachment;
	$attachment = $attachment->withFallback($text)
		->withText($text)
		->withImageUrl($app['dogr']->createDogrUrl($strings));

	$message = new IncomingWebhookMessage;
	$message = $message->withChannel('#' . $req->get('channel_name'))
		->withAttachments([$attachment])
		->withUsername('dogebot')
		->withIconUrl('http://dogr.io/doge.png');

	$app['slack.in']->send($message);

	return new Response;
});

$app->error(function () {
	return new Response;
});

$app->run();
