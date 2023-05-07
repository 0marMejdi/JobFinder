<?php
class ObjectRepository
{
    /**
     * because MySQL can't accept all types of input, they are formatted:
     ** empty strings,  0 (integers) and false (boolean) are converted to NULL,
     ** and adds backslashes \ to ' to prevent SQL injection
     * 
     * mainly it's for prepared statements with execute() method
     * @param $value
     * @return mixed
     */
    private static function nullable(&$value)
    {
        
        if (!isset($value) or $value == "")
            $value = NULL;
        else if ($value == 0 and !is_string($value))
            $value = NULL;
        elseif(is_bool($value))
            $value = (int) $value;
        elseif (is_string($value)) {
//            $value = str_replace("'", "\'", $value);
        }
        return $value;
    }

    /**
     * because MySQL can't accept all types of input, they are formatted:
     ** adds backslashes \ to ' to prevent SQL injection
     ** adds quotation ' around string types
     ** converts empty strings and 0 integers to "NULL" as string too, so it can be concatenated in query
     *
     * otherwise keeps it (integers, booleans, floats...)
     * mainly it's for non-prepared statements: 
     * use it when value is going to be inserted as it is in query and won't be prepared
     * @param $value
     * @return mixed
     */
    private static function nullableAndQuotable(&$value)
    {
        if (!isset($value) or $value == "")
            $value = "NULL";
        elseif (is_string($value)) {
//            $value = str_replace("'", "\'", $value);
            $value = "'$value'";
        }
        elseif ($value == 0)
            $value = "NULL";
        return $value;
    }

    /**
     * loops through properties of the object, and deduces the column names from the attribute names,
     * and the column values from attribute values,
     * if an attribute is not initialized, it  inserts null instead
     ** ['value'] contains the values to be inserted for every column
     ** ['fields'] each filed contain column names surrounded by ``  and values are matched by index : x['values'][10] is for column = x['fields'][10]
     ** ['placeholders'] contain ? marks as much as the number of values we have
     * @param $object
     * @return array[] : fields, placeholders, values : these 3 arrays are returned in one array
      */

    private static function getFieldAndValuesFromObject($object)
    {
        if ($object==NULL)  return NULL ;
        $fields = []; // an array contains the columns names of the table
        $placeholders = []; // contains '?' marks, as much as the number of arguments I am inserting
        $values = []; // an array contains the values i am inserting
        //loop through object attributes (names and values)
        foreach ($object as $key => $value) {

            // Check if the value is not initialized and insert a NULL variable if it is
            // otherwise it will be surrounded by quotes if it is string type, and will be the same as it is if not;
            self::nullable($value);
            if ($value == NULL)
                continue;
            $fields[] = "`$key`"; //appending column name
            $placeholders[] = "?"; // adding a question mark as much as the number of arguments I am inserting
            $values[] = $value; //appending found value
        }
        return array("fields" => $fields, "placeholders" => $placeholders, "values" => $values);
    }

    /** it reads args like this : each two argument is a couple of key and value, it reads the first argument and knows it's a column name, and the next arguement
     * would be its value, so with these information it can create a where statement to use it later for a sql query and returns a string like this:
     ** WHERE args1 = args2 AND args3 = args4 Etc...
     * if no argument inserted or wrong number of args is inserted, then it returns null
     * 
     * mark that each value will be formatted:
     ** adds backslashes \ to ' to prevent SQL injection for strings
     ** adds quotation ' around string types
     ** converts empty strings and 0 integers to "NULL" as string too, so it can be concatenated in query
     * 
     * for MySQL to accept it
     * @param $args
     * @return string|null
     */
    private static function createWhereStatement(...$args){
        if (!isset($args))
            return NULL;
        if (sizeof($args) % 2 == 1) {
            echo "Error: incorrect number of arguments (remember! key then value and so on)";
            return NULL;
        } else {
            $whereStatement = [];
            $n = sizeof($args);
            for ($i = 0; $i < $n ; $i+=2) {
                $field = $args[$i];
                $value = $args[$i + 1];
                self::nullableAndQuotable($value);
                if ($i == 0)
                    $placeholders[] = "WHERE";
                if ($i != 0)
                    $placeholders[] = "AND";
                $placeholders[] = ($value == "NULL") ?  "$field is $value" : "$field = $value";
            }
        }
        $whereStatement = implode(" ", $whereStatement);
        return $whereStatement;
    }

