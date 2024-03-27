<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pphoto extends Model
{
    use HasFactory;

    protected $fillable = ['id' , 'user_id' , 'path'] ;

    


}
