<?php
    class WorkingPerson {
        public Wallet $wallet;
        public Smartphone $smartphone;
        public HouseKeys $houseKeys;
        public SubwayTicket $subwayTicket;

        public function __construct(ObjectToWork $wallet, ObjectToWork $smartphone, ObjectToWork $houseKeys, SubwayTicket $subwayTicket) {
            $this->wallet = $wallet;
            $this->smartphone = $smartphone;
            $this->houseKeys = $houseKeys;
            $this->subwayTicket = $subwayTicket;
        }

        public function goToWork() {
            $this->wallet->useObject();
            $this->smartphone->useObject();
            $this->houseKeys->useObject();
            $this->subwayTicket->useObject();
        }
    }
?>