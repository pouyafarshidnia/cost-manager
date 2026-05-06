<?php

namespace App\Filters\Cost;

use EleFilter\Database\ModelFilter;

class SortByFilter extends ModelFilter
{

   public function titleAsc()
   {
      $this->asc('title');
   }

   public function titleDesc()
   {
      $this->desc('title');
   }


   public function categoryAsc()
   {
      $this->asc('category_id');
   }

   public function categoryDesc()
   {
      $this->desc('category_id');
   }



   public function priceAsc()
   {
      $this->asc('price');
   }

   public function priceDesc()
   {
      $this->desc('price');
   }


   public function spentAtAsc()
   {
      $this->asc('spent_at');
   }

   public function spentAtDesc()
   {
      $this->desc('spent_at');
   }
}
