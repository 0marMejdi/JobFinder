<?php
class ObjectRepository
{
    /**
     * if it is empty string it will make it NULL for the database
     *
     * use it only when the value is going to be prepared
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
        return $value;
    }

    /**
     * adds quotation ' to string types
     *
     * make it NULL if it is empty string
     *
     * otherwise keeps it (integers, booleans, floats...)
     *
     * use it when value is going to be inserted as it is in query and won't be prepared
     * @param $value
     * @return mixed
     */
    private static function nullableAndQuotable(&$value)
    {
        if (!isset($value) or $value == "")
            $value = "NULL";
        elseif (is_string($value))
            $value = "'$value'";
        elseif ($value == 0)
            $value = "NULL";
        return $value;
    }

    /**
     * loops through properties of the object, and deduces the column names from the attribute names,
     * and the column values from attribute values,
     * if an attribute is not initialized, it  inserts null instead
     * @param $object
     * @return array[] : fields, placeholders, values : these 3 arrays are returned in one array
     *
     * fields contain column names surrounded by ``
     *
     * value contains the values to be inserted for every column
     *
     * fields and values are coincided by index : x['values'][10] is for column = x['fields'][10]
     *
     * placeholders contain ? marks as much as the number of values we have
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

    private static function createWhereStatement($args){
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
    private static function createPreparedWhereStatement($args){
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
    private static function getValuesForPreparedStatement($args){
        if (!isset($args))
            return NULL;
        $n = sizeof($args);
        if ( $n % 2 == 1 ) {
            echo "Errora: incorrect number of arguments (remember! key then value and so on)";
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
    private static function getValuesForPreparedStatementFromObject($object){
        if ($object==NULL)  return NULL ;
        $objectFields = self::getFieldAndValuesFromObject($object);
        $values = $objectFields['values'];
        $newValues=[];
        foreach ($values as $value) {
            self::nullable($value);
            $newValues[]=$value;
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
            return false;
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
            return $exception->getMessage();
        }
        return true;
    }

    static function updateIdEqual($table_name, $idFieldName, $idValue, $fieldToChange, $newValue)
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

    }

    static function update($table_name, $object, ...$args)
    {
        if ($object==NULL)  return NULL ;

        $db = ConnexionBD::GetInstance();
        $objectFields = self::getFieldAndValuesFromObject($object);

        $values = $objectFields['values'];
        $fields = $objectFields['fields'];

        $setClause = '';
        $whereClause = '';
        $updateValues = [];
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

            $placeholders[] = ($value == "NULL") ? "$field is $value" : "$field = $value";

            $values[] = $value;

//            echo "where clause " . implode (" ",$placeholders) . "<br>";
        }

        $whereClause = implode(" ", $placeholders);
        for ($i = 0; $i < sizeof($args); $i += 2) {
            $field = $args[$i];
            $newValue = $args[$i + 1];
            self::nullable($newValue);
            $setClause .= "`$field` = ?, ";
            $updateValues[] = $newValue;
//            echo "set cause " . $setClause . "<br>";
        }

        $setClause = rtrim($setClause, ', ');
        $whereClause = rtrim($whereClause, ' AND ');

        $query = "UPDATE $table_name SET $setClause $whereClause";

        $SQLQuery = $db->prepare($query);
        $SQLQuery->execute($updateValues);
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
        $whereStatement = self::createPreparedWhereStatement($args);
        $query = "SELECT * from `$tableName` $whereStatement ";
        $response = $db->prepare($query);
        $response->execute(self::getValuesForPreparedStatement($args));
        $rows = $response->fetchAll(PDO::FETCH_OBJ);
        if ($rows == false)
            return NULL;
        else return $rows;


    }

    static function deleteWhere($tableName, ...$args)
    {
        $db = ConnexionBD::GetInstance();
        $whereStatemnt = self::createPreparedWhereStatement($args);
        $query = "DELETE from `$tableName` $whereStatemnt ";
        $response = $db->prepare($query);
        $response->execute(self::getValuesForPreparedStatement($args));
        $rows = $response->fetchAll(PDO::FETCH_OBJ);
        if ($rows == false)
            return NULL;
        else return $rows;
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
}
