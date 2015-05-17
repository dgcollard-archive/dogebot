<?php

namespace Dgcollard\Dogebot\Service\Slack;

use GuzzleHttp\ClientInterface;

class IncomingWebhookService
{
	/** @var ClientInterface */
	private $client;

	/** @var string */
	private $url;

	/**
	 * @param ClientInterface $client
	 * @param string $url
	 */
	public function __construct(ClientInterface $client, $url)
	{
		$this->client = $client;
		$this->url = $url;
	}

	/**
	 * 
	 */
	public function send(IncomingWebhookMessage $message)
	{
		$this->client->post($this->url, [
			'json' => $message,
		]);
	}
}
