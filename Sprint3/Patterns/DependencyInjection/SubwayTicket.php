<?php
    require_once "ObjectToWork.php";

    class SubwayTicket implements ObjectToWork {
        public function useObject() {
            echo "Has cogido el billete del metro.\n";
        }
    }
?>