<?php

namespace App\Command;

use App\parse\csvEnc;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class JcbSaveCommand extends Command
{
    protected static $defaultName = 'jcbSave';
    private $csv;
    public function __construct(csvEnc $csv)
    {
        $this->csv = $csv;
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

        $this->csv->saveCSV();

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return 0;
    }
}
