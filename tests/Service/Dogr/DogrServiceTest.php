<?php

/**
 * Dgcollard\Dogebot
 *
 * @author David Collard <dgcollard@gmail.com>
 */

namespace Dgcollard\Dogebot\Tests\Service\Dogr;

use Dgcollard\Dogebot\Service\Dogr\DogrService;
use Dgcollard\Dogebot\Service\Dogr\DogrServiceException;

/**
 * Tests for DogrService
 */
class DogrServiceTest extends \PHPUnit_Framework_TestCase
{
	protected $dogr;

	/**
	 * {@inheritdoc}
	 */
	protected function setUp()
	{
		$this->dogr = new DogrService;
	}

	/**
	 * Should create a url from the passed strings
	 */
	public function testCreateUrl()
	{
		$strings = [
			"wow so unit test",
			"such red green refactor",
			"many assertion",
		];

		$url = $this->dogr->createDogrUrl($strings);

		$this->assertSame($url, 'http://dogr.io/wowsounittest/suchredgreenrefactor/manyassertion.png');
	}

	/**
	 * Should create a url from a single string
	 */
	public function testCreateUrlOneString()
	{
		$strings = ["much lonely"];
		$url = $this->dogr->createDogrUrl($strings);

		$this->assertSame($url, 'http://dogr.io/muchlonely.png');
	}

	/**
	 * Should convert uppercase input strings to lower case
	 */
	public function testCreateUrlConvertsToLowerCase()
	{
		$strings = ["WOW"];
		$url = $this->dogr->createDogrUrl($strings);

		$this->assertSame($url, "http://dogr.io/wow.png");
	}

	/**
	 * Should create a url, removing all non-letter characters from the url
	 */
	public function testCreateUrlRemovesSpecialCharacters()
	{
		$strings = ["abc123!#1 äëïöü"];
		$url = $this->dogr->createDogrUrl($strings);

		$this->assertSame($url, 'http://dogr.io/abc.png');
	}

	/**
	 * Should throw a DogrServiceException when no string is given
	 *
	 * @expectedException Dgcollard\Dogebot\Service\Dogr\DogrServiceException
	 */
	public function testCreateUrlThrowsWhenNoStringsGiven()
	{
		$strings = [];
		$this->dogr->createDogrUrl($strings);
	}

	/**
	 * Should throw a DogrServiceException when only an empty string is given
	 *
	 * @expectedException Dgcollard\Dogebot\Service\Dogr\DogrServiceException
	 */
	public function testCreateUrlThrowsWhenEmptyStringGiven()
	{
		$strings = [""];
		$this->dogr->createDogrUrl($strings);
	}

	/**
	 * Should throw a DogrServiceException when no string contains an A-Z letter
	 *
	 * @expectedException Dgcollard\Dogebot\Service\Dogr\DogrServiceException
	 */
	public function testCreateUrlThrowsWhenOnlySpecialCharacters()
	{
		$strings = ["!!!!"];
		$this->dogr->createDogrUrl($strings);
	}
}
