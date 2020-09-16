<?php

namespace Models;

class Prato
{

	private $root;

	public function __construct()
	{
	}

	public function getRoot()
	{
		return $this->root;
	}

	public function setRoot(No $no = null, String $valor, $escolha)
	{
		$this->root = $this->inserirNo($no, $valor, $escolha);
	}

	private function inserirNo(No $no = null, String $valor, $escolha)
	{

		if ($no == null) {
			$no = new No($valor);
		} else if ($escolha) {
			$no->setDireita($this->inserirNo($no->getDireita(), $valor, $escolha));
		} else {
			$no->setEsquerda($this->inserirNo($no->getEsquerda(), $valor, $escolha));
		}

		return $no;
	}
}
