<?php

namespace App\Command;

use App\Entity\TradProd;
use App\getPage\Page;
use App\parse\Parse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class TradCommand extends Command
{
    protected static $defaultName = 'trad';
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
        $offset = $input->getArgument('arg1');
        $step = 200;
        $count = $step;
        //while($count == $step)
        //{
            $prods = $this->em->getRepository(TradProd::class)->findBy(['handled'=>null], [], $step, $offset);
            foreach ($prods as $prod)
            {
                $gettingPage = $this->page->getPage(['url'=>'https://www.tradicia-k.ru'.$prod->getUrl()]);
                $this->parse->trad($gettingPage, $prod->getId());
                $prod->setHandled(1);
                $this->em->persist(($prod));
                $this->em->flush();
                var_dump(rand(0,1));
            }
        //}



        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return 0;
    }
}
