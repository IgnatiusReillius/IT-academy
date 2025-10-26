<?php
    require_once "ObjectToWork.php";
    
    class Smartphone implements ObjectToWork {
        public function useObject() {
            echo "Has cogido el móvil.\n";
        }
    }
?>