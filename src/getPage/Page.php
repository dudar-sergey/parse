<?php


namespace App\getPage;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\CssSelector\CssSelectorConverter;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class Page
{
    public static function getPage($params = [])
    {
        $url = $params['url'];
        $client = HttpClient::create([
            'proxy'=>'http://smile80:U5w8BuB@188.165.156.203:65233',
            'verify_peer' => 'false'
        ]);

        try {
            $response = $client->request('GET', $params['url'], []);
            return $response->getContent();
        } catch (TransportExceptionInterface $e) {
        } catch (ClientExceptionInterface $e) {
        } catch (RedirectionExceptionInterface $e) {
        } catch (ServerExceptionInterface $e) {
        }
        return 0;
    }



}