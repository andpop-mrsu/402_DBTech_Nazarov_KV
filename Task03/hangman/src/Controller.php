<?php

namespace Hazzardgg\hangman\Controller;

use Hazzardgg\hangman\View\View;
use Hazzardgg\hangman\Model\Model;
use function cli\prompt;

class Controller
{
    static function startGame()
    {
        $hidden_word = Model::genWord();
        $temp_word = "_ _ _ _ _ _";
        View::drawWord($temp_word);
        View::drawHangman(0);
        // $end = false;
        // while (!$win)
        // {
        //     $letter = prompt("Введите букву: ");

        // }
    }
}
