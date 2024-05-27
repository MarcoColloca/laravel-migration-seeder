<?php

function generatore()
{
    for ($i = 0; $i < 100; $i++) {
        yield $i;
    }
}

function filtraPari($gen)
{
    $fh = fopen('test.txt', 'w');
    foreach ($gen as $val) {
        if ($val % 2 === 0) {
            yield $val;
        } else {
            fwrite($fh, $val . "\n");
        }
    }
    fclose($fh);
}

function filtraMaggioridiN($num)
{
    return function ($gen) use ($num) {
        foreach ($gen as $val) {
            if ($val > $num) {
                yield $val;
            }
        }
    };
}

// Main

foreach (filtraPari(filtraMaggioridiN(50)(generatore())) as $val) {
    var_dump($val);
}
