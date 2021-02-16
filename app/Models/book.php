<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'auther',
        'catagory',
        'copies',
        'ispn',
    ];

public function auther(){
    return $this->belongsTo(User::class);
}
public function user(){
    return $this->belongsTo(User::class);
}

}
