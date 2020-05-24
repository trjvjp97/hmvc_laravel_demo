<?php


namespace Core\Modules\Book\Models;


use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title','author','created_by'];

    public function user(){
        return $this->belongsTo('App\User','created_by','id');
    }
}
