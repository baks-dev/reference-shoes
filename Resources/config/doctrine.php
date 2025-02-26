<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use BaksDev\Reference\Shoes\Type\SizeShoes;
use BaksDev\Reference\Shoes\Type\SizeShoesType;
use Symfony\Config\DoctrineConfig;

return static function(DoctrineConfig $doctrine) {
    $doctrine->dbal()->type(SizeShoes::TYPE)->class(SizeShoesType::class);
};
