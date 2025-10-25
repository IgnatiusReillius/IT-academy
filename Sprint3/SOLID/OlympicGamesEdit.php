<?php
    class Athlete {
        public string $name, $country;
        public function __construct($name, $country) {
            $this->name = $name;
            $this->country = $country;
        }
    }

    class Event {
        public string $event, $date;
        public function __construct($event, $date) {
            $this->event = $event;
            $this->date = $date;
        }
    }

    class Result {
        public string $athlete, $event, $medal;
        public function __construct($athlete, $event, $medal) {
            $this->athlete = $athlete;
            $this->event = $event;
            $this->medal = $medal;
        }
    }

    class OlympicGamesData {
        public array $athletes = [], $events = [], $results = [];

        public function addAthletesData(array $array) {
            $this->athletes = $array;
        }
        public function addEventsData(array $array) {
            $this->events = $array;
        }
        public function addResultsData(array $array) {
            $this->results = $array;
        }

        public function getAthletes() : array {
            return $this->athletes;
        }
        public function getEvents() : array {
            return $this->events;
        }
        public function getResults() : array {
            return $this->results;
        }
    }

    class PrintOlympicData {
        public function PrintData(object $olympics) {

            echo "Olympic Games Results:\n";
            
            foreach ($olympics->getEvents() as $event){
                echo "Event: " . $event["event"] . " on " . $event["date"] . "\n";
                foreach ($olympics->getResults() as $result) {
                    foreach ($olympics->getAthletes() as $athlete){
                        if ($result["event"] === $event["event"] && $result["athlete"] === $athlete["name"]) {
                            echo "- " . $result["athlete"] . " from " . $athlete["country"] . " won " . $result["medal"] . "\n";
                        }   
                    }
                }
            }
        }
    }

    $athletesData = [
        ["name" => "Usain Bolt", "country" => "Jamaica"],
        ["name" => "Michael Phelps", "country" => "USA"]
    ];

    $eventsData = [
        ["event" => "100m Sprint", "date" => "2024-08-01"],
        ["event" => "Swimming", "date" => "2024-08-02"]
    ];

    $resultsData = [
        ["athlete" => "Usain Bolt", "event" => "100m Sprint", "medal" => "Gold"],
        ["athlete" => "Michael Phelps", "event" => "Swimming", "medal" => "Gold"]
    ];

    $olympics = new OlympicGamesData();

    $olympics->addAthletesData($athletesData);
    $olympics->addEventsData($eventsData);
    $olympics->addResultsData($resultsData);

    $printOlympics = new PrintOlympicData();
    $printOlympics->PrintData($olympics);
?>