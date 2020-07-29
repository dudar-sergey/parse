<?php


namespace App\parse;
use App\Entity\Product;
use App\getPage\Page;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\This;
use Symfony\Component\HttpClient\HttpClient;


class saveImg
{
    private $savePath;
    private $em;
    private $page;
    public function __construct(string $savePath, EntityManagerInterface $em, Page $page)
    {
        $this->page = $page;
        $this->savePath = $savePath;
        $this->em = $em;

    }

    public function saveImg($url, $nameImg)
    {
        $content = $this->page->getPage(['url' => $url]);
        $fp = fopen($this->savePath.'/'.$nameImg.'.jpg', 'w');
        fwrite($fp, $content);
        fclose($fp);

    }
    public function exSaveImg($imgUrl, $nameImg)
    {
        $content = $this->page->getPage(['url'=>'https://msk.explorer-russia.ru'.$imgUrl]);
        $fp = fopen($this->savePath.'/'.$nameImg,'w');
        fwrite($fp, $content);
        fclose($fp);
    }
    public function saveTechno($url, $nameImg)
    {
        $content = $this->page->getPage(['url'=>'https://www.tradicia-k.ru'.$url]);
        $fp = fopen($this->savePath.$nameImg, 'w');
        fwrite($fp, $content);
        fclose($fp);

    }
}