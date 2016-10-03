<?php


class IndigentApplication
{
   var $id;
   var $title;
   var $surname;
   var $name;
   var $DOB;
   var $gander;
   var $maritalStatus;
   var $ageCategory;
   var $applicationType;
   
   function __construct($id, $title, $surname, $name, $DOB, $gander, $maritalStatus, $ageCategory, $applicationType) 
   {
       $this->id = $id;
       $this->title = $title;
       $this->surname = $surname;
       $this->name = $name;
       $this->DOB = $DOB;
       $this->gander = $gander;
       $this->maritalStatus = $maritalStatus;
       $this->ageCategory = $ageCategory;
       $this->applicationType = $applicationType;
   }

   
   function getId() {
       return $this->id;
   }

   function getTitle() {
       return $this->title;
   }

   function getSurname() {
       return $this->surname;
   }

   function getName() {
       return $this->name;
   }

   function getDOB() {
       return $this->DOB;
   }

   function getGander() {
       return $this->gander;
   }

   function getMaritalStatus() {
       return $this->maritalStatus;
   }

   function getAgeCategory() {
       return $this->ageCategory;
   }

   function getApplicationType() {
       return $this->applicationType;
   }

   function setId($id) {
       $this->id = $id;
   }

   function setTitle($title) {
       $this->title = $title;
   }

   function setSurname($surname) {
       $this->surname = $surname;
   }

   function setName($name) {
       $this->name = $name;
   }

   function setDOB($DOB) {
       $this->DOB = $DOB;
   }

   function setGander($gander) {
       $this->gander = $gander;
   }

   function setMaritalStatus($maritalStatus) {
       $this->maritalStatus = $maritalStatus;
   }

   function setAgeCategory($ageCategory) {
       $this->ageCategory = $ageCategory;
   }

   function setApplicationType($applicationType) {
       $this->applicationType = $applicationType;
   }


   
   
   
}
