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

function getOperations()
{
    return ['+', '-', '*'];
}

function calc(int $first, int $second, int $type)
{
    $operations = getOperations();
    switch ($operations[$type]) {
        case '+':
            return $first + $second;
        case '-':
            return $first - $second;
        case '*':
            return $first * $second;
    }
}

function welcome($rules)
{
    line('Welcome to the Brain Games!');
    line($rules);
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');
    return $name;
}

function getAnswer($question)
{
    line("Question: {$question}");
    return prompt('Your answer');
}

function checkAnswer($answer, $result)
{
    if ($answer == $result) {
        line('Correct!');
        return true;
    } else {
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$result}'.");
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
