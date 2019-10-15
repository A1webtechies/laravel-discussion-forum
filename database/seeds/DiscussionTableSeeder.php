<?php

use Illuminate\Database\Seeder;
use App\Discussion;

class DiscussionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $discussion1 = ['user_id' => 1, 'channel_id' => 2, 'title' => 'Html Resume', 'slug' => 'html-resume', 'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur perferendis praesentium eligendi consequuntur similique totam assumenda laudantium reprehenderit animi fuga tempore molestias, velit repellat ad itaque eveniet dolorem corporis sapiente!'];
        $discussion2 = [
            'user_id' => 2, 'channel_id' => 3, 'title' => 'Discussion Forum', 'slug' => 'discussion-forum',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur perferendis praesentium eligendi consequuntur similique totam assumenda laudantium reprehenderit animi fuga tempore molestias, velit repellat ad itaque eveniet dolorem corporis sapiente!'
        ];
        $discussion3 = ['user_id' => 2, 'channel_id' => 4, 'title' => 'Discussion Forum 1', 'slug' => 'discussion-forum-1',  'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur perferendis praesentium eligendi consequuntur similique totam assumenda laudantium reprehenderit animi fuga tempore molestias, velit repellat ad itaque eveniet dolorem corporis sapiente!'];
        Discussion::create($discussion1);
        Discussion::create($discussion2);
        Discussion::create($discussion3);
    }
}
