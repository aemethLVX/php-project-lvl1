<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function run(string $message, string $game)
{
    $error = false;
    $conf = \BrainGames\Conf\get();
    $name = welcome($message);
    $step = "$game\\step";

    for ($i = 0; $i < $conf['try']; ++$i) {
        $result = $step($conf);
        $userAnswer = getAnswer($result['question']);
        if (!checkAnswer($userAnswer, $result['answer'])) {
            $error = true;
            break;
        }
    }

    showResult($error, $name);
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
