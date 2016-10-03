<?php


class HouseholdMember {
   var $id;
   var $IndigentType;
   var $surname;
   var $initials;
   var $DOB;
   var $applicationStatus;
   var $employeer;
   var $education;
   var $disability;
   var $disabilityDescription;
   
   function __construct($id, $IndigentType, $surname, $initials, $DOB, $applicationStatus, $employeer, $education, $disability, $disabilityDescription) {
       $this->id = $id;
       $this->IndigentType = $IndigentType;
       $this->surname = $surname;
       $this->initials = $initials;
       $this->DOB = $DOB;
       $this->applicationStatus = $applicationStatus;
       $this->employeer = $employeer;
       $this->education = $education;
       $this->disability = $disability;
       $this->disabilityDescription = $disabilityDescription;
   }
   
   function getId() {
       return $this->id;
   }

   function getIndigentType() {
       return $this->IndigentType;
   }

   function getSurname() {
       return $this->surname;
   }

   function getInitials() {
       return $this->initials;
   }

   function getDOB() {
       return $this->DOB;
   }

   function getApplicationStatus() {
       return $this->applicationStatus;
   }

   function getEmployeer() {
       return $this->employeer;
   }

   function getEducation() {
       return $this->education;
   }

  
   function getDisability() {
       return $this->disability;
   }

   function getDisabilityDescription() {
       return $this->disabilityDescription;
   }

   function setId($id) {
       $this->id = $id;
   }

   function setIndigentType($IndigentType) {
       $this->IndigentType = $IndigentType;
   }

   function setSurname($surname) {
       $this->surname = $surname;
   }

   function setInitials($initials) {
       $this->initials = $initials;
   }

   function setDOB($DOB) {
       $this->DOB = $DOB;
   }

   function setApplicationStatus($applicationStatus) {
       $this->applicationStatus = $applicationStatus;
   }

   function setEmployeer($employeer) {
       $this->employeer = $employeer;
   }

   function setEducation($education) {
       $this->education = $education;
   }

  

   function setDisability($disability) {
       $this->disability = $disability;
   }

   function setDisabilityDescription($disabilityDescription) {
       $this->disabilityDescription = $disabilityDescription;
   }



   
   
}
