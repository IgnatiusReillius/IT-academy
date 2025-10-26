<?php

// Defineix el mètode getInstance () que no tingui arguments. Aquesta funció és responsable de crear una instància de la classe Tigger només una vegada i tornar aquesta única instància cada vegada que es crida.
// Imprimeix en pantalla múltiples vegades el rugit de Tigger.
// Afegeix un mètode getCounter () que retorni el nombre de vegades que Tigger ha realitzat rugits.

    class Tigger {
        
        private static $instance;
        private static int $roarCount = 0;

        private function __construct() {
                echo "Building character..." . PHP_EOL;
        }

        public function roar() : void{
            echo "Grrr!" . PHP_EOL;
            self::$roarCount++;
        }

        public static function getInstance() : Tigger {
            if (!self::$instance) {
                self::$instance = new self();
            }

            return self::$instance;
        }


        public static function getCounter() : void {
            echo self::$roarCount . " roars.";
        }

    }

    $tigger1 = Tigger::getInstance();
    $tigger2 = Tigger::getInstance();
    $tigger3 = Tigger::getInstance();

    $tigger1->roar();
    $tigger2->roar();
    $tigger3->roar();

    echo Tigger::getCounter();

?>