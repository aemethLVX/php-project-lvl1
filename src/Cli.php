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

function gcd(int $a, int $b)
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

function getProgression(int $start, int $length, int $step)
{
    $result = [];
    for ($i = 0, $a = $start; $i < $length; ++$i, $a += $step) {
        $result[] = $a;
    }
    return $result;
}

function isPrime(int $num)
{
    for ($x = 2; $x <= sqrt($num); ++$x) {
        if ($num % $x == 0) {
            return 'no';
        }
    }
    return 'yes';
}

function welcome(string $rules)
{
    line('Welcome to the Brain Games!');
    line($rules);
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');
    return $name;
}

function getAnswer(string $question)
{
    line("Question: {$question}");
    return prompt('Your answer');
}

function checkAnswer(string $answer, string $result)
{
    if ($answer == $result) {
        line('Correct!');
        return true;
    } else {
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$result}'.");
        return false;
    }
}

function showResult(bool $error, string $name)
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
