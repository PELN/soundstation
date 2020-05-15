<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Genre;
use App\Models\Image;
use DB;


class CategoryController extends Controller
{
    public function show($slug, Request $request)
    {
        $category = Category::where('category_slug', $slug)->where('menu', 1)->first();
        $genres = Genre::all();
        // dd($genres->products);

        $input = Request::all();

        $products = $this->getData($input, $slug);

        return view('pages.product-listing', [
            'input' => $input,
            'category' => $category,
            'genres' => $genres,
            'products' => $products
        ]);
    }

    public function ajaxFilter(Request $request)
    {
        
        try {
            $input = Request::all();            
            // dd($collection);
            $category = $input['pathName'];

            $collection = $this->getData($input, $category);
            $paginator = view('components.pagination', [
                'input' => $input,
                'product' => $collection])->render();
                
            if (Request::ajax()) { 
                return response()->json([
                    "data" => $collection,
                    "paginator" => $paginator,
                    "slug" => $category
                ]);
            }
        }
        catch(\Exception $e) {
            echo json_encode($e->getMessage());
        }
    }
    
    private function getData($queryString, $category) 
    {
        $genreFilter = $queryString['genre'];
        $conditionFilter = $queryString['condition'];
        $genreFilters = explode(',', $genreFilter);
        $sort = $queryString['sort'];
        
        $page = $queryString['page'];
        // dd($sortOldest);

        $products = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->leftJoin('genre_product', 'products.id', '=', 'genre_product.product_id')
            ->leftJoin('genres', 'genre_product.genre_id', '=', 'genres.id')
            ->leftJoin('images', 'images.product_id', '=', 'products.id')
            ->leftJoin('artist_product', 'products.id', '=', 'artist_product.product_id')
            ->leftJoin('artists', 'artist_product.artist_id', '=', 'artists.id')
            ->where('category_slug', $category);

        if ($genreFilters != [""]) {
            $products->where(function($query) use ($genreFilters) {
                    $query->whereIn('genre', $genreFilters);
            });
        }
        if ($conditionFilter) {
            if ($conditionFilter == 'new'){
                $products->where('media_condition', 1);
            } else if ($conditionFilter == 'used') {
                $products->where('media_condition', 0);
            }
        } else {
            if ($conditionFilter == 'any'){
                $products->whereIn('media_condition', [0, 1]);
            }
            $products->whereIn('media_condition', [0, 1]);
        }
        
        $products->select(['products.id', 'products.category_id', 'products.name', 'products.slug',  'products.media_condition', 
        'products.quantity', 'products.price', 'products.sale_price', 'products.status', 'products.featured', 'products.created_at',
        'images.path', 'categories.category', 'categories.category_slug', 'genres.genre', 'artists.artist']);

        if ($sort == 'newest'){
            $products->orderBy('products.created_at', 'ASC');
        } else if ($sort == 'oldest'){
            $products->orderBy('products.created_at', 'DESC');
        } else if ($sort == 'price-low') {
            $products->orderBy('products.price', 'ASC');
        } else if ($sort == 'price-high') {
            $products->orderBy('products.price', 'DESC');
        }
        
        $collection = $products->groupby('products.id')
        ->paginate(3);
        // ->get();

        return $collection;
    }
}






    
    // ***************************************************************
    // function shoow

        // $input = Request::all();
        // $genreInput = $input['genre'];
        // $conditionInput = $input['condition'];
                // ->when($genreInput, function ($query) use ($genreInput) {
                //     return $query->where('genres.genre', $genreInput);
                // })
                // ->when($conditionInput, function ($query) use ($conditionInput) {
                //     return $query->where('media_condition', $conditionInput);
                // })
    // ***************************************************************


    // return response()->json($genreFilters[0] == 'rock');


    // if ($input) {
    //     return response()->json(['response' => $input]);
    // }
        
    // return json_encode($request);


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
