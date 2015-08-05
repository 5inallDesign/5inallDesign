<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use App\Client;
use App\Asset;
use App\Testimonial;

class ClientCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'clients';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $type = $this->option('type');
        switch($type)
        {
            case 'clients':
                $this->clients();
                break;
            case 'assets':
                $this->assets();
                break;
            case 'testimonials':
                $this->testimonials();
                break;
            default:
                $this->info('Possible --type= values: clients, assets');
                break;
        }

    }

    public function clients()
    {
        set_time_limit(30*60); // 30 Mins
        ini_set('memory_limit', '1024M');
        $this->info("Begin Loading Clients");
        $counter='';

        if (($handle = fopen(url('/')."/data/clients.csv", "r")) !== FALSE)
        {
            if(($data = fgetcsv($handle, null, ",")) !== FALSE)
            {
                //skip the label row
                //var_dump($data);
                $num = count($data);
                $this->info("clients.csv ".$num." columns\n");
            }

            $counter=0;
            while (($data = fgetcsv($handle, null, ",")) !== FALSE)
            {  
                $counter++;
                if(count($data)!=$num)
                {
                    $this->info($counter.": column # mismatch ".count($data)."\n");
                }
                else
                {
                    $client = Client::where("name","=",$data[0])->first();
                    if(empty($client))
                    {
                        /*DB::table('clients')->insert(array(
                            'name' => $data[0],
                            'slug' => $this->toAscii($data[0]),
                        ));*/
                        $client = new Client;
                        $client->name = $data[0];
                        $client->slug = $this->toAscii($data[0]);
                        $client->is_featured = $data[2];
                        $client->city = $data[3];
                        $client->state = $data[4];
                        $client->services_provided = $data[5];
                        $client->url = $data[6];
                        $client->is_use_url = ($data[6] != '')?1:0;
                        $client->description = $data[7];
                        $client->display_order = ($data[8] != '')?$data[8]:999;
                        $client->is_custom = ($data[9] != '')?1:0;
                        $client->is_active = ($data[10] != '')?1:0;
                        $client->save();
                    } else {
                        $client->slug = $this->toAscii($data[0]);
                        $client->is_featured = $data[2];
                        $client->city = $data[3];
                        $client->state = $data[4];
                        $client->services_provided = $data[5];
                        $client->url = $data[6];
                        $client->is_use_url = ($data[6] != '')?1:0;
                        $client->description = $data[7];
                        $client->display_order = ($data[8] != '')?$data[8]:999;
                        $client->is_custom = ($data[9] != '')?1:0;
                        $client->is_active = ($data[10] != '')?1:0;
                        $client->save();
                    }
                }
            }
            fclose($handle);
        }
        $this->info("Loaded $counter Clients\n");
    }

    public function assets()
    {
        set_time_limit(30*60); // 30 Mins
        ini_set('memory_limit', '1024M');
        $this->info("Begin Loading Assets");
        $counter='';

        if (($handle = fopen(url('/')."/data/assets.csv", "r")) !== FALSE)
        {
            if(($data = fgetcsv($handle, null, ",")) !== FALSE)
            {
                //skip the label row
                //var_dump($data);
                $num = count($data);
                $this->info("assets.csv ".$num." columns\n");
            }

            $counter=0;
            while (($data = fgetcsv($handle, null, ",")) !== FALSE)
            {
                if(count($data)!=$num)
                {
                    $this->info($counter.": column # mismatch ".count($data)."\n");
                }
                else
                {
                    $client = Client::where("name","=",$data[6])->first();
                    if($client)
                    {
                        $asset = Asset::where("path","=",$data[0])->first();
                        $counter++;
                        if(empty($asset))
                        {
                            $asset = new \App\Asset;
                            $asset->path = $data[0];
                            $asset->type = $data[1];
                            $asset->is_featured = $data[2];
                            $asset->short_description = $data[3];
                            $asset->description = $data[4];
                            $asset->client_id = $client->id;
                            $asset->client_name = $client->name;
                            $asset->client_slug = $client->slug;
                            $asset->display_order = ($data[8] != '')?$data[8]:999;
                            $asset->is_hover = $data[9];
                            $asset->save();
                        } else {
                            $asset->type = $data[1];
                            $asset->is_featured = $data[2];
                            $asset->short_description = $data[3];
                            $asset->description = $data[4];
                            $asset->client_id = $client->id;
                            $asset->client_name = $client->name;
                            $asset->client_slug = $client->slug;
                            $asset->display_order = ($data[8] != '')?$data[8]:999;
                            $asset->is_hover = $data[9];
                            $asset->save();
                        }
                    }
                }
            }
        fclose($handle);
        }
        $this->info("Loaded $counter Assets\n");
    }

    public function testimonials()
    {
        set_time_limit(30*60); // 30 Mins
        ini_set('memory_limit', '1024M');
        $this->info("Begin Loading Testimonials");
        $counter='';

        if (($handle = fopen(url('/')."/data/testimonials.csv", "r")) !== FALSE)
        {
            if(($data = fgetcsv($handle, null, ",")) !== FALSE)
            {
                //skip the label row
                //var_dump($data);
                $num = count($data);
                $this->info("testimonials.csv ".$num." columns\n");
            }

            $counter=0;
            while (($data = fgetcsv($handle, null, ",")) !== FALSE)
            {
                if(count($data)!=$num)
                {
                    $this->info($counter.": column # mismatch ".count($data)."\n");
                }
                else
                {
                    $client = Client::where("name","=",$data[2])->first();
                    if($client)
                    {
                        $testimonial = Testimonial::where("author","=",$data[1])->first();
                        $counter++;
                        if(empty($testimonial))
                        {
                            $testimonial = new Testimonial;
                            $testimonial->testimonial = $data[0];
                            $testimonial->author = $data[1];
                            $testimonial->client_id = $client->id;
                            $testimonial->save();
                        } else {
                            $testimonial->testimonial = $data[0];
                            $testimonial->author = $data[1];
                            $testimonial->client_id = $client->id;
                            $testimonial->save();
                        }
                    }
                }
            }
        fclose($handle);
        }
        $this->info("Loaded $counter Testimonials\n");
    }

    public function toAscii($str, $replace=array(), $delimiter='-')
    {
        if( !empty($replace) ) {
            $str = str_replace((array)$replace, ' ', $str);
        }

        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

        return $clean;
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            //array('example', InputArgument::REQUIRED, 'An example argument.'),
        );
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
            array('type', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
        );
    }
}
