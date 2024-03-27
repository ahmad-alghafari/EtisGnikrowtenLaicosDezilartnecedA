<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class info extends Model
{
    use HasFactory;
    protected $fillable = ['id' , 'community_status' , 'user_id' , 'overview' , 'address' , 'birth' , 'job' , 'phone' ,'follower' , 'following' ];

}
