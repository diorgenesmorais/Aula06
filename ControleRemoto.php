<?php

require_once 'Controlador.php';

/**
 * Description of ControleRemoto
 *
 * @author Diorgenes Morais
 */
class ControleRemoto implements Controlador {

    private $ligado;
    private $volume;
    private $tocando;

    public function __construct() {
        $this->ligado = false;
        $this->volume = 50;
        $this->tocando = false;
    }

    private function getLigado() {
        return $this->ligado;
    }

    private function getVolume() {
        return $this->volume;
    }

    private function getTocando() {
        return $this->tocando;
    }

    private function setLigado($ligado) {
        $this->ligado = $ligado;
    }

    private function setVolume($volume) {
        $this->volume = $volume;
    }

    private function setTocando($tocando) {
        $this->tocando = $tocando;
    }

    public function menu() {
        echo "<br>Está ligado? " . ($this->getLigado() ? "SIM" : "NÃO");
        echo "<br>Está tocando? " . ($this->getTocando() ? "SIM" : "NÃO");
        echo "<br>Volume: " . $this->getVolume() . " ";
        for ($i = 0; $i <= $this->getVolume(); $i+=10) {
            echo "|";
        }
        echo "<br>";
    }

    public function mute() {
        if ($this->getVolume() > 0) {
            $this->setVolume(0);
        } else {
            $this->setVolume(50);
        }
    }

    public function pause() {
        if ($this->getLigado() && $this->getTocando()) {
            $this->setTocando(false);
        }
    }

    public function play() {
        if ($this->getLigado() && !($this->getTocando())) {
            $this->setTocando(true);
        }
    }

    public function power() {
        if ($this->getLigado()) {
            $this->setLigado(false);
        } else {
            $this->setLigado(true);
        }
    }

    public function volumeDown() {
        if ($this->getLigado()) {
            $this->setVolume($this->getVolume() - 10);
        }
    }

    public function volumeUp() {
        if ($this->getLigado()) {
            $this->setVolume($this->getVolume() + 10);
        }
    }

}
