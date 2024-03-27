<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\follow;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FollowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 2 ; $i < 78 ; $i++){
//            follow::created(['user_follow'=> $i , 'user_follower' => 1]);
            DB::table('follows')->insert(values:['user_follow'=> 107 , 'user_follower' => $i , 'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ,]);
        }
    }
}
