<?php

include_once "ObjectRepository.php";
include_once "Employer.php";
include_once "frags/classConverter.php";

class EmployerRepository extends ObjectRepository
{

    static function insertEmployer($employer)
    {
        return ObjectRepository::insert("Employers", $employer);
    }

    static function updateEmployerObject($employerObject, ...$args)
    {
        ObjectRepository::update("Employers", $employerObject, $args);
    }

    static function updateEmployerByID($idFieldName, $idValue, $fieldToChange, $newValue)
    {
        ObjectRepository::updateIdEqual("employers", $idFieldName, $idValue, $fieldToChange, $newValue);
    }

    /**
     * @param $CoupleField_Value
     * @return Employer[]|null
     *
     * null if no row found
     *
     * otherwise an array of Employers
     */
    static function getEmployersBy_And(...$CoupleField_Value)
    {
        $objArray = ObjectRepository::selectEqualsAnd("Employers", ...$CoupleField_Value);
        if ($objArray == NULL)
            return NULL;
        $employerArray = objectToClassArray($objArray, "Employer");
        return $employerArray;
    }

    /**
     * null if no row found
     *
     * otherwise one employer
     * @param $CoupleField_Value
     * @return null|Employer
     */
    static function getOnlyEmployerBy_And(...$CoupleField_Value): null|Employer
    {
        $employer = self::getEmployersBy_And(...$CoupleField_Value);
        if ($employer != NULL)
            return $employer[0];
        else
            return NULL;

    }

    static function deleteEmployer($object)
    {
        ObjectRepository::delete("employers", $object);
    }

    static function deleteEmployersWhere(...$CouplesField_Value)
    {
        return parent::deleteWhere("Employers", ...$CouplesField_Value);
    }
    static function isExistingEmployerWhere(...$CouplesField_Value){
        $isit = (EmployerRepository::getOnlyEmployerBy_And(...$CouplesField_Value)!=NULL);
        return $isit;
    }
}