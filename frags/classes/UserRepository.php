<?php
include_once "ObjectRepository.php";
include_once "User.php";
include_once "frags/classConverter.php";
class UserRepository extends ObjectRepository {

    static function insertUser($user){
        return ObjectRepository::insert("Users",$user);
    }

    static function updateUserObject($userObject, ... $args){
        ObjectRepository::update("Users",$userObject,$args);
    }

    static function updateUserByID( $idFieldName, $idValue, $fieldToChange, $newValue){
        ObjectRepository::updateIdEqual("users", $idFieldName, $idValue, $fieldToChange, $newValue);
    }

    /**
     * @param $CoupleField_Value
     * @return User[]|null
     *
     * null if no row found
     *
     * otherwise an array of Users
     */
    static function getUsersBy_And(...$CoupleField_Value){
        $objArray = ObjectRepository::selectEqualsAnd("Users",...$CoupleField_Value);
        if($objArray==NULL)
            return NULL;
        $userArray = objectToClassArray($objArray,"User");
        return $userArray;
    }

    /**
     * null if no row found
     *
     * otherwise one user
     * @param $CoupleField_Value
     * @return null|User
     */
    static function getOnlyUserBy_And(...$CoupleField_Value):null|User{
        $user = self::getUsersBy_And(...$CoupleField_Value);
        if ( $user != NULL)
            return $user[0];
        else
            return NULL;

    }

    static function deleteUser($object){
        ObjectRepository::delete("users",$object);
    }

    static function deleteUsersWhere(...$CouplesField_Value)
    {
        return parent::deleteWhere("Users", ...$CouplesField_Value);
    }
}