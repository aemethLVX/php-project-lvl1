<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function isEven(int $num)
{
    if ($num % 2 === 0) {
        return 'yes';
    } else {
        return 'no';
    }
}

function welcome()
{
    line('Welcome to Brain Games!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');
    return $name;
}

function checkNumber(int $num)
{
    line("Question: {$num}");
    $answer = prompt('Your answer');

    if ($answer === isEven($num)) {
        line('Correct!');
        return true;
    } else {
        $correctAnswer = isEven($num);
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
        return false;
    }
}

function showResult($error, $name)
{
    if ($error) {
        line("Let's try again, {$name}!");
    } else {
        line("Congratulations, {$name}!");
    }
}
