<?php 
namespace VisitableSpecification;

class ChainedOrderer extends AbstractOrderer implements OrdererInterface
{
	public function __construct($ordererA, $ordererB)
	{
		$this->ordererA = $ordererA;
		$this->ordererB = $ordererB;
	}
	
  // this method has to be transfered to the Visitor
	public function getOrderClause($context)
	{
		return " ".$this->ordererA->getOrderClause($context). " , ".$this->ordererB->getOrderClause($context). " ";
	}
  
  public function acceptVisitor($visitor)
  {
    $this->ordererA->acceptVisitor($visitor);
      $this->ordererB->acceptVisitor($visitor);
    $visitor->visitChainedOrderer($this);
  }
  
  public function getFirstOrderer()
  {
    return $this->ordererA;
  }
  
  public function getSecondOrderer()
  {
    return $this->ordererB;
  }

  
}
