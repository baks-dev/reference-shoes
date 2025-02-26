<?php
/*
 *  Copyright 2024.  Baks.dev <admin@baks.dev>
 *
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is furnished
 *  to do so, subject to the following conditions:
 *
 *  The above copyright notice and this permission notice shall be included in all
 *  copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NON INFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *  THE SOFTWARE.
 */

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use BaksDev\Reference\Shoes\BaksDevReferenceShoesBundle;
use BaksDev\Reference\Shoes\Choice\ReferenceChoiceSizeShoes;

return static function(ContainerConfigurator $configurator) {

    $services = $configurator->services()
        ->defaults()
        ->autowire(true)
        ->autoconfigure(true);


    $NAMESPACE = BaksDevReferenceShoesBundle::NAMESPACE;
    $PATH = BaksDevReferenceShoesBundle::PATH;

    $services->load($NAMESPACE, $PATH)
        ->exclude([
            $PATH.'{Entity,Resources,Type}',
            $PATH.'**'.DIRECTORY_SEPARATOR.'*Message.php',
            $PATH.'**'.DIRECTORY_SEPARATOR.'*DTO.php',
            $PATH.'**'.DIRECTORY_SEPARATOR.'*Test.php',
        ]);

    $services->load($NAMESPACE.'Form\\', $PATH.'Form');

    $services->load($NAMESPACE.'Listeners\\', $PATH.'Listeners');

    $services->load($NAMESPACE.'Twig\\', $PATH.'Twig');

    $services->load(
        $NAMESPACE.'Type\Sizes\\',
        $PATH.implode(DIRECTORY_SEPARATOR, ['Type', 'Sizes'])
    );

    $services->set(ReferenceChoiceSizeShoes::class)
        ->tag('baks.reference.choice')
        ->tag('baks.fields.choice');
};
