<?php

namespace Dgcollard\Dogebot\Tests\Service\Slack;

use Dgcollard\Dogebot\Service\Slack\Attachment;
use Dgcollard\Dogebot\Service\Slack\IncomingWebhookMessage;
use Dgcollard\Dogebot\Service\Slack\IncomingWebhookService;
use GuzzleHttp\Client;

class IncomingWebhookServiceTest extends \PHPUnit_Framework_TestCase
{
	private $attachment;
	private $message;

	public function setUp()
	{
		$this->attachment = new Attachment;
		$this->attachment = $this->attachment->withFallback("Required plain-text summary of the attachment.")
			->withColor("#36a64f")
			->withPretext("Optional text that appears above the attachment block")
			->withAuthorName("Bobby Tables")
			->withAuthorLink("http://flickr.com/bobby/")
			->withAuthorIcon("http://flickr.com/icons/bobby.jpg")
			->withTitle("Slack API Documentation")
			->withTitleLink("https://api.slack.com/")
			->withText("Optional text that appears within the attachment")
			->withFields(["title" => "Priority", "value" => "High", "short" => false])
			->withImageUrl("http://dogr.io/wow/such/slack.png");

		$this->message = new IncomingWebhookMessage;
		$this->message = $this->message->withChannel("#general")
			->withIconEmoji(":ghost:")
			->withIconUrl("http://flickr.com/icons/bobby.jpg")
			->withText("wow such dogebot")
			->withUsername("botty")
			->withAttachments([$this->attachment]);
	}

	/**
	 * Should post to the Incoming Webhook url, with a parameter called 'payload' which contains the 
	 * JSON string
	 */
	public function testSendsMessage()
	{
		$messageJson = json_encode($this->message);

		$client = $this->getMockBuilder(Client::class)
			->setMethods(['post'])
			->getMock();

		$client->expects($this->once())
			->method('post')
			->with(
				$this->equalTo('https://hooks.slack.com/services/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'),
				$this->callback(function ($subject) use ($messageJson) {
					return json_encode($subject['json']) === $messageJson;
				}));

		$service = new IncomingWebhookService($client, 'https://hooks.slack.com/services/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');
		$service->send($this->message);
	}
}