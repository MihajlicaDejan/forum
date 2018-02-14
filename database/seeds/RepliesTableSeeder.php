<?php

use App\Reply;
use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{

    public function run()
    {
        $r1 = [
        'user_id' => 1,
        'discussion_id' => 1,
        'body' => 'PHP is the best programing language!'
        ];

        $r2 = [
        'user_id' => 1,
        'discussion_id' => 2,
        'body' => 'Laravel is the best programing language!'
        ];

        $r3 = [
        'user_id' => 2,
        'discussion_id' => 3,
        'body' => 'C# is the best programing language!'
        ];

        $r4 = [
        'user_id' => 1,
        'discussion_id' => 4,
        'body' => 'Java Script is the best programing language!'
        ];

        Reply::create($r1);
        Reply::create($r2);
        Reply::create($r3);
        Reply::create($r4);
    }
}
