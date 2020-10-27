<?php

namespace Base\commands;

use Base\iteration\Core\ArrayIterator;
use Base\iteration\Core\FilterIterator;
use Base\iteration\Exceptions\IterateOutOfBoundException;
use Base\iteration\Predicates\PrimeNumberPredicate;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PredicateIterationCommand extends Command
{
    protected static $defaultName = "iterator:predicate";

    protected function configure()
    {
        $this->setDescription('Demonstrate iterator sample.')
            ->setHelp('This command will guide you to understand iterator');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $data = [1, 2, 3, 4, 5];
        $output->writeln("Imagine we have sample array, [" . implode(', ', $data) . "]");
        $iterator = (new FilterIterator(new ArrayIterator($data), new PrimeNumberPredicate(true, new ArrayIterator($data))));
        try {
            $iterator->last();
            var_dump($iterator->current());
            $iterator->first();
            var_dump($iterator->current());
        } catch (IterateOutOfBoundException $exception) {
            return Command::FAILURE;
        }
        return Command::SUCCESS;
    }
}
