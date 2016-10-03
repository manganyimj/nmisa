<?php


class HouseholdBurdget 
{
   var $bondPayment;
   var $rental;
   var $electricity;
   var $water;
   var $food;
   var $transport;
   var $education;
   var  $medicalExpense;
   var $otherExpenses;
   var $monIncome;

   function __construct($bondPayment, $rental, $electricity, $water, $food, $transport, $education, $medicalExpense, $otherExpenses, $monIncome) {
       $this->bondPayment = $bondPayment;
       $this->rental = $rental;
       $this->electricity = $electricity;
       $this->water = $water;
       $this->food = $food;
       $this->transport = $transport;
       $this->education = $education;
       $this->medicalExpense = $medicalExpense;
       $this->otherExpenses = $otherExpenses;
       $this->monIncome = $monIncome;
   }

   function getMonIncome() {
       return $this->monIncome;
   }

   function setMonIncome($monIncome) {
       $this->monIncome = $monIncome;
   }

      
   function getBondPayment() {
       return $this->bondPayment;
   }

   function getRental() {
       return $this->rental;
   }

   function getElectricity() {
       return $this->electricity;
   }

   function getWater() {
       return $this->water;
   }

   function getFood() {
       return $this->food;
   }

   function getTransport() {
       return $this->transport;
   }

   function getEducation() {
       return $this->education;
   }

   function getMedicalExpense() {
       return $this->medicalExpense;
   }

   function getOtherExpenses() {
       return $this->otherExpenses;
   }

   function setBondPayment($bondPayment) {
       $this->bondPayment = $bondPayment;
   }

   function setRental($rental) {
       $this->rental = $rental;
   }

   function setElectricity($electricity) {
       $this->electricity = $electricity;
   }

   function setWater($water) {
       $this->water = $water;
   }

   function setFood($food) {
       $this->food = $food;
   }

   function setTransport($transport) {
       $this->transport = $transport;
   }

   function setEducation($education) {
       $this->education = $education;
   }

   function setMedicalExpense($medicalExpense) {
       $this->medicalExpense = $medicalExpense;
   }

   function setOtherExpenses($otherExpenses) {
       $this->otherExpenses = $otherExpenses;
   }


   
}
