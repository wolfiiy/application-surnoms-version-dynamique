<?php
/**
 * ETML
 * Author: STE
 * Date: December 10th, 2024
 */

require_once('Database.php');

/**
 * Model used to interact with the "t_teacher" table of the database.
 */
class TeacherModel extends Database {
    
    /**
     * Gets a list of all the teachers found in the database, sorted from most
     * to least voted for.
     */
    public function getAllTeachersRanked() {
        $sql = "select * from t_teacher order by teaVotes desc";
        $res = $this -> querySimpleExecute($sql);
        return $this -> formatData($res);
    }
}
?>