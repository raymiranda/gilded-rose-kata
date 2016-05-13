<?php

namespace GildedRose\Tests;

class testProgramRules extends \PHPUnit_Framework_TestCase
{
	public function testAgedBrie(){
		$testvalues[] = array(
			'name' => "Aged Brie",
			'sellIn' => 2,
			'quality' => 0
		);

		foreach ($testvalues as $data){
			$this->assertArrayHasKey('sellIn', $data);
			$this->assertArrayHasKey('quality', $data);
			$this->assertLessThanOrEqual(50, $data['quality']);
			$this->assertGreaterThanOrEqual(0, $data['quality']);
		}
	}

	public function testSulfuras(){
		$testvalues[] = array(
			'name' => "Sulfuras, Hand of Ragnaros",
			'sellIn' => 0,
			'quality' => 80, 
			'qualityMin' => 80, 
			'qualityMax' => 80
		);

		foreach ($testvalues as $data){
			$this->assertArrayHasKey('sellIn', $data);
			$this->assertArrayHasKey('quality', $data);

			$this->assertEquals(80, $data['qualityMin']);
			$this->assertEquals(80, $data['qualityMax']);
		}
	}

	public function testBackstage(){
		$testvalues[] = array(
			'name' => "Backstage passes to a TAFKAL80ETC concert",
			'sellIn' => 15,
			'quality' => 20
		);

		foreach ($testvalues as $data){
			$this->assertArrayHasKey('sellIn', $data);
			$this->assertArrayHasKey('quality', $data);

			$this->assertLessThanOrEqual(50, $data['quality']);
			$this->assertGreaterThanOrEqual(0, $data['quality']);
		}
	}

	public function testConjured(){
		$testvalues[] = array(
			'name' => "Conjured Mana Cake",
			'sellIn' => 3,
			'quality' => 6
		);

		foreach ($testvalues as $data){
			$this->assertArrayHasKey('sellIn', $data);
			$this->assertArrayHasKey('quality', $data);
			$this->assertLessThanOrEqual(50, $data['quality']);
			$this->assertGreaterThanOrEqual(0, $data['quality']);
		}
	}

	public function testBasic(){
		$testvalues[] = array(
			'name' => "Elixir of the Mongoose",
			'sellIn' => 5,
			'quality' => 7
		);

		foreach ($testvalues as $data){
			$this->assertArrayHasKey('sellIn', $data);
			$this->assertArrayHasKey('quality', $data);

			$this->assertLessThanOrEqual(50, $data['quality']);
			$this->assertGreaterThanOrEqual(0, $data['quality']);
		}
	}

	public function testCaps(){
		$testvalues = array(
			'qualityMax' => 50,
			'qualityMin' => 0
		);
		$this->assertEquals(50, $testvalues['qualityMax']);
		$this->assertEquals(0, $testvalues['qualityMin']);

	}
}