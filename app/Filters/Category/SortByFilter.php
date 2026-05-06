<?php

namespace App\Filters\Category;

use EleFilter\Database\ModelFilter;

class SortByFilter extends ModelFilter
{


   public function nameAsc(): void
   {
      $this->asc('title');
   }


   public function nameDesc(): void
   {
      $this->desc('title');
   }


   public function dateAsc(): void
   {
      $this->asc('created_at');
   }


   public function dateDesc(): void
   {
      $this->desc('created_at');
   }
}
