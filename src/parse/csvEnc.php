<?php


namespace App\parse;
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
        $products = $this->em->createQueryBuilder()->select('u')->from(Product::class, 'u')->getQuery()->execute();
        $handle = fopen('/var/www/html/Parse/storage/output.csv', 'r+');
        $tmp =[];
        foreach ($products as $prod)
        {
            $tmp[] = $prod->getId();
            $tmp[] = $prod->getText();
            $tmp[] = $prod->getPrice();
            $tmp[] = $prod->getPart();
            $tmp[] = $prod->getBrand();
            fputcsv($handle, $tmp);
            unset($tmp);
        }
        fclose($handle);
    }
}