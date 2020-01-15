<?php

namespace Pattern\Multiton;


class Tema
{
    const SKY = 'SKY';

    const FIRE = 'FIRE';

    private $nome;

    private $background;

    private $color;

    private static $temas;

    private function __construct() { }

    public static function getInstance($tema) 
    {
        if (Tema::$temas === null) {
            Tema::init();
        }

        return Tema::$temas[$tema];
    }

    private static function init()
    {
        $temaSky = new Tema();
        $temaSky->setNome(Tema::SKY);
        $temaSky->setBackground("#4286c9");
        $temaSky->setColor("#373c40");

        $temaFire = new Tema();
        $temaFire->setNome(Tema::FIRE);
        $temaFire->setBackground("#cf3e4f");
        $temaFire->setColor("#f0f1f5");

        Tema::$temas = [];
        Tema::$temas[Tema::SKY] = $temaSky;
        Tema::$temas[Tema::FIRE] = $temaFire;
    }
    
    public function getNome(): string
    {
        return $this->nome;
    }

    public function getBackground(): string
    {
        return $this->background;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function setBackground(string $background)
    {
        $this->background = $background;
    }

    public function setColor(string $color)
    {
        $this->color = $color;
    }
}