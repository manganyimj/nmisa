<?php

class LivingCondition 
{
    var $ownershipType;
    var $houseType;
    var $insideRoom;
    var $outsideRoom;
    var $service;
    
    function __construct($ownershipType, $houseType, $insideRoom, $outsideRoom, $service) {
        $this->ownershipType = $ownershipType;
        $this->houseType = $houseType;
        $this->insideRoom = $insideRoom;
        $this->outsideRoom = $outsideRoom;
        $this->service = $service;
    }
    
    function getOwnershipType() {
        return $this->ownershipType;
    }

    function getHouseType() {
        return $this->houseType;
    }

    function getInsideRoom() {
        return $this->insideRoom;
    }

    function getOutsideRoom() {
        return $this->outsideRoom;
    }

    function getService() {
        return $this->service;
    }

    function setOwnershipType($ownershipType) {
        $this->ownershipType = $ownershipType;
    }

    function setHouseType($houseType) {
        $this->houseType = $houseType;
    }

    function setInsideRoom($insideRoom) {
        $this->insideRoom = $insideRoom;
    }

    function setOutsideRoom($outsideRoom) {
        $this->outsideRoom = $outsideRoom;
    }

    function setService($service) {
        $this->service = $service;
    }



}
