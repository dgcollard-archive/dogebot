<?php

namespace Dgcollard\Dogebot\Service\Slack;

class IncomingWebhookMessage implements \JsonSerializable
{
	private $channel;
	private $iconEmoji;
	private $iconUrl;
	private $text;
	private $username;
	private $attachments = array();

	public function jsonSerialize()
	{
		return [
			"channel" => $this->channel,
			"icon_emoji" => $this->iconEmoji,
			"icon_url" => $this->iconUrl,
			"text" => $this->text,
			"username" => $this->username,
			"attachments" => $this->attachments
		];
	}

	public function withChannel($channel)
	{
		$new = clone $this;
		$new->channel = $channel;

		return $new;
	}

	public function getChannel()
	{
		return $this->channel;
	}

	public function withIconEmoji($iconEmoji)
	{
		$new = clone $this;
		$new->iconEmoji = $iconEmoji;

		return $new;
	}

	public function getIconEmoji()
	{
		return $this->iconEmoji;
	}

	public function withIconUrl($iconUrl)
	{
		$new = clone $this;
		$new->iconUrl = $iconUrl;

		return $new;
	}

	public function getIconUrl()
	{
		return $this->iconUrl;
	}

	public function withText($text)
	{
		$new = clone $this;
		$new->text = $text;

		return $new;
	}

	public function getText()
	{
		return $this->text;
	}

	public function withUsername($username)
	{
		$new = clone $this;
		$new->username = $username;

		return $new;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function withAttachments(array $attachments)
	{
		$new = clone $this;
		$new->attachments = $attachments;

		return $new;
	}

	public function getAttachments()
	{
		return $this->attachments;
	}
}
