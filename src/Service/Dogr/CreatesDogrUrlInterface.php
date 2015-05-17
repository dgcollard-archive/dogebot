<?php

namespace Dgcollard\Dogebot\Service\Dogr;

interface CreatesDogrUrlInterface {

	/**
	 * Create a dogr.io URL from an array of strings
	 *
	 * @throws DogrServiceException
	 * @param strings $strings Many strings to appear on your doge image
	 */
	public function createDogrUrl(array $strings);
}
