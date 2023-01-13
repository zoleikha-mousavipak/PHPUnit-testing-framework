<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testReturnFullName() {

       # require 'User.php';

        $user = new User();

        $user->first_name = "Zoli";
        $user->last_name = "pak";

        $this->assertEquals('Zoli pak', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User();

        $this->assertEquals('', $user->getFullName());
    }
}