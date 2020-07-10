<?php


namespace App\getPage;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\CssSelector\CssSelectorConverter;
class Page
{
    public static function getPage($params = [])
    {
        $url = $params['url'];
        $client = HttpClient::create([
            'http_version'=>'2.0',
            'proxy'=>'http://smile80:U5w8BuB@188.165.156.203:65233',
        ]);

        $response = $client->request('GET', $params['url'], [

        ]);
        return $response->getContent();
    }



}