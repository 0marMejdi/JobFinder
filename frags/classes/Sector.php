<?php

class Sector
{
    public int $id;
    public string $description;
    public function __construct( $id="", $description=""  )
    {
        $this->id = $id;
        $this->description = $description;
    }

    public function getSectors(): array{
        $sectorList = ObjectRepository::selectEqualsAnd("Sector");
        return objectToClassArray($sectorList, "Sector");
    }
    public function getSubSectorsOf(int $sectorID): array{
        $sectorList = ObjectRepository::selectEqualsAnd("subSector", "sectorID", $sectorID);
        return objectToClassArray($sectorList, "Sector");
    }

}