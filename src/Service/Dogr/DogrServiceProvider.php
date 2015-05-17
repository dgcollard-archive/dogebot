<?php

namespace Dgcollard\Dogebot\Service\Dogr;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class DogrServiceProvider implements ServiceProviderInterface
{
	public function register(Container $app)
	{
		$app['dogr'] = new DogrService;
	}
}
