<?php

use App\Discussion;
use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = 'PHP';

        $t2 = 'Laravel';

        $t3 = 'C#';

        $t4 = 'Java Script';


        $d1 = [
          'title' => $t1,
          'body' => 'PHP (recursive acronym for PHP: Hypertext Preprocessor) is a widely-used open source general-purpose scripting language that is especially suited for web development and can be embedded into HTML.' ,
          'channel_id' => 1,
          'user_id' => 1,
          'slug' => str_slug($t1)
        ];
        $d2 = [
            'title' => $t2,
            'body' => 'Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:' ,
            'channel_id' => 2,
            'user_id' => 1,
            'slug' => str_slug($t2)
        ];
        $d3 = [
            'title' => $t3,
            'body' => 'C# is a multi-paradigm programming language encompassing strong typing, imperative, declarative, functional, generic, object-oriented, and component-oriented programming disciplines' ,
            'channel_id' => 3,
            'user_id' => 2,
            'slug' => str_slug($t3)
        ];
        $d4 = [
            'title' => $t4,
            'body' => 'JavaScript, often abbreviated as JS, is a high-level, dynamic, weakly typed, prototype-based, multi-paradigm, and interpreted programming language.' ,
            'channel_id' => 4,
            'user_id' => 1,
            'slug' => str_slug($t4)
        ];

        Discussion::create($d1);
        Discussion::create($d2);
        Discussion::create($d3);
        Discussion::create($d4);
    }
}
