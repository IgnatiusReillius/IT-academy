<?php
    require_once "ObjectToWork.php";
    
    class HouseKeys implements ObjectToWork {
        public function useObject() {
            echo "Has cogido las llaves de casa.\n";
        }
    }
?>