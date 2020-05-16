<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;

class ProductController extends Controller
{
    public function show($category, $slug) {

        $category = Category::where('category_slug', $category)->first();
        
        // $mightAlsoLike = Product::where('slug', '=', $slug)->mightAlsoLike()->get();
        
        // get product object for view
        $product = Product::where('slug', $slug)->first();

        // split lines in description
		$lines = preg_split('/[\n\r]+/', $product->description->description);

        return view('pages.product-detail', [
            'category' => $category,
            'product' => $product,
            // 'mightAlsoLike' => $mightAlsoLike,
            'lines' => $lines
        ]);
    }
}
