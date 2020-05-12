<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Genre;
use App\Models\Image;
use Illuminate\Support\Facades\Input;
use DB;


class CategoryController extends Controller
{
    public function show($slug) {

        $category = Category::where('category_slug', $slug)->where('menu', 1)->first();
        $genres = Genre::all();
        // dd($genres->products);

        // $rows= Genre::withCount('products')->get();
        
        // foreach ($rows as $row) {
        //     echo $row->products_count;
        //     // echo $row;
        // }

        $input = Request::all();
        $genreInput = $input['genre'];
        $conditionInput = $input['condition'];

        $products = 
            DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->leftJoin('genre_product', 'products.id', '=', 'genre_product.product_id')
            ->leftJoin('genres', 'genre_product.genre_id', '=', 'genres.id')
            ->leftJoin('images', 'images.product_id', '=', 'products.id')
            ->where('category_id', $category->id)
                ->when($genreInput, function ($query) use ($genreInput) {
                    return $query->where('genres.genre', $genreInput);
                })
                ->when($conditionInput, function ($query) use ($conditionInput) {
                    return $query->where('media_condition', $conditionInput);
                })
                ->select(['products.id', 'products.category_id', 'products.name', 'products.slug',  'products.media_condition', 
                'products.quantity', 'products.price', 'products.sale_price', 'products.status', 'products.featured', 'products.created_at',
                'images.path', 'categories.category', 'categories.category_slug', 'genres.genre'])
                ->groupby('products.id')
                ->get();
                
                // dd($products->count('genre'));
        
        return view('pages.product-listing', [
            'category' => $category,
            'genres' => $genres,
            'products' => $products
        ]);
    }

    public function ajaxFilter(Request $request)
    {
        $category = Category::where('category_slug', $slug)->first();
        
        $input = Request::all();
        $genreFilter = $input['genre'];
        $conditionFilter = $input['condition'];
        
        // if (!empty($genreFilter)) {
        $genreFilters = explode(',', $genreFilter);
        // dd($genreFilters);
        // dd(array($genreFilters));
        $testArr = ['rock'];

        // return response()->json($genreFilters[0] == 'rock');


        $products = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->leftJoin('genre_product', 'products.id', '=', 'genre_product.product_id')
        ->leftJoin('genres', 'genre_product.genre_id', '=', 'genres.id')
        ->leftJoin('images', 'images.product_id', '=', 'products.id')
        ->where('category_slug', 'cds')
        ->where(function($query) use ($genreFilters) {
                $query->whereIn('genre', $genreFilters);

            // if(count($genreFilters) > 0) 
                // $query->where('genre', '=', ['pop','rock']);
                // ->orWhere('genre', '=', $genreFilters[1]);
                // foreach ($genreFilters as $genre) {
                //     $query->orWhere('genre', $genre);
                // }
            // }
        })
        // ->when($genreFilter, function ($query) use ($genreFilter) {
        //     return $query->where($genreFilters);
        // })
        // ->when($conditionFilter, function ($query) use ($conditionFilter) {
        //     return $query->where('media_condition', $conditionFilter);
        // })
        ->select(['products.id', 'products.category_id', 'products.name', 'products.slug',  'products.media_condition', 
        'products.quantity', 'products.price', 'products.sale_price', 'products.status', 'products.featured', 'products.created_at',
        'images.path', 'categories.category', 'categories.category_slug', 'genres.genre'])
        ->groupby('products.id')
        ->get();
        
        // if(count($genreFilters) > 0) {
        //     $query->where('genre', $genreFilters);
        // }

        // $collection = $products->get();

        // foreach($collection as $product){
        //     dd($product);
        // }

        dd($products);

            // return response()->json($products);
        // }
        
        // if ($input) {
        //     return response()->json(['response' => $input]);
        // }
            
        // return json_encode($request);
    }
}



    // $data = $request->data;
    // echo json_encode($data);
    // exit;

    // return response()->json($request);


    // $input = Request::all();
    // $genreInput = $input['genre'];
    // dd($genreInput);


    // return response()->json(json_decode($request));
    
    // if(Request::ajax()){
        //     // send request back with the chosen genre?
        //     $filterGenre = Genre::where('genre', $genreInput)->first();
        //     echo 
        //     return request()->fullUrlWithQuery(['genre' => $genre->genre]);
        //     // return $genreInput;
        // }

        // return response()->json(['response'=> 'This is get method']);



    // ***************************************************************
    // GETS PRODUCTS WITHIN A GENRE FROM REQUEST (FILTER)
    // https://laracasts.com/discuss/channels/general-discussion/confused-on-how-to-access-data-over-multiple-many-to-many-relations
    // $input = Request::all();
    // $genreFilter = $input['genre'];
    // $genres = Genre::with('products')->where('genre', $genreFilter)->get();
    // foreach($genres as $genre){
    //     dd($genre->products);
    // }
