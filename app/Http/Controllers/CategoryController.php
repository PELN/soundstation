<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Genre;
use App\Models\Year;
use Illuminate\Support\Facades\Input;


class CategoryController extends Controller
{

    public function show($slug) {

        // $categories = Category::all();

        $category = Category::where('slug', $slug)->where('menu', 1)->first();

        $products = Product::all();


        // foreach ($category->products as $product) {
        //     dd($product);
        // }

        // TODO
        // 1. find products genres within the requested category - use request() ???
        // 2. show products within the requested genre - product-listing page ??
        // 3. count the amount of products that has each genre

        //counts all products genre amount, not by category
        $genres = Genre::all();

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

        //finds the first genre and returns all products with that genre
        // $genres = Genre::all()->first();
        // dd($genres->products);
        
        // foreach ($genre->products as $product) {
        //     dd($product);
        // }
        // dd($genre->products);

        // finds first row in genre_product table (genre_id POP, product_id It Is What It Is)
        // foreach ($genres->product as $product) {
        //     dd($product->name);
        // }

        $input = Request::all();
        // dd($input['genre']);
        
        $genreInput = $input['genre'];

        // $request = request('genre')
        $filterGenre = Genre::where('genre', $genreInput)->first();
        // dd($filterGenre->genre);

        if($filterGenre){
            $filterGenre = Genre::where('genre', $genreInput)->first();
            echo $filterGenre->products;
            // echo $filterGenre->genre;
        }
        
        
        $years = Year::all();
        
        return view('pages.product-listing', [
            // 'categories' => $categories,
            'category' => $category,
            'genres' => $genres,
            'years' => $years,
            'genres' => $genres,
            'products' => $products,
            // 'genre' => request('genre'),
            // 'condition' => request('condition'),
            'filterGenre' => $filterGenre
        ]);
    }

}
