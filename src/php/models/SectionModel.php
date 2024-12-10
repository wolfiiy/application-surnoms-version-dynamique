<?php
/**
 * ETML
 * Author: STE
 * Date: December 10th, 2024
 */

require_once('Database.php');

class SectionModel extends Database {
    
    /**
     * Finds the corresponding section given an ID.
     * 
     * @param int $id The unique ID of the section.
     * @return array An associative array that contains the field of study and
     * its unique ID.
     */
    public function getSectionById(int $id) {
        $sql = "select * from t_section where idSection = $id";
        $res = $this -> querySimpleExecute($sql);
        return $res -> fetchAll(PDO::FETCH_ASSOC)[0];
    }

    /**
     * Gets a list of all sections found in the database.
     * 
     * @return array An associative array that contains all sections found in 
     * the database.
     */
    public function getSectionList() {
        // SQL query string that retrives all sections
        $sql = "select * from t_section";

        // Executes and format the query
        return $this -> formatData(
            $this -> querySimpleExecute($sql)
        );
    }
}
?>