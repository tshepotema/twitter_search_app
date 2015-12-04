<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tweet;      //Tweet Model
use App\TweetUser;  //TweetUser Model

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db_tweets = DB::table('tweets')
                    ->leftJoin('tweet_users', 'tweets.tweet_user_id', '=', 'tweet_users.id')
                    ->select('tweets.id', 'tweets.tweet', 'tweet_users.name', 'tweet_users.profile_image_url')
                    ->orderBy('tweets.updated_at', 'desc')
                    ->take(10)
                    ->get();

        return $db_tweets;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //return "store_req : <pre>".print_r($request,true)."</pre>";

        $tweets = $request->json()->all();

        foreach ($tweets as $tweet) {
            $tweet_id = $tweet['id_str'];
            $tweet_str = $tweet['text'];
            $tweet_src = $tweet['source'];
            $tweet_time = $tweet['created_at'];

            $tweet_user_id = $tweet['user']['id_str'];
            $tweet_user_name = $tweet['user']['name'];
            $tweet_user_username = $tweet['user']['screen_name'];
            $tweet_user_location = $tweet['user']['location'];
            $tweet_user_bio = $tweet['user']['description'];
            $tweet_user_img = $tweet['user']['profile_image_url'];

            $tweetRecord = new Tweet;
            $tweetRecord->id = $tweet_id;
            $tweetRecord->tweet = $tweet_str;
            $tweetRecord->source = $tweet_src;
            $tweetRecord->tweeted_at = $tweet_time;
            $tweetRecord->tweet_user_id = $tweet_user_id;
            $tweetRecord->save();

            $tweetUserRecord = new TweetUser;
            $tweetUserRecord->id = $tweet_user_id;
            $tweetUserRecord->name = $tweet_user_name;
            $tweetUserRecord->username = $tweet_user_username;
            $tweetUserRecord->location = $tweet_user_location;
            $tweetUserRecord->bio = $tweet_user_bio;
            $tweetUserRecord->profile_image_url = $tweet_user_img;
            $tweetUserRecord->save();

        }

        $db_tweets = DB::table('tweets')
                    ->leftJoin('tweet_users', 'tweets.tweet_user_id', '=', 'tweet_users.id')
                    ->select('tweets.id', 'tweets.tweet', 'tweet_users.name', 'tweet_users.profile_image_url')
                    ->get();

        return $db_tweets;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
