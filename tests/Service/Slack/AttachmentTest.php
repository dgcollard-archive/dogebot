<?php

namespace Dgcollard\Dogebot\Tests\Service\Slack;

use Dgcollard\Dogebot\Service\Slack\Attachment;

/**
 * Tests for Attachment class
 *
 */
class AttachmentTest extends \PHPUnit_Framework_TestCase
{
	private $attachment;

	public function setUp()
	{
		$this->attachment = new Attachment;
	}

	public function testWithFallbackReturnsCloneWithChanges()
	{
		$attachment = $this->attachment->withFallback("Required plain-text summary of the attachment.");

		$this->assertNotSame($attachment, $this->attachment);
		$this->assertSame("Required plain-text summary of the attachment.", $attachment->getFallback());
	}

	public function testWithColorReturnsCloneWithChanges()
	{
		$attachment = $this->attachment->withColor("#36a64f");

		$this->assertNotSame($attachment, $this->attachment);
		$this->assertSame("#36a64f", $attachment->getColor());
	}

	public function testWithPretextReturnsCloneWithChanges()
	{
		$attachment = $this->attachment->withPretext("Optional text that appears above the attachment block");

		$this->assertNotSame($attachment, $this->attachment);
		$this->assertSame("Optional text that appears above the attachment block", $attachment->getPretext());
	}

	public function testWithAuthorNameReturnsCloneWithChanges()
	{
		$attachment = $this->attachment->withAuthorName("Bobby Tables");

		$this->assertNotSame($attachment, $this->attachment);
		$this->assertSame("Bobby Tables", $attachment->getAuthorName());
	}

	public function testWithAuthorLink()
	{
		$attachment = $this->attachment->withAuthorLink("http://flickr.com/bobby/");

		$this->assertNotSame($attachment, $this->attachment);
		$this->assertSame("http://flickr.com/bobby/", $attachment->getAuthorLink());
	}

	public function testWithAuthorIconReturnsCloneWithChanges()
	{
		$attachment = $this->attachment->withAuthorIcon("http://flickr.com/icons/bobby.jpg");

		$this->assertNotSame($attachment, $this->attachment);
		$this->assertSame("http://flickr.com/icons/bobby.jpg", $attachment->getAuthorIcon());
	}

	public function testWithTextReturnsCloneWithChanges()
	{
		$attachment = $this->attachment->withText("Optional text that appears within the attachment");

		$this->assertNotSame($attachment, $this->attachment);
		$this->assertSame("Optional text that appears within the attachment", $attachment->getText());
	}

	public function testWithTitleReturnsCloneWithChanges()
	{
		$attachment = $this->attachment->withTitle("Slack API Documentation");

		$this->assertNotSame($attachment, $this->attachment);
		$this->assertSame("Slack API Documentation", $attachment->getTitle());
	}

	public function testWithTitleLinkReturnsCloneWithChanges()
	{
		$attachment = $this->attachment->withTitleLink("https://api.slack.com/");

		$this->assertNotSame($attachment, $this->attachment);
		$this->assertSame("https://api.slack.com/", $attachment->getTitleLink());
	}

	public function testWithFieldsReturnsCloneWithChanges()
	{
		$fields = ["title" => "Priority", "value" => "High", "short" => false];

		$attachment = $this->attachment->withFields($fields);

		$this->assertNotSame($attachment, $this->attachment);
		$this->assertSame($fields, $attachment->getFields());
	}

	public function testWithImageUrlReturnsCloneWithChanges()
	{
		$attachment = $this->attachment->withImageUrl("http://my-website.com/path/to/image.jpg");

		$this->assertNotSame($attachment, $this->attachment);
		$this->assertSame("http://my-website.com/path/to/image.jpg", $attachment->getImageUrl());
	}
}
