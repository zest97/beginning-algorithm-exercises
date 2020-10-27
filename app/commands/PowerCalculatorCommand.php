<?php

namespace Base\commands;

use Base\recursions\examples\PowerCalculator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class PowerCalculatorCommand extends Command
{
    protected static $defaultName = "recursion:power-calc";

    protected function configure()
    {
        $this->setDescription('Demonstrate recursion sample.')
            ->setHelp('This command will guide you to understand recursion');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $calculator = new PowerCalculator();
        $questionHelper = $this->getHelper('question');
        $base = $this->askBaseNumber($questionHelper, $input, $output);
        $output->writeln("Base is " . $base);
        $this->pauseFor(5000, $output);
        $exponent = $this->askExponentNumber($questionHelper, $input, $output);
        $output->writeln("Exponent is " . $exponent);
        $this->pauseFor(5000, $output);
        $result = $calculator->calculate($base, $exponent);
        $output->writeln("Result is " . $result);
        return Command::SUCCESS;
    }

    protected function askBaseNumber($questionHelper, $input, $output)
    {
        do {
            $question = new Question("Please provide base number: ", 0);
            $base = $questionHelper->ask($input, $output, $question);
        } while (!is_numeric($base));
        return $base;
    }

    protected function askExponentNumber($questionHelper, $input, $output)
    {
        do {
            $question = new Question("Please provide base number: ", 0);
            $exponent = $questionHelper->ask($input, $output, $question);
        } while (!is_numeric($exponent));
        return $exponent;
    }

    protected function pauseFor($seconds, OutputInterface $output) {
        $output->writeln("...");
        for ($i = 0; $i < $seconds; $i++) {}
    }
}
