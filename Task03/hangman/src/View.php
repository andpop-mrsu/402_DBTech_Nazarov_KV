<?php

namespace Hazzardgg\hangman\View;

use function cli\line;

class View
{
    static function drawWord($word)
    {
        line($word);
    }

    static function drawHangman($errors)
    {
        line("|---");
        line("|  |");
        if ($errors >= 1)
        {
            line("|  o");
        }
        if ($errors == 2)
        {
            line("|  |");
        }
        elseif ($errors == 3)
        {
            line("| /|");
        }
        elseif ($errors >= 4)
        {
            line("| /|\\");
            if ($errors == 5)
            {
                line("| /");
            }
            elseif ($errors == 6)
            {
                line("| / \\");
            }
        }
        if ($errors == 1)
        {
            line("|\n|\n|");
        }
        elseif ($errors < 5)
        {
            line("|\n|");
        }
        else
        {
            line("|");
        }
    }
}
