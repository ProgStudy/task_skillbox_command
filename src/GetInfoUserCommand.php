<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;

class GetInfoUserCommand extends Command
{
    protected static $defaultName = 'app:quest';

    protected function configure(): void
    {
        $this
            ->setName('app:quest');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $template = "Здравствуйте %s, Ваш возраст: %s Ваш пол: %s";

        $helper = $this->getHelper('question');

        $question = new Question('Введите ваше имя: ');
        $question->setValidator(function ($value) {
            if (trim($value) == '') {
                throw new \Exception('Укажите ваше имя!');
            }
            return $value;
        });
    
        $name = $helper->ask($input, $output, $question);

        $question = new Question('Введите ваш возраст: ');
        $question->setValidator(function ($value) {
            if (trim($value) == '') {
                throw new \Exception('Укажите ваш возраст!');
            }

            if (!preg_match('/[0-9]/i', trim($value))) {
                throw new \Exception('Указывать можно только числа!');
            }

            return $value;
        });

        $age = $helper->ask($input, $output, $question);

        $question = new ChoiceQuestion(
            'Ваш пол (м): ',
            ['М', 'Ж'],
            0
        );

        $sex = $helper->ask($input, $output, $question);

        $output->writeln(sprintf($template, $name, $age, $sex));

        return Command::SUCCESS;
    }
}
