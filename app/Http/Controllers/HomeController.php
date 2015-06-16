<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Client;
use App\Asset;
use App\Testimonial;

class HomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    */

    public function getIndex()
    {
        $vw = view('home.index');
        $vw->title = "5inallDesign by Matt Crandell | Web Design and Development";
        $vw->description = "Web Design, web development, search engine optimization, and logo design by Matt Crandell servicing all of Metro Detroit.";

        $vw->clients = $this->clients();
        $vw->special_wallpaper = $this->specialWallpaper();

        /*$twitter = new \Twitter(env('TWITTER_consumerKey'), env('TWITTER_consumerSecret'), env('TWITTER_accessToken'), env('TWITTER_accessTokenSecret'));

        $statuses = $twitter->load(\Twitter::ME);

        //print_r($statuses);

        foreach ($statuses as $status) {
            echo "<pre>", print_r($status, true), "</pre>";
            echo '<br>';
            echo $status->text;
            if(isset($status->entities->media))
                echo '<img src="'.$status->entities->media[0]->media_url.'">';
            echo '<br>';
            echo '<br>';
        }*/

        return $vw;
    }

    public function getPortfolio($client = null)
    {
        if ($client)
        {
            $client = Client::where('slug','=',$client)->first();
            if(!empty($client))
            {
                $services = explode(', ', $client->services_provided);
                $client->services = $services;

                $assets = Asset::where('client_id',$client->id)->orderBy('display_order')->get();
                $client->assets = $assets;
                foreach ($assets as $asset)
                {
                    if($asset->is_featured)
                        $client->featured_img = $asset->path;
                    
                    if($asset->display_order == 1)
                    {
                        $client->secondary_img = $asset->path;
                    }
                    if($asset->is_hover)
                    {
                        $client->secondary_img = $asset->path;
                    }
                }

                $testimonials = Testimonial::where('client_id',$client->id)->get();
                $client->testimonials = $testimonials;

                $vw = view('home.portfolio-item');
                $vw->title = $client->name." | 5inallDesign by Matt Crandell";
                $vw->description = $client->name;
                $vw->client = $client;
                $vw->fullPage = true;
                return $vw;
            } else {
                return Redirect::to('/portfolio', 301);
            }
        }
        $vw = view('home.portfolio');
        $vw->title = "My Portfolio | 5inallDesign by Matt Crandell";
        $vw->description = "See Matt Crandell's past projects including web design and logo design.";

        $vw->clients = $this->clients('all');
        $vw->special_wallpaper = $this->specialWallpaper();

        return $vw;
    }

    public function postSubmitContact()
    {
        $validator = \Validator::make(
            \Input::all(),
            array(
                'name' => 'required',
                'email' => 'required|email'
            )
        );
        if((\Input::get('url') != '') || ($validator->fails()))
        {
            echo 'Sorry, we don\'t like spammers here!';
        } else {
            $data = array(
                'email' => \Input::get('email'),
                'name' => \Input::get('name'),
                'text' => \Input::get('message')
            );
            \Mail::send('emails.contact', $data, function($message)
            {
                $message->from(\Input::get('email'), \Input::get('name'));
                $message->to('matt@5inalldesign.com', 'Matt Crandell');
                $message->replyTo(\Input::get('email'), \Input::get('name'));
                $message->subject('You\'ve Been Contacted from 5inallDesign by '.\Input::get('name').'!');
            });
        }
        return $data;
    }

    public function getSubmitContact()
    {
        return Redirect::to('/#contact', 301);
    }
}