<?php

class Contact 
{
    var $cellNo;
    var $homeTellNo;
    var $workTellNo;
    var $email;
    
    function __construct($cellNo, $homeTellNo, $workTellNo, $email) {
        $this->cellNo = $cellNo;
        $this->homeTellNo = $homeTellNo;
        $this->workTellNo = $workTellNo;
        $this->email = $email;
    }
    
    function getCellNo() {
        return $this->cellNo;
    }

    function getHomeTellNo() {
        return $this->homeTellNo;
    }

    function getWorkTellNo() {
        return $this->workTellNo;
    }

    function getEmail() {
        return $this->email;
    }

    function setCellNo($cellNo) {
        $this->cellNo = $cellNo;
    }

    function setHomeTellNo($homeTellNo) {
        $this->homeTellNo = $homeTellNo;
    }

    function setWorkTellNo($workTellNo) {
        $this->workTellNo = $workTellNo;
    }

    function setEmail($email) {
        $this->email = $email;
    }



}
