<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'tb_categories';
    protected $primaryKey='id_category';
    protected $fillable = [
        'name_category',
        'description'
    ];
    public function isCategory($category){
        return $this->auth()->where('name_auth',$auth)->first();
    }
}
