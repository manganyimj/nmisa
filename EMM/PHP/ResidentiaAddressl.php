<?php

class ResidentiaAddressl 
{
   var $id;
   var $wardNo;
   var $houseNum;
   var $streetNo;
   var $suburd;
   var $city;
   var $postalCode;
   var $POB_Num;
   
   function __construct($id, $wardNo, $houseNum, $streetNo, $suburd, $city, $postalCode, $POB_Num) {
       $this->id = $id;
       $this->wardNo = $wardNo;
       $this->houseNum = $houseNum;
       $this->streetNo = $streetNo;
       $this->suburd = $suburd;
       $this->city = $city;
       $this->postalCode = $postalCode;
       $this->POB_Num = $POB_Num;
   }
   
   function getId() {
       return $this->id;
   }

   function getWardNo() {
       return $this->wardNo;
   }

   function getHouseNum() {
       return $this->houseNum;
   }

   function getStreetNo() {
       return $this->streetNo;
   }

   function getSuburd() {
       return $this->suburd;
   }

   function getCity() {
       return $this->city;
   }

   function getPostalCode() {
       return $this->postalCode;
   }

   function getPOB_Num() {
       return $this->POB_Num;
   }

   function setId($id) {
       $this->id = $id;
   }

   function setWardNo($wardNo) {
       $this->wardNo = $wardNo;
   }

   function setHouseNum($houseNum) {
       $this->houseNum = $houseNum;
   }

   function setStreetNo($streetNo) {
       $this->streetNo = $streetNo;
   }

   function setSuburd($suburd) {
       $this->suburd = $suburd;
   }

   function setCity($city) {
       $this->city = $city;
   }

   function setPostalCode($postalCode) {
       $this->postalCode = $postalCode;
   }

   function setPOB_Num($POB_Num) {
       $this->POB_Num = $POB_Num;
   }



   
}
