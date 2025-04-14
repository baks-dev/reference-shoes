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

declare(strict_types=1);

namespace BaksDev\Reference\Shoes\Type;

use BaksDev\Reference\Shoes\Type\Sizes\SizeShoesInterface;

/** Размер обуви  */
final class SizeShoes
{
    public const string TYPE = 'size_shoes_type';

    private ?SizeShoesInterface $size = null;

    public function __construct(self|string|SizeShoesInterface $size)
    {
        if(is_string($size) && class_exists($size))
        {
            $instance = new $size();

            if($instance instanceof SizeShoesInterface)
            {
                $this->size = $instance;
                return;
            }
        }

        if($size instanceof SizeShoesInterface)
        {
            $this->size = $size;
        }

        if($size instanceof $this)
        {
            $this->size = $size->getSize();
        }

        if(is_string($size))
        {
            /** @var SizeShoesInterface $class */
            foreach(self::getDeclaredSizes() as $class)
            {
                if($class::equals($size))
                {
                    $this->size = new $class();
                    break;
                }
            }
        }
    }


    public function __toString(): string
    {
        return $this->size ? $this->size->getvalue() : '';
    }


    /** Возвращает значение ColorsInterface */
    public function getSize(): SizeShoesInterface
    {
        return $this->size;
    }


    /** Возвращает значение ColorsInterface */
    public function getSizeValue(): string
    {
        return $this->size?->getValue() ?: '';
    }


    public static function cases(): array
    {
        $case = [];

        foreach(self::getDeclaredSizes() as $key => $size)
        {
            /** @var SizeShoesInterface $size */
            $sizes = new $size();
            $case[$sizes::priority().$key] = new self($sizes);
        }

        ksort($case);

        return $case;
    }


    public static function getDeclaredSizes(): array
    {
        return array_filter(
            get_declared_classes(),
            static function($className) {
                return in_array(SizeShoesInterface::class, class_implements($className), true);
            },
        );
    }











    //	private SizeShoesEnum $type;
    //
    //
    //	public function __construct(string|SizeShoesEnum $type)
    //	{
    //
    //		if($type instanceof SizeShoesEnum)
    //		{
    //			$this->type = $type;
    //		}
    //		else
    //		{
    //			$this->type = SizeShoesEnum::from($type);
    //		}
    //	}
    //
    //
    //	public function __toString(): string
    //	{
    //		return $this->type->value;
    //	}
    //
    //
    //	/**
    //	 * @return SizeShoesEnum
    //	 */
    //	public function getSizeShoesEnum() : SizeShoesEnum
    //	{
    //		return $this->type;
    //	}
    //
    //
    //	public function getSizeShoesEnumValue(): string
    //	{
    //		return $this->type->value;
    //	}
    //
    //	public function getSizeShoesEnumName(): string
    //	{
    //		return $this->type->name;
    //	}
    //
    //
    //	public static function cases() : array
    //	{
    //		$case = null;
    //
    //		foreach(SizeShoesEnum::cases() as $local)
    //		{
    //			$case[] = new self($local);
    //		}
    //
    //		return $case;
    //
    //	}

}
