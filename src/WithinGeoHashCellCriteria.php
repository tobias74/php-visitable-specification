<?php 
namespace PhpVisitableSpecification;


class WithinGeoHashCellCriteria extends WithinBoundingBoxCriteria
{

  public function __construct($geometryField, $geoHashCell)
  {
      $boundingBox = \Lvht\GeoHash::getBoundingBox($geoHashCell);
    
      $this->topLeftLatitude = $boundingBox['top_left']['lat'];
      $this->topLeftLongitude = $boundingBox['top_left']['lon'];
      $this->bottomRightLatitude = $boundingBox['bottom_right']['lat'];
      $this->bottomRightLongitude = $boundingBox['bottom_right']['lon'];
      $this->geometryField = $geometryField;
  }
  
}



