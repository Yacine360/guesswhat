<?php


namespace App\Tests\Core;

use App\Core\Card;
use App\Core\CardGame32;
use PHPUnit\Framework\TestCase;


class CardGame32Test extends TestCase
{
    public function testCompare()
    {

    }

    public function testToString2Cards()
    {
        $jeudecarte = new CardGame32([new Card('as', 'pique'), new Card('rois', 'coeur')]);
        $this->assertEquals('CardGame32 : 2 carte(s)', $jeudecarte->__toString());
    }

    public
    function testToString1Cards()
    {
        $jeudecarte = new CardGame32([new Card('as', 'pique'), new Card('rois', 'coeur')]);
        $this->assertEquals('CardGame32 : 1 carte(s)', $jeudecarte->__toString());
    }

    public
    function testTostring32Cards()
    {
        $cards = CardGame32::factoryCardGame32();
        $this->assertEqual('CardGame32 : 32 carte(s)', $cards->__toString());
    }

    public function testGetCard()
    {
        $cards = new CardGame32(new Card('dame', 'coeur'));
        $this->asserEquals(new Card('dame', 'coeur'));
    }

    public function testShuffle()
    {
    }
}
