<?php
use App\Channel;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{

    public function run()
    {
      $channel = ['title' => 'PHP', 'slug'  => str_slug('PHP')];
      $channe2 = ['title' => 'Laravel', 'slug' => str_slug('Laravel')];
      $channe3 = ['title' => 'C#', 'slug'  => str_slug('C#')];
      $channe4 = ['title' => 'Java Script', 'slug'   => str_slug('Java Script')];

      Channel::create($channel);
      Channel::create($channe2);
      Channel::create($channe3);
      Channel::create($channe4);
    }
}
