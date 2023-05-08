<?php
include_once "ObjectRepository.php";
include_once "JobSeeker.php";
include_once "frags/classConverter.php";
class JobSeekerRepository extends Repository{
    public static string $className="JobSeeker";
    public static string $tableName="JobSeeker";
}
//class JobSeekerRepository {
//    public static  string $tableName="JobSeeker";
//    public static string $className = "JobSeeker";
//    static function insert($user){
//        return ObjectRepository::insert(self::$tableName,$user);
//    }
//
//    static function update($jobSeeker, ... $args){
//        ObjectRepository::update(self::$tableName,$jobSeeker,$args);
//    }
//
//    /**
//     * takes the name of the column and its value to find the object in database and replaces a column with a new value
//     * @param $idFieldName string of the column to find the object
//     * @param $idValue  mixed of the column to find the object
//     * @param $fieldToChange string of the column to change its value
//     * @param $newValue mixed value of the column
//     * @return void
//     */
//    static function updateByID( $idFieldName, $idValue, $fieldToChange, $newValue){
//        ObjectRepository::updateIdEqual(self::$tableName, $idFieldName, $idValue, $fieldToChange, $newValue);
//    }
//    /**
//     * @param $CoupleField_Value
//     * @return JobSeeker[]|null
//     *
//     * null if no row found
//     *
//     * otherwise an array of Users
//     */
//    static function getAllWhere(...$CoupleField_Value){
//        $objArray = ObjectRepository::selectEqualsAnd(self::$tableName,...$CoupleField_Value);
//        if($objArray==NULL)
//            return NULL;
//        return objectToClassArray($objArray,self::$className);
//    }
//    /**
//     * null if no row found
//     *
//     * otherwise one user
//     * @param $CoupleField_Value
//     * @return null|JobSeeker
//     */
//    static function getOneWhere(...$CoupleField_Value):null|JobSeeker{
//        $object = self::getAllWhere(...$CoupleField_Value);
//        if ( $object != NULL)
//            return $object[0];
//        else
//            return NULL;
//
//    }
//
//    /**
//     * finds the given object in the database and deletes it
//     * @param $object object to delete
//     * @return void
//     */
//    static function delete($object){
//        ObjectRepository::delete(self::$tableName,$object);
//    }
//
//    /**
//     * finds one or more objects (maybe none) in database through each field and its value and deletes if found
//     * @param ...$CouplesField_Value
//     * @return void
//     */
//    static function deleteWhere(...$CouplesField_Value)
//    {
//        ObjectRepository::deleteWhere(self::$tableName, ...$CouplesField_Value);
//    }
//
//    /**
//     * checks if there is a row in the database that has the given field and value
//     * @param ...$CouplesField_Value
//     * @return bool
//     */
//    static function isExistsWhere(...$CouplesField_Value):bool{
//        return (self::getAllWhere(...$CouplesField_Value)!=NULL);
//    }
//}