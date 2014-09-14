<?php

class ShopProduct {
    public $title;
    public $producerFirstName;
    public $producerSecondName;
    protected $price;
    public $discount = 0;

    public function __construct( 
        $title, 
        $producerFirstName,  
        $producerSecondName, 
        $price 
    ) {
        $this->title = $title;
        $this->producerFirstName = $producerFirstName;
        $this->producerSecondName = $producerSecondName;
        $this->price = $price;
    }

    public function getProducer() {
        return $this->producerFirstName . ' ' . $this->producerSecondName;
    }
    
    public function getSummary() {
        return '';
    }
    
    public function getProductInfo() {
        return 
        "Продукт: {$this->title}<br>".
        "Автор: {$this->getProducer()}<br>".
        "Цена: {$this->price}<br>";
    }
    
    public function getPrice() {
        return $this->price - $this->price*($this->discount*0.01);
    }
}


class BookProduct extends ShopProduct {
    public $numberofPages;
    
    public function __construct(
        $title, 
        $producerFirstName,  
        $producerSecondName, 
        $price,
        $numberOfPages
    ) {
        parent::__construct($title, $producerFirstName, $producerSecondName, $price);
        $this->numberofPages = $numberOfPages;
    }


    public function getSummary() {
        return $this->numberofPages;
    }
    
    public function getProductInfo() {
        $str = parent::getProductInfo();
        $str .= "Кол-во стр: {$this->numberofPages}<br>";
        return $str;
    }
}

class CDProduct extends ShopProduct {
    public $playLength;
    
    public function getSummary() {
        return $this->playLength; 
    }
    
    public function __construct(
        $title, 
        $producerFirstName,  
        $producerSecondName, 
        $price,
        $playLength
    ) {
        parent::__construct($title, $producerFirstName, $producerSecondName, $price);
        $this->playLength = $playLength;
    }
    
    public function getProductInfo() {
        $str = parent::getProductInfo();
        $str .= "Длина записи: {$this->playLength}<br>";
        return $str;
    }
}

/*
class BookProduct {
    public $title;
    public $producerFirstName;
    public $producerSecondName;
    public $price;
    public $numberofPages;
    
    public function __construct( 
            $title, 
            $producerFirstName, 
            $producerSecondName, 
            $price,
            $numberOfPages
   ) {
        $this->title = $title;
        $this->producerFirstName = $producerFirstName;
        $this->producerSecondName = $producerSecondName;
        $this->price = $price;
        $this->numberofPages = $numberOfPages;
    }

    public function getProducer() {
        return $this->producerFirstName . ' ' . $this->producerSecondName;
    }
}

class CDProduct {
    public $title;
    public $producerFirstName;
    public $producerSecondName;
    public $price;
    public $playLength;


    public function __construct( 
            $title, 
            $producerFirstName, 
            $producerSecondName, 
            $price,
            $playLendth
   ) {
        $this->title = $title;
        $this->producerFirstName = $producerFirstName;
        $this->producerSecondName = $producerSecondName;
        $this->price = $price;
        $this->playLength = $playLendth;
    }

    public function getProducer() {
        return $this->producerFirstName . ' ' . $this->producerSecondName;
    }
}
*/
class ShopProductWriter
{
    private $products = array();
    
    public function addProduct(ShopProduct $product){
        $this->products[] = $product;
    }
    public function write() {
        foreach ( $this->products as $product ){
            echo $product->getProductInfo();
            echo "===============================<br>";
        }
    }
}

class Wrong
{}

$writer = new ShopProductWriter();
$product1 = new BookProduct( 'Война и мир', 'Лев', 'Толстой', 100, 7000) ;
$product2 = new CDProduct( 'A Kind of Magic', 'Queen', 'Band', 1000, 60 );
$product3 = new BookProduct( 'Анна Коренина', 'Лев', 'Толстой', 100, 2000 );


$writer->addProduct($product1);
$writer->addProduct($product2);
//$writer->addProduct(new Wrong());
$writer->write();


//$product1->discount = 50;
//echo $product1->getPrice();
//$writer->write($product1);