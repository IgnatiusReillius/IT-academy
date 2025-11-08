<?php
    class Bar {
        private array $tables = [];
        private string $name;
        private const ITS_FULL = "Lo siento, estamos completos." . PHP_EOL;
        private const ASK_PEOPLE = "¿Quiere realizar una reserva? Dígame para cuántas personas." . PHP_EOL;
        private const NO_TABLES = "Lo siento, no tenemos mesa para vosotros." . PHP_EOL;
        private const ASK_NAME = "¿A qué nombre?" . PHP_EOL;
        private const ASK_NUMBER = "¿Y número de teléfono?" . PHP_EOL;
        private const ITS_OK = "Ok, pues ya tienes mesa, ";

        public function __construct(string $name) {
            $this->name = $name;
        }

        public function getName() : string {
            return $this->name;
        }

        public function addTables(Table ...$tables) :void {
            foreach($tables as $index => $table){
                $this->tables[$index] = clone $table;
            }
        }
        
        public function getTables() : array {
            return $this->tables;
        }

        public function reserveProcess() {
            echo "Bar " . $this->getName() . "." . PHP_EOL;

            if(!$this->checkFreeTables()) {
                echo self::ITS_FULL;
                return;
            }

            $numPeople = $this->askForPeopleNumber();
            $tableIndex = $this->asignTableTo($numPeople);

            if($tableIndex < 0) {
                echo self::NO_TABLES;
                return;
            }

            $reserveName = $this->askForReserveName();
            $phoneNumber = $this->askForPhoneNumber();
            $this->tables[$tableIndex]->makeReserved($reserveName, $phoneNumber);
            
            echo self::ITS_OK . $reserveName . PHP_EOL;
            print_r($this->tables);
        }

        private function askForPeopleNumber() : int {
            do {
                $numPeople = strval(readline(self::ASK_PEOPLE));
            } while ($numPeople < 1);
            return $numPeople;
        }

        private function askForReserveName() : string {
            do {
                $reserveName = readline(self::ASK_NAME);
            } while ($reserveName === '');
            return $reserveName;
        }

        private function askForPhoneNumber() : string {
            $phoneNumber = readline(self::ASK_NUMBER);
            do {
                if(strlen($phoneNumber) != 9 || !ctype_digit($phoneNumber)) {
                    $phoneNumber = readline("Lo siento, deme un número de teléfono de 9 cifras.");
                }
            } while (strlen($phoneNumber) != 9 || !ctype_digit($phoneNumber));
            return $phoneNumber;
        }

        private function checkFreeTables() : bool {
            foreach($this->tables as $table) {
                if(!$table->isReserved()){
                    return true;
                }
            }
            return false;
        }
        
        private function asignTableTo(int $numPeople) : int {
            foreach($this->tables as $index => $table) {
                if($table->isReserved()){
                    continue;
                }
                if($table->checkTableSize($numPeople)) {
                    return $index;
                }
            }
            return -1;
        }

        
        public function showBarState() : void {
            echo "El bar " . $this->getName() . " tiene las siguientes mesas: ";
            $this->listTables() . PHP_EOL;
        }
        
        private function listTables() : void {
            echo PHP_EOL;
            foreach($this->tables as $index => $table){
                echo "-Mesa #" . ($index + 1) . ": " . $table->getChairsNumber() . " sillas, " . $table->showTableState() . PHP_EOL;
            }
        }
    }
?>