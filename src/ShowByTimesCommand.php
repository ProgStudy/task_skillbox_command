<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ShowByTimesCommand extends Command
{
    protected static $defaultName = 'show-by-times';

    protected function configure(): void
    {
        $this
            ->setName('show-by-times')
            ->addArgument('message', InputArgument::IS_ARRAY, 'Сообщение')
            ->addOption('times', null,  InputOption::VALUE_REQUIRED, 'Сколько повторно вывести?', 1);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        for ($i = 0; $i < $input->getOption('times'); $i++) {
            $output->writeln(preg_replace("/\'?\'/", '', implode(' ', $input->getArgument('message'))));
            sleep(1);
        }

        return Command::SUCCESS;
    }
}
