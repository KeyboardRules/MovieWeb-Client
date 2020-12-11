<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $table = 'tb_movies';
    protected $primaryKey='id_movie';
    protected $fillable = [
        'name_movie',
        'date_movie',
        'image_movie',
        'trailer_movie',
        'length_movie',
        'content_movie',
    ];
    public function categories(){
        return $this->belongsToMany('App\Models\Category','tb_movies_categories','movie','category');
    }
    public function theaters(){
        return $this->belongsToMany('App\Models\Theater','tb_movies_theaters','movie','theater');
    }
    public function reviews(){
        return $this->hasMany('App\Models\Review','movie_review','id_movie');
    }
    public function scopeName($query,Request $request){
        if($request->name_movie!=""){
            $query->where('name_movie', 'LIKE', '%' . $request->name_movie . '%');
        }
        return $query;
    }
    public function score(){
        if($this->reviews()->count()!=0){
            return $this->reviews()->avg('score_review');
        }
        return 0;
    }
    public function getScoreAttribute()
    {
        if($this->reviews()->count()!=0){
            return $this->reviews()->avg('score_review');
        }
        return 0;
    }
}
