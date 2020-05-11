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

        // $categories = Category::all();
        $category = Category::where('category_slug', $slug)->where('menu', 1)->first();
        
        // $products = Product::all();

        //counts all products genre amount, not by category
        $genres = Genre::all();
        // dd($genres->products);

        // $rows= Genre::withCount('products')->get();
        
        // foreach ($rows as $row) {
        //     echo $row->products_count;
        //     // echo $row;
        // }
    
        // foreach($category->products as $product){
        //     foreach($product->genres as $genre){
        //         echo $genre->products;
        //     }
        // }

        // foreach ($genres as $genre) {
        //     dd($genre->products->count());
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
            

        // if(!empty($genreInput)) {
            // $productsGenre = Product::where('category_id', $category->id);
            // dd($productsGenre->genres);

            // $product = Product::with(['category', 'genres'])->where('category_id', $category->id)->get();
            // foreach($product as $row){
            //     // dd($row->genres);
            // }
            // dd($product);

            // $filterGenre = Genre::where('genre', $genreInput)->first();
            // dd($filterGenre->products);
        // }

        // if(!empty($conditionInput)) {
        //     if($conditionInput == 'new'){
        //         $filterNewCondition = Product::where('media_condition', 1)->where('category_id', $category->id)->get();
        //         // echo $filterNewCondition;
        //     }
        //     else if($conditionInput == 'used') {
        //         $filterUsedCondition = Product::where('media_condition', 0)->where('category_id', $category->id)->get();
        //         // echo $filterUsedCondition;
        //     }
        // }


        // if(Request::ajax()){
        //     return response()->json(['response' => 'This is get method']);
        // };

        
        return view('pages.product-listing', [
            // 'categories' => $categories,
            'category' => $category,
            'genres' => $genres,
            'products' => $products
            // 'products' => $products,
            // 'genre' => request('genre'),
            // 'condition' => request('condition'),
            // 'filterGenre' => $filterGenre,
            // 'filterNewCondition' => $filterNewCondition,
            // 'filterUsedCondition' => $filterUsedCondition
        ]);
    }

    // public function filter(Request $request)
    // {

        // $input = Request::all();
        // $genreInput = $input['genre'];
        // // dd($input['genre']);

        // if(!empty($genreInput)) {
        //     $filterGenre = Genre::where('genre', $genreInput)->first();
        // }

        // $genre = $request->Input('genre');

        // return "AJAX";

        // return response()->json(['response' => 'This is get method']);
        

        // if(Request::ajax()){
        //     // send request back with the chosen genre?
        //     $filterGenre = Genre::where('genre', $genreInput)->first();
        //     echo 
        //     return request()->fullUrlWithQuery(['genre' => $genre->genre]);
        //     // return $genreInput;
        // }
    // }

    
}
