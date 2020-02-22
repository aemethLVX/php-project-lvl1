<?php

namespace BrainGames\Games\BrainEven;

function run()
{
    $message = 'Answer "yes" if the number is even, otherwise answer "no".';
    \BrainGames\Cli\run($message, __NAMESPACE__);
}

function isEven(int $num)
{
    if ($num % 2 === 0) {
        return 'yes';
    } else {
        return 'no';
    }
}

function step(array $conf)
{
    $question = rand($conf['from'], $conf['to']);
    $answer = isEven($question);
    return [
        'question' => $question,
        'answer' => $answer
    ];
}
