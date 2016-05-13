<?php
namespace GildedRose;

class Program
{
	private $items = array();

	public static function Main()
	{
		echo "HELLO\n";

		/* initialize with array of items */

		$app = new Program(array(
				new Item(array('name' => "+5 Dexterity Vest",'sellIn' => 10,'quality' => 20)),
				new Item(array('name' => "Aged Brie",'sellIn' => 2,'quality' => 0)),
				new Item(array('name' => "Elixir of the Mongoose",'sellIn' => 5,'quality' => 7)),
				new Item(array('name' => "Sulfuras, Hand of Ragnaros",'sellIn' => 0,'quality' => 79)),
				new Item(array('name' => "Backstage passes to a TAFKAL80ETC concert",'sellIn' => 15,'quality' => 20)),
				new Item(array('name' => "Conjured Mana Cake",'sellIn' => 3,'quality' => 6)),
			));

		$app->UpdateQuality();

		echo sprintf("%50s - %7s - %7s\n", "Name", "SellIn", "Quality");
		foreach ($app->items as $item) {
			echo sprintf("%50s - %7d - %7d\n", $item->name, $item->sellIn, $item->quality);
		}
	}

	public function __construct(array $items){
		$this->items = $items;
	}

	public function ApplyRules(Item $item){
		if ($item->name == "+5 Dexterity Vest"){
			$rules = new ProgramRules($item); 
			$rules->Basic();
			return $rules; 
		} else if ($item->name == "Elixir of the Mongoose"){
			$rules = new ProgramRules($item);  
			$rules->Basic();
			return $rules; 
		} else if ($item->name == "Aged Brie"){
			$rules = new ProgramRules($item); 
			$rules->AgedBrie();
			return $rules; 			
		} else if ($item->name == "Backstage passes to a TAFKAL80ETC concert"){
			$rules = new ProgramRules($item); 
			$rules->Backstage();
			return $rules; 			
		} else if ($item->name == "Conjured Mana Cake"){
			$rules = new ProgramRules($item); 
			$rules->Conjured();
			return $rules; 			
		} else if ($item->name == "Sulfuras, Hand of Ragnaros"){
			$rules = new ProgramRules($item); 
			$rules->Sulfuras();
			return $rules; 			
		}
	}

	public function UpdateQuality(){
		for ($i = 0; $i < count($this->items); $i++) {
			foreach ($this->items as $k => $item){
				$rules = $this->ApplyRules($item);
				$this->items[$k]->sellIn = $rules->sellIn; 
				$this->items[$k]->quality = $rules->quality;  
			}
		}
	}


}
