<?php
interface Milk
{
    public function getMilk();
}

interface Eggs
{
    public function getEggs();
}


class Barn
{
    public $milk;
    public $eggs;
    public function getProducts()
    {
        foreach ($this->arrAnimals as $key => $value)
        {
            if ($this->arrAnimals[$key] instanceof Milk) {
                $this->milk;
                $this->milk += $this->arrAnimals[$key]->getMilk();
            }
            if ($this->arrAnimals[$key] instanceof Eggs) {
                $this->eggs;
                $this->eggs += $this->arrAnimals[$key]->getEggs();
            }
        }
    }

    public function showProducts()
    {
        echo "Яиц: {$this->eggs}<br>Молока: {$this->milk}";
    }
}



abstract class Animal
{
    public static $num = 0;
    public $id;
    public function __construct()
    {
        $this->id = Animal::$num;
        Animal::$num++;
    }
}

class Cow extends Animal implements Milk
{
    public function getMilk()
    {
        return rand(8, 12);
    }
}

class Chicken extends Animal implements Eggs
{
    public function getEggs()
    {
        return rand(0, 1);
    }
}


$barn = new Barn();

for ($i = 0; $i < 10; $i++) {
    $barn->arrAnimals[] = new Cow();
}

for ($i = 0; $i < 20; $i++) {
    $barn->arrAnimals[] = new Chicken();
}

$barn->getProducts();

$barn->showProducts();
