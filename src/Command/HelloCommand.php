<?php

namespace App\Command;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\getPage\Page;
use App\parse\Parse;
use App\Entity\Product;

class HelloCommand extends Command
{
    protected static $defaultName = 'Hello';
    private $page;
    private $parse;
    private $em;
    public function __construct(Parse $parse, Page $page, EntityManagerInterface $em)
    {
        $this->parse = $parse;
        $this->page = $page;
        $this->em = $em;

        $em->createQueryBuilder()->delete()->from(Product::class, 'u')->getQuery()->execute();
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
        $arg1 = $input->getArgument('arg1');
        if(!$arg1)
        {
            $arg1 = 1;
        }
        $Result = [];
        for ($i=0;$i<1;$i++)
        {
            $gettingPage = $this->page->getPage(array('url'=>'https://shop.lonmadi.ru/product/search.html?ProductsSearch%5Bsearchstring%5D=&page='.$i));
            $Result[] = $this->parse->Parse($gettingPage);
        }
        foreach ($Result as $item)
        {
            foreach ($item as $pr)
            {
                $product = new Product();
                $product->setText($pr['text']);
                $product->setPrice($pr['price']);
                $product->setPart($pr['part']);
                $product->setUrl($pr['url']);
                $product->setBrand($pr['brand']);
                $this->em->persist($product);

            }

        }
        $this->em->flush();
        $io->success('Выполнено вроде без косяков');

        return 0;
    }
}
