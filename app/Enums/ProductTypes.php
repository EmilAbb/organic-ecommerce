<?php

namespace App\Enums;

enum ProductTypes : int
{
    case Featured_Product = 0;
    case Latest_Products = 1;
    case Top_Rated_Products = 2;
    case Review_Products = 3;

    public static function toArray(): array
    {
         return array_column(array_values(self::cases()),'value');
    }
}
