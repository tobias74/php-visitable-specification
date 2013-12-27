<?php 
namespace VisitableSpecification;

class OrdererMaker
{    
    public function ascending($field)
    {
        return new SingleOrderer("ASC",$field);
    }
    
    public function descending($field)
    {
        return new SingleOrderer("DESC",$field);
    }
    
    public function byAscendingId()
    {
        return $this->ascending('id');
    }

    
}