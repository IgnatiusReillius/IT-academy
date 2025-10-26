<?php
    require_once "ObjectToWork.php";

    class Wallet implements ObjectToWork {
        public function useObject() {
            echo "Has cogido la cartera.\n";
        }
    }
?>