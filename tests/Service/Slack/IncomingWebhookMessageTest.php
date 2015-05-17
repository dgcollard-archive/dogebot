<?php

namespace Dgcollard\Dogebot\Tests\Service\Slack;

use Dgcollard\Dogebot\Service\Slack\Attachment;
use Dgcollard\Dogebot\Service\Slack\IncomingWebhookMessage;

class IncomingWebhookMessageTest extends \PHPUnit_Framework_TestCase
{
	private $message;

	public function setUp()
	{
		$this->message = new IncomingWebhookMessage;
	}

	public function testWithChannelReturnsCloneWithChanges()
	{
		$message = $this->message->withChannel('#general');

		$this->assertNotSame($message, $this->message);
		$this->assertSame('#general', $message->getChannel());
	}

	public function testWithIconEmojiReturnsCloneWithChanges()
	{
		$message = $this->message->withIconEmoji(':ghost:');

		$this->assertNotSame($message, $this->message);
		$this->assertSame(':ghost:', $message->getIconEmoji());
	}

	public function testWithIconUrlReturnsCloneWithChanges()
	{
		$message = $this->message->withIconUrl('http://example.org/doge.png');

		$this->assertNotSame($message, $this->message);
		$this->assertSame('http://example.org/doge.png', $message->getIconUrl());
	}

	public function testWithTextReturnsCloneWithChanges()
	{
		$message = $this->message->withText('wow so message');

		$this->assertNotSame($message, $this->message);
		$this->assertSame('wow so message', $message->getText());
	}

	public function testWithUsernameReturnsCloneWithChanges()
	{
		$message = $this->message->withUsername('botty');

		$this->assertNotSame($message, $this->message);
		$this->assertSame('botty', $message->getUsername());
	}

	public function testWithAttachmentsReturnsCloneWithChanges()
	{
		$attachment = new Attachment;
		$attachment = $attachment->withTitle("wow");

		$message = $this->message->withAttachments([$attachment]);

		$this->assertNotSame($message, $this->message);
		$this->assertSame($attachment, $message->getAttachments()[0]);
	}
}
