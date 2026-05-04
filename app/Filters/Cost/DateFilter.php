<?php

namespace App\Filters\Cost;

use EleFilter\Database\ModelFilter;

class DateFilter extends ModelFilter
{
   protected string $column = "spent_at";

   public function apply(mixed $param): void
   {
      if (is_null($param[0]) or is_null($param[1]))
         return;

      $this->between($param);
   }
}
