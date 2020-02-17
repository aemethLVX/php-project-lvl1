<?php

namespace BrainGames\Games\BrainProgression;

function run($questions, $step, $randFrom, $randTo)
{
    $error = false;
    $name = \BrainGames\Cli\welcome('What number is missing in the progression?');
    $length = 10;

    for ($i = 0; $i < $questions; ++$i) {
        $start = rand($randFrom, $randTo);
        $removedKey = rand(0, $length - 1);

        $progression = \BrainGames\Cli\getProgression($start, $length, $step);
        $result = $progression[$removedKey];
        $progression[$removedKey] = '..';
        $question = implode(' ', $progression);

        $answer = \BrainGames\Cli\getAnswer($question);

        if (!\BrainGames\Cli\checkAnswer($answer, $result)) {
            $error = true;
            break;
        }
    }

    \BrainGames\Cli\showResult($error, $name);
}
