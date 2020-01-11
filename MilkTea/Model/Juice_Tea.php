<?php
  require_once "OMilkTea.php";

  class Juice_Tea extends OMilkTea {

  	function getType(){
  		return "Juice/Tea";
  	}

  	function getImagePath(){
    		return $this->image;
    }

    function getDisplayPrice(){
          return $this->price." VND";
    }
  }
?>