<?php

namespace Models;

class No
{

	private $valor;
	private $esquerda;
	private $direita;

	public function __construct(String $valor)
	{
		$this->valor = $valor;
	}

	public function isLeaf()
	{
		return $this->esquerda == null && $this->direita == null;
	}

	public function setValue(String $valor)
	{
		$this->valor = $valor;
	}

	public function getValue()
	{
		return $this->valor;
	}

	public function setEsquerda(No $esquerda)
	{
		$this->esquerda = $esquerda;
	}

	public function getEsquerda()
	{
		return $this->esquerda;
	}

	public function setDireita(No $direita)
	{
		$this->direita = $direita;
	}

	public function getDireita()
	{
		return $this->direita;
	}
}
