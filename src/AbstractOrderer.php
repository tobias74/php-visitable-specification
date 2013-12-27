<?php 
namespace BrokenPottery;

interface OrdererInterface
{
	public function getOrderClause($context);
}

class AbstractOrderer
{
	public function chain($orderer)
	{
		return new ChainedOrderer($this, $orderer);
	}
	
	public function attachToSpecification($spec)
	{
		$spec->setOrderer($this);
	}
		
}
