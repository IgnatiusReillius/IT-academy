<?php
require('classes/class_table.php');
require('classes/class_bar.php');

$table2 = new Table(2);
$table4 = new Table(4);
$table10 = new Table(10);

$barAlegria = new Bar("Alegría");
$barAlegria->addTables($table2, $table10, $table4, $table2);
//$barAlegria->showBarState();

$barIrlandes = new Bar("Irlandés");
$barIrlandes->addTables($table4, $table2, $table4);
//$barIrlandes->showBarState();

$bares[] = $barAlegria;
$bares[] = $barIrlandes;

do {
    echo "¿Qué quieres hacer?" . PHP_EOL;
    echo "[0] - Salir del sistema" . PHP_EOL;
    echo "[1] - Hacer una reserva" . PHP_EOL;
    echo "[2] - Ir a un bar" . PHP_EOL;

    $actionChoice = intval(readline());

    switch ($actionChoice) {
        case 0:
            break;
        case 1:
            echo "¿En qué bar quieres reservar?" . PHP_EOL;
            echo "[0] - Salir del sistema" . PHP_EOL;
            foreach ($bares as $index => $bar) {
                echo "[" . ($index + 1) . "] - " . $bar->getName() . PHP_EOL;
            }

            $pubChoice = intval(readline());

            if ($pubChoice != 0) {
                $bares[$pubChoice - 1]->reserveProcess();
            }
            break;
        case 2:
            echo "¿A qué bar quieres ir?" . PHP_EOL;
            echo "[0] - Salir del sistema" . PHP_EOL;
            foreach ($bares as $index => $bar) {
                echo "[" . ($index + 1) . "] - " . $bar->getName() . PHP_EOL;
            }

            $pubChoice = intval(readline());

            if ($pubChoice != 0) {
                $bares[$pubChoice - 1]->goToBar();
            }
            break;
        default:
            $actionChoice = readline("Por favor, escoja una de las opciones anteriores.");
    }
} while ($actionChoice > 0);
