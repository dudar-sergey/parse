<?php


namespace App\parse;
use App\Entity\JcbAnalog;
use App\Entity\JcbPr;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;


class csvEnc
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function saveCSV()
    {
        $products = $this->em->createQueryBuilder()->select('u')->from(JcbAnalog::class, 'u')->getQuery()->execute();
        $handle = fopen('/var/www/html/Parse/storage/outputJCBAnalogs.csv', 'r+');
        $tmp =[];
        foreach ($products as $prod)
        {
            /*$tmp[] = $prod->getId();
            $tmp[] = $prod->getText();
            $tmp[] = $prod->getPrice();
            $tmp[] = $prod->getPart();
            $tmp[] = $prod->getBrand();
            $tmp[] = $prod->getGr();*/
            $tmp[] = $prod->getProdArt();
            $tmp[] = $prod->getProdBr();
            $tmp[] = $prod->getAnalArt();
            $tmp[] = $prod->getProdBr();
            fputcsv($handle, $tmp);
            unset($tmp);
        }
        fclose($handle);
    }
}