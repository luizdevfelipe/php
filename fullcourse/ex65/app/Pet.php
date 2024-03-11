<?php 
declare(strict_types=1);

namespace App;

class Pet extends NPC
{
    public function __construct(private Monster $monster)
    {
        // pet can attack, and the attack method is in the monster class
        // but pet isn't a monster to use inheritence
    }
    // Some Properties

    // Some Other Methods
}