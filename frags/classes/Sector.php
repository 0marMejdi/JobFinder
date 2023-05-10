<?php

class Sector
{
    public int $id;
    public string $description;
    public array $subSectors;
    public function __construct(  )
    {
        $this->id=0;
        $this->description="";
        $this->subSectors=[];
    }
    public static function getSector($id){
        $sectorList = ObjectRepository::selectEqualsAnd("Sector","id",$id);
        $sectorList =  objectToClassArray($sectorList,"Sector");
        $sectorList[0]->subSectors=self::getSubSectorsOf($id);
        return $sectorList[0];
    }

    public static function getSectors(): array{
        $sectorList = ObjectRepository::selectEqualsAnd("Sector");
        foreach ($sectorList as $el){
            $el->subSectors=self::getSubSectorsOf($el->id);
        }
        return objectToClassArray($sectorList, "Sector");
    }
    public static function getSubSectorsOf(int $sectorID): array
    {
        $sectorList = ObjectRepository::selectEqualsAnd("subSector", "sectorID", $sectorID);
        $subSectorList = [];
        foreach ($sectorList as $subSectorElement) {
            $subSectorList[] = new SubSector($subSectorElement->id,$subSectorElement->description);
        }
        return $subSectorList;
//        return objectToClassArray($subSectorList, "Sector");
    }



}
?>
<script>

</script>
<?php
class SubSector
{
    public int $id;
    public string $description;
    public function __construct($id=0,$description=""){
        $this->id =$id;
        $this->description = $description;
    }

}
?>