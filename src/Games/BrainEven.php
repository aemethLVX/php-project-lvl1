<?php

namespace BrainGames\Games\BrainEven;

use function BrainGames\Cli\execute;

function run()
{
    $mes = 'Answer "yes" if the number is even, otherwise answer "no".';

    $try = function ($conf) {
        $question = rand($conf['from'], $conf['to']);
        $answer = isEven($question) ? 'yes' : 'no';
        return [
            'question' => $question,
            'answer' => $answer
        ];
    };

    execute($message, $mes);
}

function isEven(int $num)
{
    if ($num % 2 === 0) {
        return true;
    } else {
        return false;
    }
}
