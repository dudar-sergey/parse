<?php

namespace App\Command;

use App\Entity\FestProduct;
use App\getPage\Page;
use App\parse\Parse;
use Doctrine\ORM\EntityManagerInterface;
use mysql_xdevapi\Result;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class RedoCommand extends Command
{
    protected static $defaultName = 'redo';
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
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

        $prods = $this->em->getRepository(FestProduct::class)->findAll();
        foreach ($prods as $prod)
        {
            $descr = $prod->getDescr();
            preg_match_all('/Размер:(.+?)мм|Вес:(.+?)кг/', $descr, $res);
            $prod->setDescNew($res[0]);
            $this->em->persist($prod);
        }
        $this->em->flush();
        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return 0;
    }
}
