<?php

namespace App\Filters\Category;

use EleFilter\Database\ModelFilter;

class SearchFilter extends ModelFilter
{
   protected string $column = "title";


   public function apply(mixed $param): void
   {
      $this->like($param);
   }
}
