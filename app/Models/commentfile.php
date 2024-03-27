<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class commentfile extends Model
{
    use HasFactory;
    protected $fillable = ['id' , 'comment_id' ,'file_path','file_type','prefix' ];


}
