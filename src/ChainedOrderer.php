<?php 
namespace BrokenPottery;

class ChainedOrderer extends AbstractOrderer implements OrdererInterface
{
	public function __construct($ordererA, $ordererB)
	{
		$this->ordererA = $ordererA;
		$this->ordererB = $ordererB;
	}
	
	public function getOrderClause($context)
	{
		return " ".$this->ordererA->getOrderClause($context). " , ".$this->ordererB->getOrderClause($context). " ";
	}
}
