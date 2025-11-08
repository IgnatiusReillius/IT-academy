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
        echo "¿En qué bar quieres reservar?" . PHP_EOL;
        echo "[0] - Salir del sistema" . PHP_EOL;
        foreach($bares as $index => $bar){
            echo "[" . ($index + 1) . "] - " . $bar->getName() . PHP_EOL;
        }

        $choice = intval(readline());
        
        if($choice != 0) {
            $bares[$choice - 1]->reserveProcess();
        }
    }
    while($choice > 0);
?>

