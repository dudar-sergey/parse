<?php


namespace App\parse;
require(__DIR__.'/../../lib/phpquery/phpQuery/phpQuery.php');

use App\Entity\Group;
use App\Entity\JcbGr;
use App\Entity\JcbPr;
use App\Entity\Product;
use App\getPage\Page;
use App\parse\saveImg;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Helper\ProgressBar;


class Parse
{
    private $save;
    private $em;
    public function __construct(saveImg $save, EntityManagerInterface $em)
    {
        $this->save = $save;
        $this->em = $em;
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
                "part" => trim(substr(stristr($part, ",", true), 21, strlen($part) )),
                "brand" => trim(substr(stristr($part, ","), 1, strlen($part) )),
            ];

        }
        return $tmp;
    }

    public function parseGr($page, $gr, $subGr)
    {
        \phpQuery::newDocument($page);
        pq('.analogsTabCartDescWrapperAnalog')->remove();
        $prod = pq('.anTabTr');
        $tmp = [];
        foreach ($prod as $key => $pr)
        {
            $pr = pq($pr);
            if(trim($pr->find('.card-descRus')->text()) != '')
            {
                $part = $pr->find('.card-desc')->text();
                $newPart = trim(substr(stristr($part, ",", true), 8, strlen($part)));
                $brand = trim(substr(stristr($part, ","), 1, strlen($part) ));
                /*$res = $this->em->getRepository(Product::class)->findOneBy(['part' => $newPart, 'brand' => $brand]);
                if($res)
                {
                    $res->setGroup($gr);
                    $res->setSubGr($subGr);
                    $this->em->persist($res);
                }*/
                $url = trim($pr->find('.linkToProductsView')->attr('href'));
                $text = trim($pr->find('.card-descRus')->text());
                $price = trim($pr->find('.pricePerItemCart')->text());
                $tov = new Product();
                $tov->setBrand($brand);
                $tov->setPrice($price);
                $tov->setText($text);
                $tov->setUrl($url);
                $tov->setPart($newPart);
                $tov->setGroup($gr);
                $tov->setSubGr($subGr);
                $this->em->persist($tov);
            }
            $this->em->flush();
        }
        return $tmp;
    }

    public function parseNameOfGr($page)
    {
        \phpQuery::newDocument($page);
        $prod = pq('.subcatLi');
        foreach($prod as $key => $pr)
        {
            $pr = pq($pr);
            $link = trim($pr->find('.leftMenuLink')->attr('href'));
            $mainGr = trim($pr->find('.leftMenuLink')->attr('data-name'));
            $subGr = trim($pr->find('.leftMenuLink')->text());
            $group = new Group();
            $group->setUrl($link);
            $group->setMainGr($mainGr);
            $group->setSubGr($subGr);
            $this->em->persist($group);

        }
        $this->em->flush();
    }
    public function pageParse($page)
    {
        \phpQuery::newDocument($page);
        $page = pq('.last')->find('.liPagerLink')->text();
        return $page;
    }
   /* public function jcbGr($page)
    {
        \phpQuery::newDocument($page);
        $prod =pq('.collapsed');
        foreach ($prod as $key=>$pr)
        {
            $pr = pq($pr);
            $group = new JcbGr();
            $group->setGr($pr->find('.menu-level0')->text());
            $group->setUrl($pr->find('.menu-level0')->attr('href'));
            $this->em->persist($group);
        }
        $this->em->flush();
    }*/

    public function jcbParse($page, $gr)
    {
        \phpQuery::newDocument($page);
        $prod = pq('.listitem');
        foreach ($prod as $key=>$pr)
        {
            $pr = pq($pr);
            $jcb = new JcbPr();
            $jcb->setUrl($pr->find('.list-name')->attr('href'));
            $jcb->setText($pr->find('.list-name')->text());
            $jcb->setGr($gr);
            $jcb->setPrice($pr->find('.list-price')->text());
            $jcb->setBrand('JCB');
            $this->em->persist($jcb);
        }
        $this->em->flush();
    }
    public function jcbArt($page)
    {
        \phpQuery::newDocument($page);
        $prod = pq('#sku')->find('span')->text();
        $prod = explode(", ", trim($prod));
        return $prod;
    }
}