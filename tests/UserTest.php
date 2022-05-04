<?php


namespace App\Tests;
use App\Entity\User;

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase

{
    public function testNewUserIsNotNull()
    {
        //arrange
        $s = new User();
        //act

        //assert
        $this->assertNotNull($s);
    }

    //id
    public function testGetUserIdReturnsNotNullForNewUser()
    {
        //arrange
        $s = new User();

        //act
        $result = $s->getId();

        //assert
        $this->assertNull($result);
    }
    /*
    public function testGetIdReturnsMinusOneForNewUser()
    {
        //arrange
        $s = new User();
        $exceptedValue = 11;

        //act
        $result = $s->getId();

        //assert
        $this->assertEquals($exceptedValue, $result);
    }*/
    //id end
/*###################################################*/

    /*###################################################*/


    //name
    public function testGetNameReturnsNotNullForNewUser()
    {
        //arrange
        $s = new User();

        //act
        $result = $s->getUsername();

        //assert
        $this->assertNull($result);
    }

    public function testGetUserNameReturnsEmptyNameForNewUser()
    {
        //arrange
        $s = new User();
        $exceptedValue = '';

        //act
        $result = $s->getName();

        //assert
        $this->assertEquals($exceptedValue, $result);
    }

    public function testGetUserNameReturnsFelixAfterASetUserNameGivenFelix(){
        //arrange
        $s = new User();
        $newUsername = 'Felix' ;
        $expectedResult = 'Felix';

        //act
        $s->setUsername($newUsername);
        $result = $s->getUsername();

        //assert
        $this->assertEquals($expectedResult, $result);
    }
    //end name
    /*###################################################*/


    /*###################################################*/

    //image





    /*public function testGetIdReturnsTwoAfterASetIdGivenTwo(){
        //arrange
        $s = new User();
        $newId = 2;
        $expectedResult = 2;

        //act
        $s->setId($newId);
        $result = $s->getId();

        //assert
        $this->assertEquals($expectedResult, $result);
    }*/
}