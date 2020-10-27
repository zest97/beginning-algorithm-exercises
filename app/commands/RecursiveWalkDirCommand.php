<?php

namespace Base\commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RecursiveWalkDirCommand extends Command
{
    protected static $defaultName = "recursion:dir-tree-printer";

    protected function configure()
    {
        $this->setDescription('Demonstrate recursion sample.')
            ->setHelp('This command will guide you to understand recursion');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        chdir("./app/recursions/DirectoryTreePrinter/dist/");
        exec("./DirTreePrinter", $output);
        foreach($output as $file) {
            echo $file. "\n";
        };
        return Command::SUCCESS;
    }
}
