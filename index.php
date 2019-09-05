<?php

class Cow{
    public $id;
    public $liter;

    public function __construct($id){
        $this->id=$id;
        $this->liter=random_int(8, 12);
    }
}

class Chicken{
    public $id;
    public $egg;

    public function __construct($id){
        $this->id=$id;
        $this->egg=random_int(0, 1);
    }
}

class Stable{
    private $eggs=0;
    private $animals;
    private $literes=0;

    public function InStable(){
        $this->animals=array();
        for ($i=0;$i<20;$i++){
           array_push($this->animals,(new Chicken($i)));
        };
        for ($i=20;$i<30;$i++){
            array_push($this->animals,(new Cow($i)));
        }

    }
    public function GetProd(){
        $i=0;
        do{
            if(isset($this->animals[$i]->egg)){
                $this->eggs+=$this->animals[$i]->egg;
                echo "Курица id".$this->animals[$i]->id." Снесла ".$this->animals[$i]->egg." Яиц.".PHP_EOL." Собираю...";
            }elseif(isset($this->animals[$i]->liter)){
                $this->literes+=$this->animals[$i]->liter;
                echo "Корова id".$this->animals[$i]->id." Принесла ".$this->animals[$i]->liter." Литров молока.".PHP_EOL." Собираю...";
            }
            else{
                echo "WARNING! I'M Broken(";
            }
            $i++;
        }
        while(isset($this->animals[$i]));
    }

    public function Count(){
        echo "Всего собрано единиц продукции".PHP_EOL;
        echo "Яиц: ".$this->eggs.PHP_EOL;
        echo "Литров молока: ".$this->literes.PHP_EOL;
    }
}

$Farm =new Stable();
$Farm->InStable();
$Farm->GetProd();
$Farm->Count();

echo "Success!";