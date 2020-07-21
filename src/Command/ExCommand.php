<?php

namespace App\Command;

use App\Entity\NameExGr;
use App\getPage\Page;
use App\parse\Parse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ExCommand extends Command
{
    protected static $defaultName = 'ex';
    private $parse;
    private $page;
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
        $mainUrl = 'https://msk.explorer-russia.ru';
        $prod = $this->em->getRepository(NameExGr::class)->findBy(['handled'=>null]);
        foreach ($prod as $pr)
        {
            $gettingPage = $this->page->getPage(['url' => $mainUrl.$pr->getUrl()]);
            $countPage = $this->parse->pageParse($gettingPage);
            for($i=0;$i<$countPage;$i++)
            {
                $getPage = $this->page->getPage(['url'=>$mainUrl.$pr->getUrl().'?next='.$i*48]);
                $this->parse->parseExPr($getPage, $pr->getGr(), $pr->getSubGr());
            }
            $pr->setHandled(true);
            $this->em->persist($pr);
            $this->em->flush();
        }

        $io->success('Okay');

        return 0;
    }
}
