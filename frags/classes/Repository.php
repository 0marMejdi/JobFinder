<?php
include_once "allFrags.php";
class Repository {
    public static  string $tableName="";
    public static string $className = "";
    static function insert($object){
        return ObjectRepository::insert(static::$tableName,$object);
    }

    static function update($object, ... $args){
        ObjectRepository::update(static::$tableName,$object,$args);
    }

    /**
     * takes the name of the column and its value to find the object in database and replaces a column with a new value
     * @param $idFieldName string of the column to find the object
     * @param $idValue  mixed of the column to find the object
     * @param $fieldToChange string of the column to change its value
     * @param $newValue mixed value of the column
     * @return void
     */
    static function updateByID( $idFieldName, $idValue, $fieldToChange, $newValue){
        ObjectRepository::updateIdEqual(static::$tableName, $idFieldName, $idValue, $fieldToChange, $newValue);
    }
    /**
     * @param $CoupleField_Value
     * @return object[]|null
     *
     * null if no row found
     *
     * otherwise an array of Users
     */
    static function getAllWhere(...$CoupleField_Value){
        $objArray = ObjectRepository::selectEqualsAnd(static::$tableName,...$CoupleField_Value);
        if($objArray==NULL)
            return NULL;
        return objectToClassArray($objArray,static::$className);
    }
    /**
     * null if no row found
     *
     * otherwise one user
     * @param $CoupleField_Value
     *
     */
    static function getOneWhere(...$CoupleField_Value):null|object{
        $object = static::getAllWhere(...$CoupleField_Value);
        if ( $object != NULL)
            return $object[0];
        else
            return NULL;

    }

    /**
     * finds the given object in the database and deletes it
     * @param $object object to delete
     * @return void
     */
    static function delete($object){
        ObjectRepository::delete(static::$tableName,$object);
    }

    /**
     * finds one or more objects (maybe none) in database through each field and its value and deletes if found
     * @param ...$CouplesField_Value
     * @return void
     */
    static function deleteWhere(...$CouplesField_Value)
    {
        ObjectRepository::deleteWhere(static::$tableName, ...$CouplesField_Value);
    }

    /**
     * checks if there is a row in the database that has the given fields and values
     * @param ...$CouplesField_Value
     * @return bool
     */
    static function doesExist(...$CouplesField_Value):bool{
        return (static::getAllWhere(...$CouplesField_Value)!=NULL);
    }
}
