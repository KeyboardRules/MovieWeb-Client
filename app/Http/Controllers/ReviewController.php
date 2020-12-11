<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use App\Models\Movie;
use Auth;

class ReviewController extends Controller
{
    function Review(Request $request,$id){
        $data = $request->validate([
            'score_review' => 'required|numeric|min:0|max:5',
            'content_review' => 'required|min:20',
        ]);
        $review=new Review();
        $review->score_review=$data['score_review'];
        $review->content_review=$data['content_review'];
        $review->person_review=Auth::user()->id_user;
        $review->movie_review=$id;

        if($review->save()){
            return \redirect()->back()->with('review_message','Đánh giá thành công')->with('class','alert alert-success');
        }
        return \redirect()->back()->with('review_message','Đánh giá thất bại,xin hãy thử lại')->with('class','alert alert-danger');
    }
}
