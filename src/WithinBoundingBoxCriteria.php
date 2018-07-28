<?php 
namespace PhpVisitableSpecification;


class WithinBoundingBoxCriteria extends AbstractCriteria
{
  protected $geometryField;
  protected $topLeft;
  protected $bottomRight;

  
  public function __construct($geometryField, $topLeft, $bottomRight)
  {
    $this->topLeft = $topLeft;
    $this->bottomRight = $bottomRight;
    $this->geometryField = $geometryField;
  }
  
  public function acceptVisitor($visitor)
  {
    $visitor->visitWithinBoundingBoxCriteria($this);
  }
    
  public function getTopLeft()
  {
    return $this->topLeft;  
  } 

  public function getBottomRight()
  {
    return $this->bottomRight;  
  } 
   
  public function affectsField($field)
  {
    return ($this->getGeometryField() === $field);  
  }
  
  public function getField()
  {
    return $this->getGeometryField();
  }
  
  public function getGeometryField()
  {
    return $this->geometryField;
  }
  
}

