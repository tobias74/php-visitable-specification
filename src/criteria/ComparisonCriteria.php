<?php 
namespace VisitableSpecification;

abstract class ComparisonCriteria extends AbstractCriteria
{
	protected $field;
	protected $value;
	
	
	public function __construct($field,$value)
	{
		$this->field = $field;
		$this->value = $value;
	}
	
		
	public function getValue()
	{
		return $this->value;
	}
	
	public function affectsField($field)
	{
		return ($this->getField() === $field);	
	}
	
	public function getField()
	{
		return $this->field;
	}
	
	
}


class GreaterThanCriteria extends ComparisonCriteria
{
  public function acceptVisitor($visitor)
  {
    $visitor->visitGreaterThanCriteria($this);
  }
}


class GreaterOrEqualCriteria extends ComparisonCriteria
{
  public function acceptVisitor($visitor)
  {
    $visitor->visitGreaterOrEqualCriteria($this);
  }
}


class LessThanCriteria extends ComparisonCriteria
{
  public function acceptVisitor($visitor)
  {
    $visitor->visitLessThanCriteria($this);
  }
}


class LessOrEqualCriteria extends ComparisonCriteria
{
  public function acceptVisitor($visitor)
  {
    $visitor->visitLessOrEqualCriteria($this);
  }
}


class EqualCriteria extends ComparisonCriteria
{
  public function acceptVisitor($visitor)
  {
    $visitor->visitEqualCriteria($this);
  }
}


class NotEqualCriteria extends ComparisonCriteria
{
  public function acceptVisitor($visitor)
  {
    $visitor->visitNotEqualCriteria($this);
  }
}



class NotNullCriteria extends AbstractCriteria
{
  protected $field;
  
  public function __construct($field)
  {
    $this->field = $field;
  }
  
  public function affectsField($field)
  {
    return ($this->getField() === $field);  
  }
  
  public function getField()
  {
    return $this->field;
  }
  
  public function acceptVisitor($visitor)
  {
    $visitor->visitNotNullCriteria($this);
  }
}




class AssociationCriteria extends AbstractCriteria
{
  protected $field;
  protected $value;
  
  public function __construct($field,$value)
  {
    $this->field = $field;
    $this->value = $value;
  }
  
  public function acceptVisitor($visitor)
  {
    $visitor->visitAssociationCriteria($this);
  }
    
  public function getValue()
  {
    return "'".addslashes($this->value)."'";
  }
  
  public function affectsField($field)
  {
    return ($this->getField() === $field);  
  }
  
  public function getField()
  {
    return $this->field;
  }
    
}
