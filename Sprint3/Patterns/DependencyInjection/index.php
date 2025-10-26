<?php
    require_once "WorkingPerson.php";
    require_once "Wallet.php";
    require_once "Smartphone.php";
    require_once "HouseKeys.php";
    require_once "SubwayTicket.php";

    $myWallet = new Wallet();
    $mySmartphone = new Smartphone();
    $myHouseKeys = new HouseKeys();
    $mySubwayTicket = new SubwayTicket();

    $workingPerson = new WorkingPerson($myWallet, $mySmartphone, $myHouseKeys, $mySubwayTicket);

    $workingPerson->goToWork();
?>