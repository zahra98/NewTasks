<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rented extends Model
{
    use HasFactory;

    protected $fillable = [
        'renter_id',
        'status',
        'rentedBook_id',
        'startDate',
        'dueDate',
        'request_id',
        ' owner_id',

        
    ];
}
