<?php

namespace GildedRose;

class ProgramRules
{
	public $sellIn;
	public $quality; // current Quality
	private $qualityMax = 50;
	private $qualityMin = 0;
	private $degradeSpeed;
	private $qualityGrowth;

	public function __construct(Item $parts){
		$this->sellIn = $parts->sellIn; 
		$this->quality = $parts->quality; 
	}

	public function AgedBrie(){
		$this->qualityGrowth = 1;
		$this->quality = $this->quality + $this->qualityGrowth;
		$this->caps(); 
	}

	/* Never has to be sold or decreased */
	public function Sulfuras(){
		$this->qualityMax = 80;
		$this->qualityMin = 80;
		$this->quality = $this->qualityMax; // always 80;
	}

	public function Backstage(){
		$this->degradeSpeed = 1;
		if ($this->sellIn < 0){
			$this->quality = 0; // the concert has passed
		} else if ($this->sellIn <= 5){
				$this->qualityGrowth = 3;
				$this->quality = $this->quality + $this->qualityGrowth;
		} else if ($this->sellIn <= 10){
				$this->qualityGrowth = 2;
				$this->quality = $this->quality + $this->qualityGrowth;
		} else { // more than 10 days out, the plan is normal. 
				$this->quality = $this->quality - $this->degradeSpeed; 		
		}
		$this->caps();
	}

	public function Conjured(){
		$this->degradeSpeed = 2;
		$this->quality = $this->quality - $this->degradeSpeed;
		$this->caps(); 
	}

	/* Basic Program is used as the default program */
	public function Basic(){
		if ($this->sellIn < 0){
			$this->degradeSpeed = 2;
		} else {
			$this->degradeSpeed = 1;
		}
		$this->quality = $this->quality - $this->degradeSpeed;
		$this->caps(); 
	}
	
	/* Program Caps Set - Standard Based Rules */
	public function caps(){
		if ($this->quality > $this->qualityMax){
			$this->quality = $this->qualityMax; 
		}
		if ($this->quality < $this->qualityMin){
			$this->quality = $this->qualityMin; 			
		}
		$this->sellIn --; 
	}
}
