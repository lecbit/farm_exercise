<?php
class Animal{
    static $arr;
    static $id;
    static $all_p;
    public function __construct($animN,$prodN,$count,$min,$max)
    {
        for($i=0; $i<$count; $i++){
            Animal::$arr[$animN][Animal::$id] = [
                "id" => Animal::$id+1
            ];
            Animal::$arr[$animN][Animal::$id][$prodN] = rand($min,$max);
            Animal::$all_p += Animal::$arr[$animN][Animal::$id][$prodN];
            Animal::$id++;
        }
    }


    public function Summ(){
        //Массив всех продуктов
        // echo '<pre>';
        // print_r(Animal::$arr); 
        // echo '</pre>';
        echo 'Общее кол-во собранной продукции: '. Animal::$all_p;
    }
}

class Cows extends Animal{

}
class Chicken extends Animal{

}


$ani = new Cows('Cows','milk',10,8,12);
$ani2 = new Chicken('Chickens','eggs',20,0,1);
$ani2->Summ();
?>