    /** it reads args like this : each two argument is a couple of key and value, it reads the first argument and knows it's a column name, and the next arguement
     * would be its value, so with these information it can create a where statement to use it later for a sql query with prepare and execute logic and returns a string like this:
     *
     ** WHERE args1 = ? AND args3 = ? Etc...
     * 
     * and for example if a value of args2 has NULL, it will be like this:
     * 
     ** WHERE args1 is ? ...
     * 
     * if no argument inserted or wrong number of args is inserted, then it returns null
     *
     * mark that each value will be formatted:
     ** empty strings,  0 (integers) and false (boolean) are converted to NULL,
     ** and adds backslashes \ to ' to prevent SQL injection
     * 
     * then you will have to use another function to get the values alone and insert them in the query
     * for MySQL to accept it
     * @param $args
     * @return string|null
     */
    private static function createPreparedWhereStatement(...$args){
        if (!isset($args))
            return NULL;
        $n = sizeof($args);

        if ( $n % 2 == 1 ) {
            echo "Errora: incorrect number of arguments (remember! key then value and so on)";
            return NULL;
        } else {
            $whereStatement = [];
            $n = sizeof($args);
            for ($i = 0; $i < $n ; $i+=2) {
                $field = $args[$i];
                $value = $args[$i + 1];
                self::nullableAndQuotable($value);
                if ($i == 0)
                    $whereStatement[] = "WHERE";
                if ($i != 0)
                    $whereStatement[] = "AND";

                $whereStatement[] = ($value == "NULL")? "$field is ?" : "$field = ?";
            }
        }
        $whereStatement = implode(" ", $whereStatement);
        return $whereStatement;
    }

    private static function createPreparedSetStatement(...$args){
        if (!isset($args))
            return NULL;
        $n = sizeof($args);

        if ( $n % 2 == 1 ) {
            echo "Errora: incorrect number of arguments (remember! key then value and so on)";
            return NULL;
        } else {
            $setStatement = [];
            $n = sizeof($args);
            for ($i = 0; $i < $n ; $i+=2) {
                $field = $args[$i];
                $value = $args[$i + 1];
                self::nullableAndQuotable($value);
                if ($i == 0)
                    $setStatement[] = "SET";
                if ($i != 0)
                    $setStatement[] = ",";

                $setStatement[] = "`$field` = ?";
            }
        }
        $setStatement = implode(" ", $setStatement);
        return $setStatement;

    }

    /** it loops through the args like this: each second argument (arg2, arg4...) is the value of the first argument (arg1, arg3...) that are the columns names
     * 
     * so here we are going to keep only the values and return them in an array
     * 
     * and each element of the array is formatted like this because MySQL can't accept all types of input:
     ** empty strings,  0 (integers) and false (boolean) are converted to NULL,
     ** and adds backslashes \ to ' to prevent SQL injection
     * @param $args
     * @return array|null
     */
    private static function getValuesForPreparedStatement(...$args){
        if (!isset($args))
            return NULL;
        $n = sizeof($args);
        if ( $n % 2 == 1 ) {
            echo "Errora in getValuesForPreparedStatement : incorrect number of arguments $n (remember! key then value and so on)";
            return NULL;
        } else {
            $values = [];
            $n = sizeof($args);
            for ($i = 0; $i < $n; $i += 2) {
                $value = $args[$i + 1];
                self::nullable($value);
                $values[]= $value;
            }
            return $values;
        }

    }

    /** it loops through the object properties like this: each property name is the column name and its value is the value of the column
     *
     * so with these information it can create a where statement to use it later for a sql query with prepare and execute logic and returns a string like this:
     *
     ** WHERE property1 = ? AND property2 = ? Etc...
     *
     * and for example if a value of property1 has NULL, it will be like this:
     *
     ** WHERE property1 is ? ...
     *
     * if no argument inserted or wrong number of args is inserted, then it returns null
     *
     * mark that each value will be formatted:
     ** empty strings,  0 (integers) and false (boolean) are converted to NULL,
     ** and adds backslashes \ to ' to prevent SQL injection
     *
     * then you will have to use another function to get the values alone and insert them in the query
     * for MySQL to accept it
     * @param $object
     * @return string|null
     */
    private static function createPreparedWhereStatementFromObject($object){
        if ($object==NULL)  return NULL ;
        $objectFields = self::getFieldAndValuesFromObject($object);
        $values = $objectFields['values'];
        $fields = $objectFields['fields'];
        $placeholders = [];
        $n = sizeof($values);
        for ($i = 0; $i < $n; $i++) {
            $field = $fields[$i];
            $value = $values[$i];
            self::nullableAndQuotable($value);
            if ($i == 0)
                $placeholders[] = "WHERE";
            if ($i != 0)
                $placeholders[] = "AND";

            $placeholders[] =($value == "NULL") ?  "$field is ?" : "$field = ?";
        }
        return implode(" ",$placeholders);
}

    /**
     * this function extracts values of each property from an object, and returns them in an array.
     * the special thing that it returns the values in a way that can be used in a prepared query inside execute() function.
     * because MySQL can't accept all types of input, they are formatted: 
     * empty strings are converted to NULL, 0 (integers) and false (boolean)
     * @param $object
     * @return array|null
     */
    private static function getValuesForPreparedStatementFromObject($object){
        if ($object==NULL)  return NULL ;
        $objectFields = self::getFieldAndValuesFromObject($object);
        $values = $objectFields['values'];
        $newValues=[];
        foreach ($values as $value) {
            self::nullable($value);
            $newValues[] = $value;
        }
        return $newValues;
    }
    /**
     * this function inserts an object into table of a database (which is by default jobfinder database)
     * it loops through properties of the object, and deduces the column name from the attribute name, and the column value from attribute value, if an attribute is not initialized, it  inserts null instead
     * loops through properties of the object, and deduces the column name from the attribute name, and the column value from attribute value, if an attribute is not initialized, it  inserts null instead
     * @param $table_name string name of the table to insert data into
     * @param $object object object to insert
     * @return boolean true if it was successful, false if problem occurred
     */

