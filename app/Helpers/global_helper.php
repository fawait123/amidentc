<?php


function selectedAnswer($answer)
{
    $correctAnswer = 'option_1';
    foreach ($answer as $index => $answer) {
        if ($answer->is_correct) {
            $correctAnswer = 'option_' . $index + 1;
            break;
        }
    }


    return $correctAnswer;
}
