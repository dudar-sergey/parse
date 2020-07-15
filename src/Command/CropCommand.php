<?php

namespace App\Command;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\False_;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CropCommand extends Command
{
    protected static $defaultName = 'crop';
    private $em;
    private $savePath;
    public function __construct(EntityManagerInterface $em, string $savePath)
    {
        $this->em = $em;
        $this->savePath = $savePath;
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
        $products = $this->em->getRepository(Product::class)->findBy(['handled'=>1]);
        foreach ($products as $prod)
        {
            $urlImportImg = $prod->getImg();
            $img = imagecreatefromjpeg($this->savePath.$urlImportImg);
            var_dump($this->savePath.$urlImportImg);
            $img2 = imagecrop($img, ['x'=>0,'y'=>50, 'width'=>440,'height'=>330]);
            if($img2 != FALSE)
            {
                imagejpeg($img2, $this->savePath.str_ireplace('img', 'newImg', $urlImportImg));
                imagedestroy($img2);
            }
            imagedestroy($img);
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return 0;
    }
}
