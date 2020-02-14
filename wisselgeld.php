<?php

function roundChange($argv)
{
    $change = (float) round($argv[1], 2);
    $change = (round($change / 0.5)) * 0.5;

    define(
        "GELDEUROS",
        [
    "50" => " euro",
    "20" => " euro",
    "10" => " euro",
    "5" => " euro",
    "2" => " euro",
    "1" => " euro",
    "0.50" => " euro cent",
    "0.20" => " euro cent",
    "0.10" => " euro cent",
    "0.05" => " euro cent",
]
    );
    $argv[1] = (int) $argv[1];
    
    try {
        if ($argv[1] != is_numeric($argv[1])) {
            throw new Exception("Je hebt geen geldig bedrag meegegeven");
        }
    } catch (Exception $d) {
        echo "Error: " . $d->getMessage() . PHP_EOL;
        exit;
    }
    
    try {
        if (empty($argv[1])) {
            throw new Exception("Je hebt geen bedrag meegegeven dat omgewisseld dient te worden");
        }
    } catch (Exception $d) {
        echo "Error: " . $d->getMessage() . PHP_EOL;
        exit;
    }
    
    try {
        if ($argv[1] < 0) {
            throw new Exception("Ik kan geen negatief bedrag wisselen");
        }
    } catch (Exception $d) {
        echo "Error: " . $d->getMessage() . PHP_EOL;
        exit;
    }
    


    foreach (GELDEUROS as $geldStuk => $value) {
        $geldStuk = (float) $geldStuk;
        $change = round($change, 2);
        
        if (floor($change / $geldStuk)) {
            $aantal = floor($change / $geldStuk);
            echo "$aantal x $geldStuk $value" .PHP_EOL;
            $change = $change - ($aantal * $geldStuk);
        }
    }
}
roundChange($argv);

try {
    if ($argv[1] != is_numeric($argv[1])) {
        throw new Exception("Je hebt geen geldig bedrag meegegeven");
    }
} catch (Exception $d) {
    echo "Error: " . $d->getMessage() . PHP_EOL;
    exit;
}

try {
    if (empty($argv[1])) {
        throw new Exception("Je hebt geen bedrag meegegeven dat omgewisseld dient te worden");
    }
} catch (Exception $d) {
    echo "Error: " . $d->getMessage() . PHP_EOL;
    exit;
}

try {
    if ($argv[1] < 0) {
        throw new Exception("Ik kan geen negatief bedrag wisselen");
    }
} catch (Exception $d) {
    echo "Error: " . $d->getMessage() . PHP_EOL;
    exit;
}
