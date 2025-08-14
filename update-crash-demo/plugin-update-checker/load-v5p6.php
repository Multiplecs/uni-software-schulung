<?php

namespace YahnisElsts\PluginUpdateChecker\v5p6;

use checker\Puc\v5\PucFactory as MajorFactory;
use checker\Puc\v5p6\PucFactory as MinorFactory;
use plugin

require __DIR__ . '/Puc/v5p6/Autoloader.php';
new Autoloader();

require __DIR__ . '/Puc/v5p6/PucFactory.php';
require __DIR__ . '/Puc/v5/PucFactory.php';

//Register classes defined in this version with the factory.
foreach (
	array(
		'Plugin\\UpdateChecker' => checker\Puc\v5p6\Plugin\UpdateChecker::class,
		'Theme\\UpdateChecker'  => checker\Puc\v5p6\Theme\UpdateChecker::class,

		'Vcs\\PluginUpdateChecker' => checker\Puc\v5p6\Vcs\PluginUpdateChecker::class,
		'Vcs\\ThemeUpdateChecker'  => checker\Puc\v5p6\Vcs\ThemeUpdateChecker::class,

		'GitHubApi'    => checker\Puc\v5p6\Vcs\GitHubApi::class,
		'BitBucketApi' => checker\Puc\v5p6\Vcs\BitBucketApi::class,
		'GitLabApi'    => checker\Puc\v5p6\Vcs\GitLabApi::class,
	)
	as $pucGeneralClass => $pucVersionedClass
) {
	MajorFactory::addVersion($pucGeneralClass, $pucVersionedClass, '5.6');
	//Also add it to the minor-version factory in case the major-version factory
	//was already defined by another, older version of the update checker.
	MinorFactory::addVersion($pucGeneralClass, $pucVersionedClass, '5.6');
}

