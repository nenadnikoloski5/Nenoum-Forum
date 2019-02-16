<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'username' => 'nenadn',
            'email' => 'nenad@gmail.com',
            'password' => bcrypt('1234qwer'),
            'profilePic' => 'head_emerald.png',
            'created_at' => '2019-02-16 15:41:46',
            'updated_at' => '2019-02-16 15:41:46'
        ]);

        DB::table('users')->insert([
            'username' => 'juliaC',
            'email' => 'julia@gmail.com',
            'password' => bcrypt('1234qwer'),
            'profilePic' => 'head_emerald.png',
            'created_at' => '2019-02-16 15:49:36',
            'updated_at' => '2019-02-16 15:49:36'
        ]);

        DB::table('users')->insert([
            'username' => 'saraH',
            'email' => 'sara@gmail.com',
            'password' => bcrypt('1234qwer'),
            'profilePic' => 'head_carrot.png',
            'created_at' => '2019-02-16 16:16:24',
            'updated_at' => '2019-02-16 16:16:24'
        ]);

        DB::table('users')->insert([
            'username' => 'bobP',
            'email' => 'bob@gmail.com',
            'password' => bcrypt('1234qwer'),
            'profilePic' => 'head_sun_flower.png',
            'created_at' => '2019-02-16 16:17:18',
            'updated_at' => '2019-02-16 16:17:18'
        ]);
            // END users

        DB::table('posts')->insert([
             'postedAtForum' => 'generalIT',
             'postedBy' => 'nenadn',
             'postedByID' => 1,
             'postBody' => 'Amazing',
             'postTitle' => 'Today Amazon became the richest company',
             'likesAmount' => '0',
             'created_at' => '2019-02-16 15:43:27',
             'updated_at' => '2019-02-16 15:43:27'
         ]);

         DB::table('posts')->insert([
            'postedAtForum' => 'introduce',
            'postedBy' => 'nenadn',
            'postedByID' => 1,
            'postBody' => 'Hah',
            'postTitle' => 'I am nenad and I own this site',
            'likesAmount' => '0',
            'created_at' => '2019-02-16 15:44:25',
            'updated_at' => '2019-02-16 15:44:25'
        ]);

        DB::table('posts')->insert([
            'postedAtForum' => 'realLife',
            'postedBy' => 'juliaC',
            'postedByID' => 3,
            'postBody' => 'I am free',
            'postTitle' => 'Does anyone want to go out?',
            'likesAmount' => '0',
            'created_at' => '2019-02-16 16:05:21',
            'updated_at' => '2019-02-16 16:05:21'
        ]);

        DB::table('posts')->insert([
            'postedAtForum' => 'hardware',
            'postedBy' => 'sahaH',
            'postedByID' => 4,
            'postBody' => 'I do',
            'postTitle' => 'Guess who owns a 2080 ti',
            'likesAmount' => '0',
            'created_at' => '2019-02-16 16:16:40',
            'updated_at' => '2019-02-16 16:16:40'
        ]);

        DB::table('posts')->insert([
            'postedAtForum' => 'videoGames',
            'postedBy' => 'bobP',
            'postedByID' => 5,
            'postBody' => 'title',
            'postTitle' => 'I just hit max lvl, I am so proud of myself',
            'likesAmount' => '0',
            'created_at' => '2019-02-16 16:17:40',
            'updated_at' => '2019-02-16 16:17:40'
        ]);

        DB::table('posts')->insert([
            'postedAtForum' => 'ITNews',
            'postedBy' => 'bobP',
            'postedByID' => 5,
            'postBody' => 'Truly great news',
            'postTitle' => 'AMD is better',
            'likesAmount' => '0',
            'created_at' => '2019-02-16 16:17:56',
            'updated_at' => '2019-02-16 16:17:56'
        ]);

        DB::table('posts')->insert([
            'postedAtForum' => 'introduce',
            'postedBy' => 'bobP',
            'postedByID' => 5,
            'postBody' => 'nice to meet all of you ! :)',
            'postTitle' => 'Hey I am billy bob',
            'likesAmount' => '0',
            'created_at' => '2019-02-16 16:28:11',
            'updated_at' => '2019-02-16 16:28:11'
        ]);
            // END posts
        

         DB::table('post_replies')->insert([
            'replyToPostID' => 1,
            'replyByUser' => 'nenadn',
            'replyByIDUser' => 1,
            'replyBody' => 'Oh btw, jeff is getting divorced',
            'created_at' => '2019-02-16 15:43:49',
            'updated_at' => '2019-02-16 15:43:49'
         ]);

         DB::table('post_replies')->insert([
            'replyToPostID' => 3,
            'replyByUser' => 'nenadn',
            'replyByIDUser' => 1,
            'replyBody' => 'Sure, i am free',
            'created_at' => '2019-02-16 16:16:01',
            'updated_at' => '2019-02-16 16:16:01'
         ]);

         DB::table('post_replies')->insert([
            'replyToPostID' => 4,
            'replyByUser' => 'juliaC',
            'replyByIDUser' => 3,
            'replyBody' => 'Jealousss',
            'created_at' => '2019-02-16 16:17:01',
            'updated_at' => '2019-02-16 16:17:01'
         ]);

         // END posts_replies


         DB::table('post_likes')->insert([
            'votedToPostID' => 1,
            'votedByUser' => 'nenadn',
            'votedByUserID' => 1,
            'votedAmount' => 1,
            'created_at' => '2019-02-16 15:43:55',
            'updated_at' => '2019-02-16 15:43:55'
         ]);

         DB::table('post_likes')->insert([
            'votedToPostID' => 1,
            'votedByUser' => 'juliaC',
            'votedByUserID' => 3,
            'votedAmount' => 1,
            'created_at' => '2019-02-16 16:07:55',
            'updated_at' => '2019-02-16 16:07:55'
         ]);

         DB::table('post_likes')->insert([
            'votedToPostID' => 2,
            'votedByUser' => 'juliaC',
            'votedByUserID' => 3,
            'votedAmount' => 1,
            'created_at' => '2019-02-16 16:13:25',
            'updated_at' => '2019-02-16 16:13:25'
         ]);

         DB::table('post_likes')->insert([
            'votedToPostID' => 2,
            'votedByUser' => 'nenadn',
            'votedByUserID' => 1,
            'votedAmount' => 1,
            'created_at' => '2019-02-16 16:13:46',
            'updated_at' => '2019-02-16 16:13:46'
         ]);

         DB::table('post_likes')->insert([
            'votedToPostID' => 3,
            'votedByUser' => 'nenadn',
            'votedByUserID' => 1,
            'votedAmount' => 1,
            'created_at' => '2019-02-16 16:16:02',
            'updated_at' => '2019-02-16 16:16:02'
         ]);

         DB::table('post_likes')->insert([
            'votedToPostID' => 2,
            'votedByUser' => 'bobP',
            'votedByUserID' => 5,
            'votedAmount' => 1,
            'created_at' => '2019-02-16 16:28:21',
            'updated_at' => '2019-02-16 16:28:21'
         ]);
    }
}
