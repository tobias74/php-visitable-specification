<?php 
namespace PhpVisitableSpecification;


class WithinGeoHashCellCriteria extends WithinBoundingBoxCriteria
{

  public function __construct($geometryField, $geoHashCell)
  {
      $boundingBox = \Lvht::getBoundingBox($geoHashCell);
    
      $this->topLeft = $boundingBox['top_left'];
      $this->bottomRight = $boundingBox['bottom_right'];
      $this->geometryField = $geometryField;
  }
  
}



