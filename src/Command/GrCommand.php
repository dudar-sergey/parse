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
use App\Entity\Group;

class GrCommand extends Command
{
    protected static $defaultName = 'gr';
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
        $grs = $this->em->getRepository(Group::class)->findBy(['handled'=>null]);
        foreach ($grs as $gr)
        {
            $tmp = $this->page->getPage(['url'=>'https://shop.lonmadi.ru'.$gr->getUrl()]);
            $lastPage = $this->parse->pageParse($tmp);
            for($i=1;$i<$lastPage;$i++)
            {
                $Url = str_ireplace('.html', '/'.$i.'.html',$gr->getUrl());
                $gettingPage = $this->page->getPage(['url' => 'https://shop.lonmadi.ru'.$Url]);
                $item[] = $this->parse->parseGr($gettingPage, $gr->getMainGr(), $gr->getSubGr());
                var_dump('Ok');
            }
            $gr->setHandled(true);
        }
        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return 0;
    }
}
