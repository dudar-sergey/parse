<?php

namespace App\Command;

use App\Entity\Analogs;
use App\Entity\Product;
use App\getPage\Page;
use App\parse\Parse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class NemoCommand extends Command
{
    protected static $defaultName = 'Nemo';
    private $page;
    private $parse;
    private $em;
    public function __construct(Parse $parse, Page $page, EntityManagerInterface $em)
    {
        $this->parse = $parse;
        $this->page = $page;
        $this->em = $em;
        $em->createQueryBuilder()->delete()->from(Analogs::class, 'u')->getQuery()->execute();

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
        $products = $this->em->getRepository(Product::class)->findAll();
        $result = [];
        foreach ($products as $prod)
        {
            $gettingPage = $this->page->getPage(['url' => 'https://shop.lonmadi.ru'.$prod->getUrl()]);
            $item = $this->parse->secondParse($gettingPage, $prod->getId());

                foreach ($item as $pr)
                {
                    if($prod->getPart() != $pr['part'])
                    {
                    $product = new Analogs();
                    $product->setArtDet($prod->getPart());
                    $product->setAnalog($pr['part']);
                    $this->em->persist($product);
                    }
                }
        }
        $this->em->flush();

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return 0;
    }
}
