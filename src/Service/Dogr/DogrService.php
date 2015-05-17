<?php

namespace Dgcollard\Dogebot\Service\Dogr;

/**
 * DogrService turns an array of strings into a URL for dogr.io
 * Doge-as-a-Service
 */
class DogrService implements CreatesDogrUrlInterface
{
	/**
	 * {@inheritdoc}
	 */
	public function createDogrUrl(array $strings)
	{
		$strings = $this->cleanStrings($strings);

		if (empty($strings)) {
			throw new InvalidArgumentException;
		}

		$path = $this->createUrlPath($strings);

		return "http://dogr.io/" . $path;
	}

	/**
	 * Sanitize the strings, removing all non A-Z characters from each string,
	 * then removing empty strings from the array
	 *
	 * @param array $strings
	 */
	private function cleanStrings(array $strings)
	{	
		// Convert each string to lower case
		$strings = array_map("strtolower", $strings);

		$cleanString = function ($string)
		{
			// Replaces any non a-z character with the empty string
			return preg_replace("/[^a-z]/", "", $string);
		};

		// Apply the $cleanString function to each $string
		$strings = array_map($cleanString, $strings);

		// Removes empty strings
		$strings = array_filter($strings);

		return $strings;
	}

	/**
	 * Create the URL path, joining the sanitized strings together and addig 
	 * a .png extension
	 *
	 * @param array $strings
	 */
	private function createUrlPath($strings)
	{
		return implode("/", $strings) . ".png";
	}
}
