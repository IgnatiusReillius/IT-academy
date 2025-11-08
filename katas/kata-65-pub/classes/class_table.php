<?php
    class Table{
        private int $chairs;
        private bool $isReserved;
        private string $reserveName, $phoneNumber;

        public function __construct(int $chairs) {
            $this->chairs = $chairs;
            $this->isReserved = false;
        }

        public function isReserved() : bool {
            return $this->isReserved;
        }

        public function getChairsNumber() : int {
            return $this->chairs;
        }

        public function showTableState() : string {
            if($this->isReserved) { return "reservado"; }
            else { return "disponible"; }
        }

        public function checkTableSize(int $numPeople) : bool {
            if($this->chairs >= $numPeople) { return true; }
            else { return false; }
        }

        public function makeReserved(string $reserveName, string $phoneNumber) : void {
            $this->isReserved = true;
            $this->reserveName = $reserveName;
            $this->phoneNumber = $phoneNumber;
        }
    }
?>