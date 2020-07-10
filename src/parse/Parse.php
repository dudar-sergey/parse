<?php


namespace App\parse;
require(__DIR__.'/../../lib/phpquery/phpQuery/phpQuery.php');
use App\getPage\Page;
use App\parse\saveImg;
use Symfony\Component\Console\Helper\ProgressBar;


class Parse
{
    private $save;
    public function __construct(saveImg $save)
    {
        $this->save = $save;
    }

    public function Parse($mainPage)
    {
        \phpQuery::newDocument($mainPage);
        pq('.analogsTabCartDescWrapperAnalog')->remove();
        $prod = pq(".anTabTr");
        $tmp = [];
        foreach ($prod as $key=>$pr)
        {
            $pr = pq($pr);
            if(trim($pr->find('.card-descRus')->text()) != '')
            {
                $part = $pr->find('.card-desc')->text();
                $url = trim($pr->find('.linkToProductsView')->attr('href'));
                $tmp[$key] = [
                    "url" => $url,
                    "text" => trim($pr->find('.card-descRus')->text()),
                    "price" => trim($pr->find('.pricePerItemCart')->text()),
                    "part" => trim(substr(stristr($part, ",", true), 8, strlen($part) )),
                    "brand" => trim(substr(stristr($part, ","), 1, strlen($part) ))
                ];
            }
        }
        return $tmp;
    }

    public function secondParse($page, $id)
    {
        \phpQuery::newDocument($page);
        $prod = pq(".anTabTr");
        $imgUrl = pq('.imgProductView')->attr('src');
        $this->save->saveImg('https://shop.lonmadi.ru'.$imgUrl, $id);
        $tmp = [];
        foreach ($prod as $key=>$pr)
        {
            $pr = pq($pr);
            $part = $pr->find('.card-descView')->text();
            $url = trim($pr->find('.linkToProductsView')->attr('href'));
            $tmp[$key] = [
                "url" => $url,
                "text" => trim($pr->find('.linkToProductsView')->text()),
                "price" => trim($pr->find('.pricePerItemCart')->text()),
                "part" => trim(substr(stristr($part, ",", true), 21, strlen($part) ))
            ];

        }
        return $tmp;
    }
}