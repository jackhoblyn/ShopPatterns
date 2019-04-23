<?php

namespace App;
use Laravel\Scout\Searchable;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use Searchable;
    protected $guarded = [];
    public $asYouType = true;


     /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
}
