<?php
namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;
use App\Models\Product;
use DB;

class SearchController extends Controller
{
    public function ajaxSearch(Request $request)
    {
        $input = Request::all();
        $query = $input['query'];
        // dd($text);

        $products = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where('name', 'LIKE', '%'.$query.'%')
            // ->select(['products.slug', 'categories.category_slug'])
            ->get();

        if (Request::ajax()) {
            $output = '';
            
            if (count($products) > 0) {
                $output = '<ul class="list-group" style="display: block; position: absolute; z-index: 1; cursor: pointer;">';
                foreach ($products as $product){
                    $output .= '<a href="'.$product->category_slug.'/'.$product->slug.'"><li id="searchItem" class="list-group-item">'.$product->name.'</li></a>';
                }
                $output .= '</ul>';
            }
            else {
                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }
        
            return $output;
            // return response()->json($products);
        }
    }
}
