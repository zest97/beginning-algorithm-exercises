<?php

namespace Base\commands;

use Base\iteration\Core\ArrayIterable;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReverseIterationCommand extends Command
{
    protected static $defaultName = "iterator:reverse";

    protected function configure()
    {
        $this->setDescription('Demonstrate iterator sample.')
            ->setHelp('This command will guide you to understand iterator');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $data = [1, 2, 3, 4, 5];
        $iterator = (new ArrayIterable($data))->iterator();
        try {
            $iterator->last();
            while(!$iterator->isDone()) {
                $output->writeln($iterator->current());
                $iterator->previous();
            }
            return Command::SUCCESS;
        } catch (\Exception $exception) {
            $output->writeln($exception->getMessage());
            return Command::FAILURE;
        }
    }
}
