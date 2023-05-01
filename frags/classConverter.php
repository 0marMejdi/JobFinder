<?php
/**
 * @param $object
 * @param $className
 * @return $ClassName
 */
function objectToClass($object, $className) {
    // Get an array of object properties
    $properties = get_object_vars($object);

    // Create a new instance of the class
    $classInstance = new $className();

    // Loop through the object properties and set them on the class instance
    foreach ($properties as $property => $value) {
        // Check the type of the property and assign a default value if the value is null
        if (is_string($classInstance->$property) && $value === null) {
            $classInstance->$property = "";
        } elseif ((is_int($classInstance->$property) || is_float($classInstance->$property)) && $value === null) {
            $classInstance->$property = 0;
        } elseif (is_bool($classInstance->$property) && $value === null) {
            $classInstance->$property = false;
        } elseif (is_bool($classInstance->$property) && $value === 1) {
            $classInstance->$property = true;
        } else {
            $classInstance->$property = $value;
        }
    }

    // Return the new class instance
    return $classInstance;
}

/**
 * @param $objectArray
 * @param $className
 * @return $className[] array of object with classname entered type
 */
function objectToClassArray($objectArray, $className){
    if($objectArray==NULL)
        return NULL;
    $classArray = [];
    foreach ($objectArray as $object){
        $classObject = objectToClass($object,$className);
        $classArray[] = $classObject;

    }
    return $classArray;
}
