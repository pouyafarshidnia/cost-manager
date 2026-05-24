<?php

namespace App\Filters\Cost;

use EleFilter\Database\ModelFilter;

class ExampleFilter extends ModelFilter
{
   protected string $column = "";

   public function apply(mixed $param): void
   {
      // Filter logic here : sample ->  $this->equal($param);
   }
}
