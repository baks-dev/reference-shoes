<?php
/*
 *  Copyright 2022.  Baks.dev <admin@baks.dev>
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *   limitations under the License.
 *
 */

declare(strict_types=1);

namespace BaksDev\Reference\Shoes\Twig;

use BaksDev\Reference\Shoes\Type\SizeShoes;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class SizeShoesExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction(SizeShoes::TYPE, [$this, 'call'], ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction(SizeShoes::TYPE.'_render', [$this, 'render'], ['needs_environment' => true, 'is_safe' => ['html']]),
        ];
    }

    public function call(Environment $twig, string $value): string
    {
        try
        {
            return $twig->render('@Template/reference-shoes/content.html.twig', ['value' => $value]);
        }
        catch(LoaderError $loaderError)
        {
            return $twig->render('@reference-shoes/content.html.twig', ['value' => $value]);
        }
    }


    public function render(Environment $twig, string $value): string
    {
        try
        {
            return $twig->render('@Template/reference-shoes/template.html.twig', ['value' => $value]);
        }
        catch(LoaderError $loaderError)
        {
            return $twig->render('@reference-shoes/template.html.twig', ['value' => $value]);
        }
    }
}
