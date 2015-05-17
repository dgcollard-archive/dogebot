<?php

namespace Dgcollard\Dogebot\Service\Slack;

class Attachment implements \JsonSerializable
{
	private $color;
	private $fallback;
	private $pretext;
	private $authorName;
	private $authorLink;
	private $authorIcon;
	private $text;
	private $title;
	private $titleLink;
	private $fields = array();
	private $imageUrl;

	public function jsonSerialize()
	{
		return [
			'color' => $this->color,
			'fallback' => $this->fallback,
			'pretext' => $this->pretext,
			'author_name' => $this->authorName,
			'author_link' => $this->authorLink,
			'author_icon' => $this->authorIcon,
			'title' => $this->title,
			'title_link' => $this->titleLink,
			'fields' => $this->fields,
			'image_url' => $this->imageUrl,
		];
	}

	/**
	 * @param string $text
	 * @return Attachment
	 */
	public function withText($text)
	{
		$new = clone $this;
		$new->text = $text;

		return $new;
	}

	/**
	 * @return string
	 */
	public function getText()
	{
		return $this->text;
	}

	/**
	 * @param string $title
	 * @return Attachment
	 */
	public function withTitle($title)
	{
		$new = clone $this;
		$new->title = $title;

		return $new;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param string $titleLink
	 * @return Attachment
	 */
	public function withTitleLink($titleLink)
	{
		$new = clone $this;
		$new->titleLink = $titleLink;

		return $new;
	}

	/**
	 * @return string
	 */
	public function getTitleLink()
	{
		return $this->titleLink;
	}

	/**
	 * @param string $fallback
	 * @return Attachment
	 */
	public function withFallback($fallback)
	{
		$new = clone $this;
		$new->fallback = $fallback;

		return $new;
	}

	/**
	 * @return string
	 */
	public function getFallback()
	{
		return $this->fallback;
	}

	/**
	 * @param string $color
	 * @return Attachment
	 */
	public function withColor($color)
	{
		$new = clone $this;
		$new->color = $color;

		return $new;
	}

	/**
	 * @return string
	 */
	public function getColor()
	{
		return $this->color;
	}

	/**
	 * @param string $pretext
	 * @return Attachment
	 */
	public function withPretext($pretext)
	{
		$new = clone $this;
		$new->pretext = $pretext;

		return $new;
	}

	/**
	 * @return string
	 */
	public function getPretext()
	{
		return $this->pretext;
	}

	/**
	 * @param string $authorName
	 * @return Attachment
	 */
	public function withAuthorName($authorName)
	{
		$new = clone $this;
		$new->authorName = $authorName;

		return $new;
	}

	/**
	 * @return string
	 */
	public function getAuthorName()
	{
		return $this->authorName;
	}

	/**
	 * @param string $authorLink
	 * @return Attachment
	 */
	public function withAuthorLink($authorLink)
	{
		$new = clone $this;
		$new->authorLink = $authorLink;

		return $new;
	}

	/**
	 * @return string
	 */
	public function getAuthorLink()
	{
		return $this->authorLink;
	}

	/**
	 * @param string $authorIcon
	 * @return Attachment
	 */
	public function withAuthorIcon($authorIcon)
	{
		$new = clone $this;
		$new->authorIcon = $authorIcon;

		return $new;
	}

	/**
	 * @return string
	 */
	public function getAuthorIcon()
	{
		return $this->authorIcon;
	}

	/**
	 * @param array $fields
	 * @return Attachment
	 */
	public function withFields(array $fields)
	{
		$new = clone $this;
		$new->fields = $fields;

		return $new;
	}

	/**
	 * @return array
	 */
	public function getFields()
	{
		return $this->fields;
	}

	/**
	 * @param string $imageUrl
	 * @return Attachment
	 */
	public function withImageUrl($imageUrl)
	{
		$new = clone $this;
		$new->imageUrl = $imageUrl;

		return $new;
	}

	/**
	 * @return string
	 */
	public function getImageUrl()
	{
		return $this->imageUrl;
	}
}