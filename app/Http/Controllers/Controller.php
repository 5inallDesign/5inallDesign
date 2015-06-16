<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Client;
use App\Asset;
use App\Testimonial;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

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
        $clients = $clients->with('asset')->with('testimonial')->remember(30*24*60)->get();

        foreach ($clients as $client) {
            $services = explode(', ', $client->services_provided);
            $client->services = $services;

            foreach ($client->Asset as $asset)
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
            
        }
        if ($clients != '')
            return $clients;
    }

}
