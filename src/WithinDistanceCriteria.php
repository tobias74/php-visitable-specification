<?php 
namespace BrokenPottery;


class ST_WithinDistanceCriteria extends AbstractCriteria
{
  protected $geometryField;
  protected $longitude;
  protected $latitude;
  protected $maximumDistance;
  
  
  public function __construct($geometryField,$longitude,$latitude,$maximumDistance)
  {
    $this->latitude = $latitude;
    $this->longitude = $longitude;
    $this->geometryField = $geometryField;
    $this->maximumDistance = $maximumDistance;
  }
  
  public function acceptVisitor($visitor)
  {
    $visitor->visitWithinDistanceCriteria($this);
  }
    
  public function getLatitude()
  {
    return $this->latitude;  
  } 

  public function getLongitude()
  {
    return $this->longitude;  
  } 
   
  public function getMaximumDistance()
  {
    return addslashes($this->maximumDistance);
  }
  
  public function affectsField($field)
  {
    return ($this->getGeometryField() === $field);  
  }
  
  public function getGeometryField()
  {
    return $this->geometryField;
  }
  
  public function getWhereClause($context)
  {
    throw new  \ErrorException('don tcall this');
  }
  
}

