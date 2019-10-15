<?php

use App\Channel;
use Illuminate\Database\Seeder;

class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channels = [['title' => 'Nodejs', 'slug' => str_slug('Nodejs')], ['title' => 'Reactjs', 'slug' => str_slug('Reactjs')], ['title' => 'Redux', 'slug' => str_slug('Redux')], ['title' => 'Redux-Thunk',  'slug' => str_slug('Redux-Thunk')], ['title' => 'Monogodb', 'slug' => str_slug('Monogodb')], ['title' => 'Laravel', 'slug' => str_slug('Laravel')]];

        foreach ($channels as $channel) {
            Channel::create($channel);
        }
    }
}
