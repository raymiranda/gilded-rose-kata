<?php

namespace GildedRose\Tests;

class ProgramTest extends \PHPUnit_Framework_TestCase
{
	public function testUpdateQuality(){
		$testvalues[] = array(
			'name' => "+5 Dexterity Vest",
			'sellIn' => 10,
			'quality' => 20
		);
		$testvalues[] = array(
			'name' => "Aged Brie",
			'sellIn' => 2,
			'quality' => 0
		);
		$testvalues[] = array(
			'name' => "Elixir of the Mongoose",
			'sellIn' => 5,
			'quality' => 7
		);
		$testvalues[] = array(
			'name' => "Sulfuras, Hand of Ragnaros",
			'sellIn' => 0,
			'quality' => 80
		);
		$testvalues[] = array(
			'name' => "Backstage passes to a TAFKAL80ETC concert",
			'sellIn' => 15,
			'quality' => 20
		);
		$testvalues[] = array(
			'name' => "Conjured Mana Cake",
			'sellIn' => 3,
			'quality' => 6
		); 
		
		foreach ($testvalues as $data){
			$this->assertArrayHasKey('sellIn', $data);
			$this->assertArrayHasKey('quality', $data);
			if ($data['name'] == "Sulfuras, Hand of Ragnaros"){
				$this->assertSame(80, $data['quality']);
				$this->assertSame(0, $data['sellIn']);
			} else {
				/* contains the name */
				$this->assertLessThanOrEqual(50, $data['quality']);	
				$this->assertGreaterThanOrEqual(0, $data['quality']);
			}	
		}
	}
	
	public function testApplyRules(){
		$testvalues[] = array(
			'name' => "+5 Dexterity Vest",
			'sellIn' => 10,
			'quality' => 20
		);
		$testvalues[] = array(
			'name' => "Aged Brie",
			'sellIn' => 2,
			'quality' => 0
		);
		$testvalues[] = array(
			'name' => "Elixir of the Mongoose",
			'sellIn' => 5,
			'quality' => 7
		);
		$testvalues[] = array(
			'name' => "Sulfuras, Hand of Ragnaros",
			'sellIn' => 0,
			'quality' => 80
		);
		$testvalues[] = array(
			'name' => "Backstage passes to a TAFKAL80ETC concert",
			'sellIn' => 15,
			'quality' => 20
		);
		$testvalues[] = array(
			'name' => "Conjured Mana Cake",
			'sellIn' => 3,
			'quality' => 6
		); 
		
		foreach ($testvalues as $data){
			$this->assertArrayHasKey('sellIn', $data);
			$this->assertArrayHasKey('quality', $data);
			if ($data['name'] == "Sulfuras, Hand of Ragnaros"){
				$this->assertSame(80, $data['quality']);
				$this->assertSame(0, $data['sellIn']);
			} else {
				/* contains the name */
				$this->assertLessThanOrEqual(50, $data['quality']);	
				$this->assertGreaterThanOrEqual(0, $data['quality']);
			}	
		}
	}
}