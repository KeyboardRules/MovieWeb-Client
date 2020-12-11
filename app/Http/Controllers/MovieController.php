<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Review;

class MovieController extends Controller
{
    function MovieListView(Request $request){

        $movies=Movie::query();
        $movies->name($request);

        return view("client.views.movie-list",["movies"=>$movies->paginate(10)->appends(request()->input())]);
    }
    function MovieDetailView($id=0){
        $movie=Movie::find($id);
        if(!empty($movie)){
            $reviews=Review::query()->where('movie_review',$id);
            return view("client.views.movie-detail",["movie"=>$movie,"reviews"=>$reviews->paginate(10)->appends(request()->input())]);
        }
        else{
            return redirect()->route("movies");
        } 
    }
    function MovieCategoryView($category){
        $categories=Category::query()->where('name_category',$category)->first();

        if($categories!=null){
            $movies=Movie::query()->select('tb_movies.*')->join('tb_movies_categories','id_movie','=','tb_movies_categories.movie')
            ->where('tb_movies_categories.category',$categories->id_category);

            return view("client.views.movie-category",["movies"=>$movies->paginate(10)->appends(request()->input()),"category"=>$category]);
        }
        else{
            return redirect()->route("movies");
        } 
    }
}
