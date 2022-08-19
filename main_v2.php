<?php
class Ambar{
  public $animals;
  public $actual_id = 1;
  public $storePr;
  
  public function newAnimal($objAnimal)
  {
    $objAnimal->id = $this->actual_id;
    $this->animals[get_class($objAnimal)][] = $objAnimal;
    $this->actual_id++;
  }

  public function collectProducts()
  {
    foreach($this->animals as $animals)
      {
        foreach($animals as $animal)
          {
            $animal->collectP();
          }
      }
  }

  public function getProducts()
  {
    foreach($this->animals as $animals)
      {
        foreach($animals as $animal)
          {
            $this->storePr[$animal->getP()[0]] += $animal->getP()[1];
          }
      }
    echo 'Яиц '. $this->storePr['egg'] .' шт. Молока '. $this->storePr['milk'] .' л.';
  }
}

interface Animal
{
  public function collectP();
  public function getP();
}

class Cow implements Animal
{
  public $milk = 0;
  public function collectP()
  {
    $this->milk = rand(8,12);
  }
  public function getP()
  {
    return array('milk', $this->milk);
  }
}

class Chiken implements Animal
{
  public $egg = 0;
  public function collectP()
  {
    $this->egg = rand(0,1);
  }
  public function getP()
  {
    return array('egg',$this->egg);
  }
}


//Запуск
$ambar = new Ambar;

//Создание коров, куриц
for($i = 0;$i<10;$i++)
{
  $ambar->newAnimal(new Cow);
}

for($i = 0;$i<20;$i++)
{
  $ambar->newAnimal(new Chiken);
}

//Собрать продукты животных
$ambar->collectProducts();

//Получить общее количество продуктов
//и вывести
$ambar->getProducts();
