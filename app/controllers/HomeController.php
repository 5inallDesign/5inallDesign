<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		$code = array();
        //$code[] = View::make('home.jscode.index');
        $vw = View::make('home.index')->with('code', implode(' ', $code));
        $vw->title = "5inallDesign by Matt Crandell | Web Design and Development";
        $vw->description = "Web Design, web development, search engine optimization, and logo design by Matt Crandell servicing all of Metro Detroit.";

        
        $vw->clients = $this->clients();

        $vw->special_wallpaper = $this->specialWallpaper();

        return $vw;
	}

	public function getPortfolio()
	{
		$code = array();
        //$code[] = View::make('home.jscode.index');
        $vw = View::make('home.portfolio')->with('code', implode(' ', $code));
        $vw->title = "5inallDesign by Matt Crandell | My Portfolio";
        $vw->description = "See Matt Crandell's past projects including web design and logo design.";

        $vw->clients = $this->clients('all');

        $vw->special_wallpaper = $this->specialWallpaper();

        return $vw;
	}

	public function postSubmitContact()
	{
		$data = array(
            'email' => Input::get('email'),
            'name' => Input::get('name'),
            'text' => Input::get('message')
        );
		Mail::send('emails.contact', $data, function($message)
		{
		    $message->from(Input::get('email'), Input::get('name'));
		    $message->to('matt@5inalldesign.com', 'Matt Crandell');
		    $message->replyTo(Input::get('email'), Input::get('name'));
		    $message->subject('You\'ve Been Contacted from 5inallDesign by '.Input::get('name').'!');
		});
		return $data;
	}

	public function getSubmitContact()
	{
		$data = array(
            'email' => Input::get('email'),
            'name' => Input::get('name'),
            'text' => Input::get('message')
        );
		Mail::send('emails.contact', $data, function($message)
		{
		    $message->from(Input::get('email'), Input::get('name'));
		    $message->to('matt@5inalldesign.com', 'Matt Crandell');
		    $message->subject('You\'ve Been Contact from 5inallDesign!');
		});
	}

	/*public function getSubmitContact()
	{
		echo 'test';
	}*/

	
	public function getTest()
	{
		echo 'test';
	}

	public function showWelcome()
	{
		return View::make('hello');
	}

	protected function specialWallpaper()
	{
		$date = strtotime(date("Y-m-d H:i:s"));
		$special_wallpaper = '';
		$stpatricksdayBegin = strtotime(date("Y")."-3-13");
		$stpatricksdayEnd = strtotime(date("Y")."-3-18");
		if ($date > $stpatricksdayBegin && $date < $stpatricksdayEnd)
		{
			$special_wallpaper = url('/').'/img/home-container-bg-st-patricks-day.jpg';
		}
		$halloweenBegin = strtotime(date("Y")."-10-1");
		$halloweenEnd = strtotime(date("Y")."-11-2");
		if ($date > $halloweenBegin && $date < $halloweenEnd)
		{
			$special_wallpaper = url('/').'/img/home-container-bg-halloween.jpg';
		}
		$thanksgivingBegin = strtotime("sunday, november ".date("Y")." + 3 weeks");
		$thanksgivingEnd = strtotime("friday, november ".date("Y")." + 3 weeks");
		if ($date > $thanksgivingBegin && $date < $thanksgivingEnd)
		{
			$special_wallpaper = url('/').'/img/home-container-bg-thanksgiving.jpg';
		}
		$christmasBegin = strtotime(date("Y")."-12-20");
		$christmasEnd = strtotime(date("Y")."-12-26");
		if ($date > $christmasBegin && $date < $christmasEnd)
		{
			$special_wallpaper = url('/').'/img/home-container-bg-christmas.jpg';
		}

		if ($special_wallpaper != '')
			return $special_wallpaper;
	}

	protected function clients($all = null)
	{
		$clients = Client::orderBy('display_order');
		if (!$all)
			$clients = $clients->take(8);
		$clients = $clients->remember(60*24*30)->get();
        foreach ($clients as $client) {
        	$services = explode(', ', $client->services_provided);
        	$client->services = $services;

        	$assets = Asset::where('client_id',$client->id)->orderBy('display_order')->get();
        	$client->assets = $assets;
        	//$featured_img = $assets->where('client_id',$client->id)->where('is_featured',1)->first();
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
        }
        if ($clients != '')
			return $clients;
	}

}
