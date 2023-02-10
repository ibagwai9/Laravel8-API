<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Journal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'abstract',
        'author',
        'publisher',
        'publication_date',
        'publisher_address',
        'user_id',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
