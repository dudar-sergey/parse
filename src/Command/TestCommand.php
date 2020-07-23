<?php

namespace App\Command;

use App\Entity\FestProduct;
use App\getPage\Page;
use App\parse\Parse;
use App\parse\saveImg;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class TestCommand extends Command
{
    protected static $defaultName = 'test';
    private $page;
    private $parse;
    private $em;
    private $save;
    public function __construct(Parse $parse, Page $page, EntityManagerInterface $em, saveImg $save)
    {
        $this->parse = $parse;
        $this->page = $page;
        $this->em = $em;
        $this->save = $save;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $offset = $input->getArgument('arg1');
        $k = 1;
        $count = 36;
        while($count == 36)
        {
            $gettingPage = $this->page->getPage(['url'=>'https://store.tildacdn.com/api/getproductslist/?storepartuid=595297522760&recid=152075457&c=1595419063929&getparts=true&slice='.$k.'&size=36']);
            $res = json_decode($gettingPage, true);
            $count = count($res['products']);
            foreach ($res['products'] as $product)
            {
                if($product['characteristics'])
                {
                    $brand = $product['characteristics'][1]['value'];
                    $model = $product['characteristics'][2]['value'];
                    $gr = $product['characteristics'][3]['value'];
                    $subGr = $product['characteristics'][4]['value'];
                }
                $title = $product['title'];
                $art = explode(',', $product['sku']);
                $url = $product['url'];
                $imgArray = json_decode($product['gallery'], true);
                $descr = strip_tags($product['descr']);
                $fest = new FestProduct();
                $i = 0;
                $stringImg = '';
                foreach ($imgArray as $img)
                {
                    $this->save->saveImg($img['img'], $product['uid'].$i);
                    $stringImg .= $product['uid'].$i.'.jpg ';
                    $i++;
                }
                unset($i);
                var_dump($stringImg);
                $fest->setImg($stringImg);
                $fest->setSubGr($subGr);
                $fest->setGr($gr);
                $fest->setUrl($url);
                $fest->setBrand($brand);
                $fest->setArt($art[0]);
                $fest->setDescr($descr);
                $fest->setModel($model);
                $fest->setTitle($title);
                $this->em->persist($fest);
            }
            $this->em->flush();
            $k++;
        }
        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return 0;
    }
}
