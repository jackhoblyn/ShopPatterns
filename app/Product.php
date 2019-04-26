<?php

namespace App;
use Laravel\Scout\Searchable;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use Searchable;
    protected $guarded = [];
    public $asYouType = true;

    public function path()
    {
        return "/products/{$this->id}";
    }

    public function delete()
    {
        return "/products/delete/{$this->id}";
    }

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

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function avg($rating)
    {
        $this->update(['rating' => $rating]);
    }

    public function buy()
    {
        $this->decrement('stock', 1);
    }

    public function restock()
    {
        $this->increment('stock', 1);
    }

    public function edit()
    {
        return "/products/edit/{$this->id}";
    }
}
