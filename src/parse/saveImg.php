<?php


namespace App\parse;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpClient\HttpClient;


class saveImg
{
    private $savePath;
    private $em;
    public function __construct(string $savePath, EntityManagerInterface $em)
    {
        $this->savePath = $savePath;
        $this->em = $em;

    }

    public function saveImg($urlImg, $id)
    {
        $client = HttpClient::create([
            'http_version'=>'2.0',
            'proxy'=>'http://smile80:U5w8BuB@188.165.156.203:65233',
        ]);
        $newUrl = substr($urlImg, 40, strlen($urlImg));
        $response = $client->request('GET', $urlImg, [

        ]);
        $product = $this->em->getRepository(Product::class)->find($id);
        $product->setImg($this->savePath.$newUrl);
        $this->em->persist($product);
        $this->em->flush();
        $fp = fopen($this->savePath.$newUrl, 'w');
        fwrite($fp,$response->getContent());
        fclose($fp);
    }
}