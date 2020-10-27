#!/usr/bin/php
<?php

require __DIR__ . '/vendor/autoload.php';

use Base\commands\IterationCommand;
use Base\commands\PowerCalculatorCommand;
use Base\commands\PredicateIterationCommand;
use Base\commands\ReverseIterationCommand;
use Base\commands\RecursiveWalkDirCommand;
use Symfony\Component\Console\Application;

$application = new Application();

// ... register commands
$application->add(new IterationCommand());
$application->add(new ReverseIterationCommand());
$application->add(new PredicateIterationCommand());
$application->add(new PowerCalculatorCommand());
$application->add(new RecursiveWalkDirCommand());

$application->run();
