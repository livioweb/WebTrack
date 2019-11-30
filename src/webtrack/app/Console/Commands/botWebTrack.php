<?php

namespace App\Console\Commands;

use App\Page;
use App\Url;
use Arcanedev\LogViewer\Entities\Log;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Exception\ClientException;

class botWebTrack extends Command
{

    private $_headers;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'botrack:scraping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawler page http';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->_headers = [
            'Accept' => 'application/json',
        ];
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $urls = Url::all();
        // dd($urls);

        foreach ($urls as $url) {
            try {

                $page = new Page();
                $page->user_id = $url->user_id;
                $page->url_id = $url->id;
                $page->url = $url->url;
                ##TODO - Criar rotina no crwaler para pegar o titulo das paginas
                $page->title = "Titulo da pagia vindo pelo scrapping";
                $page->status = 200;//$this->sendGet($url->url);
                $page->is_crawled = true;
                $page->save();
                $nUrl = Url::find($url->user_id);
                $nUrl->is_crawled = $nUrl->is_crawled + 1;
                $nUrl->update();
                echo "ok";
            } catch (\Exception $e) {
                Log::info("URL Crapping |Route:" . $url . " | " . var_dump($e->getMessage()), $e->getCode());

                throw new \Exception($e->getMessage(), $e->getCode());
            }
        }


    }


    public function sendGet($url)
    {
        try {
            $request = \HttpCrapping::get($url, ['headers' => $this->_headers], []);
            return $request;

        } catch (ClientException $e) {
            Log::info("URL Crapping |Route:" . $url . " | " . var_dump($e->getMessage()), $e->getCode());

            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    public function getStatus($request)
    {
        return $request->getStatusCode();
    }

    public function getBody($request)
    {
        return ($request->getBody()->getContents());
    }
}
