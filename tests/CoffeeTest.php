<?php


namespace App\Tests;
use App\Entity\Coffee;

use PHPUnit\Framework\TestCase;

class CoffeeTest extends TestCase

{
    public function testNewCoffeeIsNotNull()
    {
        //arrange
        $s = new Coffee();
        //act

        //assert
        $this->assertNotNull($s);
    }

    //id
    public function testGetIdReturnsNotNullForNewCoffee()
    {
        //arrange
        $s = new Coffee();

        //act
        $result = $s->getId();

        //assert
        $this->assertNull($result);
    }
    /*
    public function testGetIdReturnsMinusOneForNewCoffee()
    {
        //arrange
        $s = new Coffee();
        $exceptedValue = 11;

        //act
        $result = $s->getId();

        //assert
        $this->assertEquals($exceptedValue, $result);
    }*/
    //id end
/*###################################################*/

    //price
    public function testGetCoffeePriceReturnsNotNullForNewCoffee()
    {
        //arrange
        $s = new Coffee();

        //act
        $result = $s->getPrice();

        //assert
        $this->assertNull($result);
    }

    public function testGetCoffeePriceReturnsZeroForNewCoffee()
    {
        //arrange
        $s = new Coffee();
        $exceptedValue = 0;

        //act
        $result = $s->getPrice();

        //assert
        $this->assertEquals($exceptedValue, $result);
    }

    public function testGetCoffeePriceReturnsFiveAfterASetCoffeePriceGivenFive(){
        //arrange
        $s = new Coffee();
        $newPrice = 5 ;
        $expectedResult = 5;

        //act
        $s->setPrice($newPrice);
        $result = $s->getPrice();

        //assert
        $this->assertEquals($expectedResult, $result);
    }
    //end price
    /*###################################################*/


    //name
    public function testGetNameReturnsNotNullForNewCoffee()
    {
        //arrange
        $s = new Coffee();

        //act
        $result = $s->getName();

        //assert
        $this->assertNull($result);
    }

    public function testGetCoffeeNameReturnsEmptyNameForNewCoffee()
    {
        //arrange
        $s = new Coffee();
        $exceptedValue = '';

        //act
        $result = $s->getName();

        //assert
        $this->assertEquals($exceptedValue, $result);
    }

    public function testGetCoffeeNameReturnsExpressoAfterASetCoffeeNameGivenExpresso(){
        //arrange
        $s = new Coffee();
        $newName = 'Expresso' ;
        $expectedResult = 'Expresso';

        //act
        $s->setName($newName);
        $result = $s->getName();

        //assert
        $this->assertEquals($expectedResult, $result);
    }
    //end name
    /*###################################################*/

    //description

    public function testGetDescriptionReturnsNotNullForNewCoffee()
    {
        //arrange
        $s = new Coffee();

        //act
        $result = $s->getDescription();

        //assert
        $this->assertNull($result);
    }

    public function testGetCoffeeDescriptionReturnsEmptyDescriptionForNewCoffee()
    {
        //arrange
        $s = new Coffee();
        $exceptedValue = '';

        //act
        $result = $s->getDescription();

        //assert
        $this->assertEquals($exceptedValue, $result);
    }

    public function testGetCoffeeImageCoffeeImageSetCoffeeImageCoffeeImage(){
        //arrange
        $s = new Coffee();
        $newImage = 'CoffeeImage' ;
        $expectedResult = 'CoffeeImage';

        //act
        $s->setImage($newImage);
        $result = $s->getImage();

        //assert
        $this->assertEquals($expectedResult, $result);
    }
    //end descrintion
    /*###################################################*/

    //image

    public function testGetImageReturnsNotNullForNewCoffee()
    {
        //arrange
        $s = new Coffee();

        //act
        $result = $s->getImage();

        //assert
        $this->assertNull($result);
    }

    public function testGetCoffeeImageReturnsEmptyImageForNewCoffee()
    {
        //arrange
        $s = new Coffee();
        $exceptedValue = '';

        //act
        $result = $s->getImage();

        //assert
        $this->assertEquals($exceptedValue, $result);
    }





    /*public function testGetIdReturnsTwoAfterASetIdGivenTwo(){
        //arrange
        $s = new Coffee();
        $newId = 2;
        $expectedResult = 2;

        //act
        $s->setId($newId);
        $result = $s->getId();

        //assert
        $this->assertEquals($expectedResult, $result);
    }*/
}