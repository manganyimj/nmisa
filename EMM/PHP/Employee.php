<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employee
 *
 * @author csibiya
 */
class Employee 
{
   var $empId;
   var $name;
   var $surname;
   var $gander;
   var $phone;
   var $email;
   
   function __construct($empId, $name, $surname, $gander, $phone, $email) 
   {
       $this->empId = $empId;
       $this->name = $name;
       $this->surname = $surname;
       $this->gander = $gander;
       $this->phone = $phone;
       $this->email = $email;
   }

   
   function getEmpId() {
       return $this->empId;
   }

   function getName() {
       return $this->name;
   }

   function getSurname() {
       return $this->surname;
   }

   function getGander() {
       return $this->gander;
   }

   function getPhone() {
       return $this->phone;
   }

   function getEmail() {
       return $this->email;
   }

   function setEmpId($empId) {
       $this->empId = $empId;
   }

   function setName($name) {
       $this->name = $name;
   }

   function setSurname($surname) {
       $this->surname = $surname;
   }

   function setGander($gander) {
       $this->gander = $gander;
   }

   function setPhone($phone) {
       $this->phone = $phone;
   }

   function setEmail($email) {
       $this->email = $email;
   }


}
