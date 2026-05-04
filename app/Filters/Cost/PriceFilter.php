<?php

namespace App\Filters\Cost;

use EleFilter\Database\ModelFilter;

class PriceFilter extends ModelFilter
{
   protected string $column = "price";

   public function apply(mixed $param): void
   {
      if (is_null($param[0]) or is_null($param[1]))
         return;

      $this->between($param);
   }
}
