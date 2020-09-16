<?php

use \Models\Prato;
use \Models\No;

class JogarController
{

  private $prato;

  public function __construct()
  {
    $this->jogando = true;
  }

  public function iniciar()
  {
    if (!$this->prato) {
      $this->prato = new Prato();
      $this->configurar();
    }
    $this->adivinhar($this->prato->getRoot());
  }

  public function adivinhar($no)
  {

    $resposa = $this->readLine("O prato que você pensou é " . $no->getValue() . "?");

    if ($resposa == 'S') {
      if ($no->isLeaf()) {
        $this->readLine('Acertei de novo!' . PHP_EOL . 'Jogo finalizado', 'info');
      } else {
        $this->adivinhar($no->getDireita());
      }
    } else {
      if ($no->getDireita() == null) {
        $this->novoPrato($no);
      } else {
        $this->adivinhar($no->getEsquerda());
      }
    }
  }

  private function configurar()
  {
    $this->prato->setRoot(null, "Massa", true);
    $this->prato->setRoot($this->prato->getRoot(), "Lasanha", true);
    $this->prato->setRoot($this->prato->getRoot(), "Bolo de Chocolate", false);
  }

  private function novoPrato($no)
  {
    $nome = $this->readLine("Qual prato você pensou?", "input");

    $dica = $this->readLine($nome . " é _______ mas " . $no->getValue() . " não: ", "input");

    $wrongGuess = $no->getValue();

    $no->setValue($dica);
    $no->setEsquerda(new No($wrongGuess));
    $no->setDireita(new No($nome));

    $this->adivinhar($no);
  }

  private function readLine($text, $type = 'confirm')
  {

    $retorno = null;

    switch ($type) {

      case 'confirm':
        $retorno = strtoupper(readline($text . ' [S/N]'));

        if (!in_array($retorno, ['S', 'N'])) {
          $this->readLine('Valor inválido. Informe S para SIM ou N para NÃO' . PHP_EOL . 'Jogo finalizado', 'info');
        }
        break;

      case 'input':
        $retorno = strtoupper(readline($text));
        break;

      case 'info':
        exit($text . PHP_EOL);
        break;
    }


    return $retorno;
  }
}
