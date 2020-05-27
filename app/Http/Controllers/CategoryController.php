<?php

namespace App\Http\Controllers;

use DB;
use Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Genre;

class CategoryController extends Controller
{
    public function show($slug, Request $request)
    {
        $category = Category::where('category_slug', $slug)->where('menu', 1)->first();
        $genres = Genre::all();
        $input = Request::all();

        $products = $this->getData($input, $slug);
        
        return view('pages.product_listing', [
            'input' => $input,
            'category' => $category,
            'genres' => $genres,
            'products' => $products
        ]);
    }

    public function ajaxFilter(Request $request)
    {
        $input = Request::all();            
        $category = $input['pathName'];
        unset($input['pathName']);

        $collection = $this->getData($input, $category);

        $paginator = view('components.pagination', [
            'input' => $input,
            'product' => $collection])->render();
        
        $products = view('components.filtered_product', [
            'products' => $collection])->render();

        if (Request::ajax()) {
            return response()->json([
                'data' => $products,
                'paginator' => $paginator,
                'slug' => $category,
                'collection' => $collection
            ]);
        }
    }
    
    private function getData($queryString, $category) 
    {
        $genreFilter = $queryString['genre'];
        $conditionFilter = $queryString['condition'];
        $genreFilters = explode(',', $genreFilter);
        $sort = $queryString['sort'];        

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
            $products->orderBy('products.created_at', 'DESC');
        } else if ($sort == 'oldest'){
            $products->orderBy('products.created_at', 'ASC');
        } else if ($sort == 'price-low') {
            $products->orderBy('products.price', 'ASC');
        } else if ($sort == 'price-high') {
            $products->orderBy('products.price', 'DESC');
        }
        
        $collection = $products->orderBy('products.created_at', 'DESC')
        ->groupby('products.id')
        ->paginate(9);
        // ->get();

        return $collection;
    }
}


