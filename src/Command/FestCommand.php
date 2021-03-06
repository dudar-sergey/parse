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

class FestCommand extends Command
{
    protected static $defaultName = 'fest';
    private $page;
    private $parse;
    private $em;
    public function __construct(Parse $parse, Page $page, EntityManagerInterface $em)
    {
        $this->parse = $parse;
        $this->page = $page;
        $this->em = $em;
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
        $products = $this->em->getRepository(FestProduct::class)->findBy(['handled'=>null]);
        foreach ($products as $product)
        {
            $gettingPage = $this->page->getPage(['url' => $product->getUrl()]);
            $this->parse->festArt($gettingPage, $product->getId(), $product->getBrand());
            $product->setHandled(1);
            $this->em->persist($product);
            $this->em->flush();
            var_dump('hello');
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return 0;
    }
}
