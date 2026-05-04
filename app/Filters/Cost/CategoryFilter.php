<?php

namespace App\Filters\Cost;

use EleFilter\Database\ModelFilter;

class CategoryFilter extends ModelFilter
{
   protected string $column = "category_id";

   public function apply(mixed $param): void
   {
      $this->equal($param);
   }
}
