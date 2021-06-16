<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class SayHelloCommand extends Command
{
    protected static $defaultName = 'say_hello';

    protected function configure(): void
    {
        $this
            ->setName('say_hello')
            ->setDescription("Show message hello")
            ->addArgument('message', InputArgument::IS_ARRAY);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Привет ' . preg_replace("/\'?\'/", '', implode(' ', $input->getArgument('message'))));
        return Command::SUCCESS;
    }
}
