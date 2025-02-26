<?php
/*
 *  Copyright 2025.  Baks.dev <admin@baks.dev>
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

declare(strict_types=1);

namespace BaksDev\Reference\Shoes\Type\Sizes\Child;

use BaksDev\Reference\Clothing\Type\Sizes\Collection\SizeClothingInterface;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('baks.size.clothing')]
final class Size35 implements SizeClothingInterface
{
    /*
    
    
    35.5 	34.5 	23 	4 	3
    36 	35 	23.3 	4.5 	3.5
    36.5 	36 	23.5 	5 	4
    37 	36.5 	23.6 	5.5 	4.5
    37.5 	37.5 	24 	6 	5
    38 	38.5 	24.5 	6.5 	5.5
    39 	39 	25 	7 	6
    40 	40 	25.5 	7.5 	6.5
    40.5 	40.5 	26 	8 	7
    41 	41 	26.5 	8.5 	7.5
    42 	42 	27 	9 	8
    43 	42.5 	27.5 	9.5 	8.5
    43.5 	43 	28 	10 	9
    44 	44 	28.5 	10.5 	9.5
    45 	44.5 	29 	11 	10
    46 	45 	29.5 	11.5 	10.5
    46.5 	45.5 	30 	12 	11
    47 	46 	30.5 	12.5 	11.5
    47.5 	47 	31 	13 	12
    48 	48 	31.5 	13.5 	12.5
    48.5 	48.5 	32 	14 	13
    49 	49 	32.5 	14.5 	13.5
    50 	50 	33 	15 	14
    51 	51 	33.5 	15.5 	14.5
    52 	52 	34 	16 	15
    53 	53 	34.5 	16.5 	15.5
    53.5 	53.5 	35 	17 	16
    54 	54 	35.5 	17.5 	16.5
    55 	55 	36 	18 	17
    */

    public const string SIZE = '35';

    public const string EUR = '34';

    public const string CENTIMETER = '22.5';

    public const string USA = '3.5';

    public const string UK = '2.5';

    /**
     * Возвращает значение (value)
     */
    public function getValue(): string
    {
        return self::SIZE;
    }


    /**
     * Сортировка (чем меньше число - тем первым в итерации будет значение)
     */
    public static function priority(): int
    {
        return 35;
    }


    /**
     * Проверяет, относится ли строка цвета к данному объекту
     */
    public static function equals(string $size): bool
    {
        return mb_strtolower(self::SIZE) === mb_strtolower($size);
    }
}
