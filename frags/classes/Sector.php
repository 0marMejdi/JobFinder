<?php

class Sector
{
    public int $id;
    public string $description;
    public object $subSectors;
    public function __construct( $id=0, $description=""  )
    {
        $this->id = $id;
        $this->description = $description;
    }

    public static function getSectors(): array{
        $sectorList = ObjectRepository::selectEqualsAnd("Sector");
        return objectToClassArray($sectorList, "Sector");
    }
    public static function getSubSectorsOf(int $sectorID): array
    {
        $sectorList = ObjectRepository::selectEqualsAnd("subSector", "sectorID", $sectorID);
        $subSectorList = [];
        foreach ($sectorList as $subSectorElement) {
            $subSectorList[] = new Sector($subSectorElement->id, $subSectorElement->description);
        }
        return $subSectorList;
//        return objectToClassArray($subSectorList, "Sector");
    }



}
?>
<script>

</script>
}
class SubSector
{
    public int $id;
    public string $description;
}
