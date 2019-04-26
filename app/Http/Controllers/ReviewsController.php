<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Review;

class ReviewsController extends Controller
{
   //  public function store(Product $product)
   //  {
   //  	$userId = auth()->user()->id; 

   //  	$curRating = $product->rating;
   //  	$reviewsNum = $product->reviews->count();
   //  	$rating = request('rating');

   //  	// if($reviewsNum > 0) {
   //  	//  	$product->rating = $curRating + $rating/$reviewsNum;
   //  	//  }
   //  	//  else
   //  	//  {
   //  	//  	$product->rating = request('rating');
   //  	//  }

   //      Review::create([
   //      	'user_id' => $userId,
   //      	'product_id' => $product->id,
			// 'name' => request('name'),
   //          'description' => request('description'),
   //          'rating' => $rating
   //      ]);

   //      $product->avg($rating);
   //      $product->save();

   //      return redirect($product->path());
   //  }


    public function store(Product $product)
    {
    	$userId = auth()->user()->id; 
    	$rating = request('rating');
    	// $revs = \DB::table('reviews')->where('product_id', '=', $product->id)->get()->count();
    	// $avg = \DB::table('reviews')->where('product_id', '=', $product->id)->get()->count();
    	// $avgStar = Review::avg('rating')->where('product_id', '=', $product->id);

        Review::create([

        	'user_id' => $userId,
        	'product_id' => $product->id,
			    'name' => request('name'),
          'description' => request('description'),
          'rating' => $rating
        ]);

        $avgStar = \DB::table('reviews')
         ->where('product_id', $product->id)
         ->avg('rating');

         $product->rating = $avgStar;
         $product->save();

        // $curRating = $product->rating;
        // $totRaing = $curRating->increment('rating');

  	 	// if( $revs > 0 ) {
    	//  	$product->rating = $totRaing / $revs;
    	//  }
    	//  else
    	//  {
    	//  	$product->rating = request('rating');
    	//  }
        
        // $product->save();

        // dd($avgStar);

        return redirect($product->path());

        
    }
}
