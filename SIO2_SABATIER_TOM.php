<?php

$tab = array(
    array(0,0,0,0,0,1),
    array(0,1,0,1,1,0),
    array(0,1,0,0,0,0),
    array(0,1,0,0,1,0),
    array(1,0,1,0,0,0),
    array(1,1,0,0,0,1)
);

function ajouteBordure($tab)
{
    for ($i = 0; $i <= 7; $i++) {
        for ($j = 0; $j <= 7; $j++) {
            $tab[$i-1][$j-1] = 0;
            $tab[$i+1][$j+1] = 0;
        }
    }
    return $tab;
}

function premiereCoupe($tab)
{
    ajouteBordure($tab);
    for ($i = 0; $i <= 7; $i++) {
        for ($j = 0; $j <= 7; $j++) {
            if ($tab[$i][$j] == 1) {
                if ($tab[$i + 1][$j] == 1) {
                    $tab[$i + 1][$j] = 2;
                }
                elseif ($tab[$i][$j - 1] == 1) {
                    $tab[$i][$j - 1] = 2;
                }
                elseif ($tab[$i][$j + 1] == 1) {
                    $tab[$i][$j + 1] = 2;
                }
            }
        }
    }
}

