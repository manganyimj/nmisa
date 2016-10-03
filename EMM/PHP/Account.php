<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Account
 *
 * @author csibiya
 */
class Account 
{
  var $id;
  var $reffNum;
  var $accNum;

  function __construct($id, $reffNum, $accNum) {
      $this->id = $id;
      $this->reffNum = $reffNum;
      $this->accNum = $accNum;
      
  }
  
  function getId() {
      return $this->id;
  }

  function getReffNum() {
      return $this->reffNum;
  }

  function getAccNum() {
      return $this->accNum;
  }

 
  function setId($id) {
      $this->id = $id;
  }

  function setReffNum($reffNum) {
      $this->reffNum = $reffNum;
  }

  function setAccNum($accNum) {
      $this->accNum = $accNum;
  }

 


  
}
