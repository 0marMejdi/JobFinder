<?php
include_once "Repository.php";
class CompanyRepository extends Repository{
    public static string $tableName = "Company";
    public static string $className = "Company";

}
//class CompanyRepository extends ObjectRepository
//{
//   //redo all the code of JobSeekerRepository but instead of JobSeeker use Company
//    static function insertCompany($company){
//        return ObjectRepository::insert("Companies",$company);
//    }
//    static function updateCompanyObject($companyObject, ... $args){
//        ObjectRepository::update("companies",$companyObject,$args);
//    }
//    static function updateCompanyByID( $idFieldName, $idValue, $fieldToChange, $newValue){
//        ObjectRepository::updateIdEqual("companies", $idFieldName, $idValue, $fieldToChange, $newValue);
//    }
//    static function getCompaniesBy_And(...$CoupleField_Value){
//        $objArray = ObjectRepository::selectEqualsAnd("companies",...$CoupleField_Value);
//        if($objArray==NULL)
//            return NULL;
//        $companyArray = objectToClassArray($objArray,"Company");
//        return $companyArray;
//    }
//    static function getOnlyCompanyBy_And(...$CoupleField_Value):null|Company{
//        $company = self::getCompaniesBy_And(...$CoupleField_Value);
//        if ( $company != NULL)
//            return $company[0];
//        else
//            return NULL;
//    }
//    static function deleteCompany($object){
//        ObjectRepository::delete("companies",$object);
//    }
//    static function deleteCompaniesWhere(...$CouplesField_Value)
//    {
//        return parent::deleteWhere("companies", ...$CouplesField_Value);
//    }
//    static function isExistingCompanyWhere(...$CouplesField_Value){
//        return parent::isExistingWhere("companies", ...$CouplesField_Value);
//    }
//    // next function
//    static function getCompaniesBy_Or(...$CoupleField_Value){
//        $objArray = ObjectRepository::selectEqualsOr("companies",...$CoupleField_Value);
//        if($objArray==NULL)
//            return NULL;
//        $companyArray = objectToClassArray($objArray,"Company");
//        return $companyArray;
//    }
//
//}