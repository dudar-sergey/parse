<?php

namespace App\Command;

use App\Entity\Product;
use App\parse\csvEnc;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Entity\JcbGr;
use App\Entity\JcbPr;
use App\getPage\Page;
use App\parse\Parse;
use App\Entity\JcbAnalog;

class JcbCommand extends Command

{
    protected static $defaultName = 'jcb';
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
        $step = 10;
        $count = $step;
        while($count == $step)
        {
            $products = $this->em->getRepository(JcbPr::class)->findBy(['handled' => null],[],$step);
            /*  foreach ($products as $prod)
              {
                  $newUrl = $prod->getUrl().'?page=all&sort=position&sort_type=asc&mode=list';
                  $gettingPage = $this->page->getPage(['url'=>$newUrl]);
                  $this->parse->jcbParse($gettingPage, $prod->getGr());
              }*/
            $count = count($products);
            foreach ($products as $prod)
            {
                $gettingPage = $this->page->getPage(['url' => $prod->getUrl()]);
                $tmp = $this->parse->jcbArt($gettingPage);
                $prod->setPart($tmp[0]);
                var_dump($tmp[0]);
                if(count($tmp) > 1)
                {
                    foreach($tmp as $t)
                    {
                        if($t != $tmp[0])
                        {
                            $an = new JcbAnalog();
                            $an->setAnalArt($t);
                            $an->setAnalBr($prod->getBrand());
                            $an->setProdArt($tmp[0]);
                            $an->setProdBr($prod->getBrand());
                            $this->em->persist($an);
                        }
                    }
                }

                $prod->setHandled(true);
                $this->em->persist($prod);
            }
            $this->em->flush();
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return 0;
    }
}
