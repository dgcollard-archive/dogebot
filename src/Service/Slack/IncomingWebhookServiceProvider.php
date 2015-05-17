<?php

namespace Dgcollard\Dogebot\Service\Slack;

use GuzzleHttp\Client;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class IncomingWebhookServiceProvider implements ServiceProviderInterface
{
	/**
	 * {@inheritdoc}
	 */
	public function register(Container $app)
	{
		$client = new Client;

		$app['slack.in'] = function () use ($app) {
			return new IncomingWebhookService(new Client, $app['slack.in.url']);
		};
	}
}