    static function insert($table_name, $object)
    {
        if ($object==NULL)  return false ;
        try {
            $db = ConnexionBD::GetInstance();
        } catch (Exception $exception) {
            sendError("cannot_connect_to_database","login");
        }
        try {
            $objectFields = self::getFieldAndValuesFromObject($object);
            // gathering all fields names and placeholders together with , as separator for the query name
            $fields = implode(", ", $objectFields['fields']);
            $placeholders = implode(", ", $objectFields['placeholders']);
            // preparing and executing the query
            $values= self::getValuesForPreparedStatementFromObject($object);
            $SQLQuery = $db->prepare("INSERT INTO `$table_name` ($fields) VALUES ($placeholders)");
            $SQLQuery->execute($values);

        } catch (PDOException  $exception) {
            return false;
        }
        return true;
    }
    //unnecessary function
    /*static function updateIdEqual($table_name, $idFieldName, $idValue, $fieldToChange, $newValue)
    {
        $db = ConnexionBD::GetInstance();
        self::nullable($idValue);
        self::nullable($newValue);

        $SQLQuery = $db->prepare("UPDATE $table_name SET $fieldToChange = ? WHERE $idFieldName = ? ;");

        $SQLQuery->execute(array($newValue, $idValue));

    }

    static function updateOneField($table_name, $object, $fieldToChange, $newValue)
    {
        if ($object==NULL)  return NULL ;

        $db = ConnexionBD::GetInstance();
        self::nullable($newValue);

        $where = self::createPreparedWhereStatementFromObject($object);
        $values= self::getValuesForPreparedStatementFromObject($object);

        $SQLQuery = $db->prepare("UPDATE $table_name SET $fieldToChange = ? $where ;" );
        $SQLQuery->execute(array_merge(array($newValue),$values));

    }*/

    static function update($table_name, $object, ...$args)
    {
        if ($object==NULL)  return NULL ;

        $db = ConnexionBD::GetInstance();
        $updateValues = self::getValuesForPreparedStatement(...$args);
        $objectValues = self::getValuesForPreparedStatementFromObject($object);
        $setClause = self::createPreparedSetStatement(...$args);
        $whereClause = self::createPreparedWhereStatementFromObject($object);

        $query = "UPDATE $table_name $setClause $whereClause";

        $SQLQuery = $db->prepare($query);

        $SQLQuery->execute(array_merge($updateValues,$objectValues));
    }

    /**
     * fetches all the lines that verifies entered condition like where statement
     *
     * SQL query is like: select * from $tableName where ...=... and ...=... and ...etc
     * @param $tableName
     * @param ...$args mixed couples of field-value for the WHERE statement
     * @return array|null null if no row found
     *
     * otherwise an array stdObject Type
     */
    static function selectEqualsAnd($tableName, ...$args)
    {
        $db = ConnexionBD::GetInstance();
        $whereStatement = self::createPreparedWhereStatement(...$args);
        $query = "SELECT * from `$tableName` $whereStatement ";
        $response = $db->prepare($query);
        $response->execute(self::getValuesForPreparedStatement(...$args));
        $rows = $response->fetchAll(PDO::FETCH_OBJ);
        if ($rows == false)
            return NULL;
        else return $rows;


    }

    static function deleteWhere($tableName, ...$args)
    {
        $db = ConnexionBD::GetInstance();
        $whereStatemnt = self::createPreparedWhereStatement(...$args);
        $query = "DELETE from `$tableName` $whereStatemnt ";
        $response = $db->prepare($query);
        $response->execute(self::getValuesForPreparedStatement(...$args));
    }

    static function delete($tableName,$object){
        if ($object==NULL)  return NULL ;
        $db = ConnexionBD::GetInstance();
        $whereClause = self::createPreparedWhereStatementFromObject($object);
        $values =self::getValuesForPreparedStatementFromObject($object);
        $query = "DELETE from `$tableName` $whereClause ";
        $response = $db->prepare($query);
        $response->execute($values);


    }
    public static function modifyAttributeAndDatabase(string $tablename, $obj, string $attributeName, $newValue) //TODO: Should be redefined for sub-classes
    {

        if (property_exists($obj, $attributeName)) {
            ObjectRepository::update($tablename,$obj,$attributeName,$newValue);
            $obj->{$attributeName} = $newValue;

            return true;
        } else {
            return false;
        }
    }
}

