<?php

require_once __DIR__ . '/vendor/autoload.php';

use Dgcollard\Dogebot\Service\Slack\Attachment;
use Dgcollard\Dogebot\Service\Slack\IncomingWebhookMessage;

$attachment = new Attachment;
$attachment = $attachment->withFallback("Required plain-text summary of the attachment.")
	->withColor("#36a64f")
	->withPretext("Optional text that appears above the attachment block")
	->withAuthorName("Bobby Tables")
	->withAuthorLink("http://flickr.com/bobby/")
	->withAuthorIcon("http://flickr.com/icons/bobby.jpg")
	->withTitle("Slack API Documentation")
	->withTitleLink("https://api.slack.com/")
	->withText("Optional text that appears within the attachment")
	->withFields(["title" => "Priority", "value" => "High", "short" => false])
	->withImageUrl("http://my-website.com/path/to/image.jpg");

$message = new IncomingWebhookMessage;
$message = $message->withChannel("#general")
	->withIconEmoji(":ghost:")
	->withIconUrl("http://flickr.com/icons/bobby.jpg")
	->withText("wow such dogebot")
	->withUsername("botty")
	->withAttachments([$attachment]);

$url = 'https://hooks.slack.com/services/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';
$slack = new IncomingWebhookService($client, $url);
$slack->send($message);

$json = json_encode($message);
echo $json;