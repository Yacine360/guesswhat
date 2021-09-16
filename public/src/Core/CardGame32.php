<?php

namespace App\Core;

/**
 * Class CardGame32 : un jeu de cartes.
 * @package App\Core
 */
class CardGame32
{
    const ORDERS_COLORS = ['trefle' => 4, 'coeur' => 3, 'pique' => 2, 'carreau' => 1];
    const ORDERS_CARDS = ['as' => 8, 'roi' => 7, 'dame' => 6, 'valet' => 5, '10' => 4, '9' => 3, '8' => 2, '7' => 1];
    /**
     * @var $cards array a array of Cards
     */
    private $cards;

    /**
     * Guess constructor.
     * @param array $cards
     */
    public function __construct(array $cards)
    {
        $this->cards = $cards;
    }

    /**
     * Brasse le jeu de cartes
     */
    public function shuffle()
    {

        return shuffle($this->cards);
    }


    /** définir une relation d'ordre entre instance de Card.
     * à valeur égale (name) c'est l'ordre de la couleur qui prime
     * coeur > carreau > pique > trèfle
     * Attention : si AS de Coeur est plus fort que AS de Trèfle,
     * 2 de Coeur sera cependant plus faible que 3 de Trèfle
     *
     *  Remarque : cette méthode n'est pas de portée d'instance (static)
     *
     * @see https://www.php.net/manual/fr/function.usort.php
     *
     * @param $c1 Card
     * @param $c2 Card
     * @return int
     * <ul>
     *  <li> zéro si $c1 et $c2 sont considérés comme égaux </li>
     *  <li> -1 si $c1 est considéré inférieur à $c2</li>
     * <li> +1 si $c1 est considéré supérieur à $c2</li>
     * </ul>
     *
     */
    public static function compare(Card $c1, Card $c2): int
    {

        $c1Name = strtolower($c1->getName());
        $c2Name = strtolower($c2->getName());
        $c1Color = strtolower($c1->getColor());
        $c2Color = strtolower($c2->getColor());

        if ($c1Name === $c2Name) {
            if ($c1Color === $c2Color) {
                return 0;
            }
            return (self::ORDERS_COLORS[$c1Color] > self::ORDERS_COLORS[$c2Color]) ? +1 : -1;
        }
        return (self::ORDERS_CARDS[$c1Name] > self::ORDERS_CARDS[$c2Name]) ? +1 : -1;
    }

    /**
     *cree un jeu de 32 carte
     */
    public static function factoryCardGame32(): CardGame32
    {
        $cardGame = new CardGame32([new Card('As', 'Trèfle'), new Card('roi', 'Trèfle'),
            new Card('dame', 'Trèfle'), new Card('valet', 'Trèfle'), new Card('10', 'Trèfle'),
            new Card('9', 'Trèfle'), new Card('8', 'Trèfle'), new Card('7', 'Trèfle'),
            new Card('As', 'coeur'), new Card('roi', 'coeur'),
            new Card('dame', 'coeur'), new Card('valet', 'coeur'), new Card('10', 'coeur'),
            new Card('9', 'coeur'), new Card('8', 'coeur'), new Card('7', 'coeur'),
            new Card('As', 'carreau'), new Card('roi', 'carreau'),
            new Card('dame', 'carreau'), new Card('valet', 'carreau'), new Card('10', 'carreau'),
            new Card('9', 'carreau'), new Card('8', 'carreau'), new Card('7', 'carreau'),
            new Card('As', 'pique'), new Card('roi', 'pique'),
            new Card('dame', 'pique'), new Card('valet', 'pique'), new Card('10', 'pique'),
            new Card('9', 'pique'), new Card('8', 'pique'),new Card('7', 'pique')]);

    return $cardGame;
  }

    /**
     *
     * @param $index
     * @return Card
     */
    public function getCard($index): Card
    {
        // TODO naïf
        return $this->cards[$index];
    }

}

