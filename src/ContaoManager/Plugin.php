<?php

namespace Schachbulle\ContaoSchiedsrichterBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Schachbulle\ContaoSchiedsrichterBundle\ContaoSchiedsrichterBundle;

class Plugin implements BundlePluginInterface
{
	/**
	 * {@inheritdoc}
	 */
	public function getBundles(ParserInterface $parser)
	{
		return [
			BundleConfig::create(ContaoSchiedsrichterBundle::class)
				->setLoadAfter([ContaoCoreBundle::class]),
		];
	}
}
