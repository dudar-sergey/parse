<?php

namespace App\Command;

use App\Entity\TradGr;
use App\getPage\Page;
use App\parse\Parse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class TradgrCommand extends Command
{
    protected static $defaultName = 'tradgr';
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
        $prod = $this->em->getRepository(TradGr::class)->find(107);
        $gettingPage = $this->page->getPage(['url'=>'https://www.tradicia-k.ru'.$prod->getUrl()]);
        $pages = ceil($this->parse->pageTrad($gettingPage)/12);
        var_dump($pages);
        for($i=1;$i<=$pages;$i++)
        {
            $page = $this->page->getPage(['url'=>'https://www.tradicia-k.ru'.$prod->getUrl()]);
            $this->parse->tradProd($page);
            var_dump($i);
        }


        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return 0;
    }
}
