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

function gcd($a, $b)
{
    while ($a != $b) {
        if ($a > $b) {
            $a -= $b;
        } else {
            $b -= $a;
        }
    }
    return $a;
}

function getProgression($start, $length, $step)
{
    $result = [];
    for ($i = 0, $a = $start; $i < $length; ++$i, $a += $step) {
        $result[] = $a;
    }
    return $result;
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

function getOperations()
{
    return ['+', '-', '*'];
}
