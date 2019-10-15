<?php

use Illuminate\Database\Seeder;
use App\Reply;

class ReplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reply1 = ['user_id' => 1, 'discussion_id' => 1, 'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur perferendis praesentium eligendi consequuntur similique totam assumenda laudantium reprehenderit animi fuga tempore molestias, velit repellat ad itaque eveniet dolorem corporis sapiente!'];
        $reply2 = ['user_id' => 2, 'discussion_id' => 2, 'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur perferendis praesentium eligendi consequuntur similique totam assumenda laudantium reprehenderit animi fuga tempore molestias, velit repellat ad itaque eveniet dolorem corporis sapiente!'];
        $reply3 = ['user_id' => 2, 'discussion_id' => 3, 'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur perferendis praesentium eligendi consequuntur similique totam assumenda laudantium reprehenderit animi fuga tempore molestias, velit repellat ad itaque eveniet dolorem corporis sapiente!'];
        App\Reply::create($reply1);
        App\Reply::create($reply2);
        App\Reply::create($reply3);
    }
}
