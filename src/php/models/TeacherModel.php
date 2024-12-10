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
    
    /* 
     * READ OPERATIONS
     */

    /**
     * Gets a list of all the teachers found in the database.
     * 
     * @return array An associative array containing all teachers and their
     * details.
     */
    public function getAllTeachers() {
        // Execute an SQL query that requests all teachers
        $sql = "select * from t_teacher";
        $res = $this -> querySimpleExecute($sql);

        // Return a formatted associative array
        return $this -> formatData($res);
    }

    /**
     * Gets a list of all the teachers found in the database, sorted from most
     * to least voted for.
     * 
     * @return array A list of all teachers, sorted from most to least voted 
     * for.
     */
    public function getAllTeachersRanked() {
        $sql = "select * from t_teacher order by teaVotes desc";
        $res = $this -> querySimpleExecute($sql);
        return $this -> formatData($res);
    }

    /**
     * Retrieves detailed information on a specific teacher, given their ID.
     * 
     * @param int $id The unique ID of the teacher..
     * @return array An associative array that contains details about the
     * specified teacher.
     */
    public function getOneTeacher(int $id) {
        // Execute an SQL query retrieving a teacher given their ID
        $sql = "select * from t_teacher where idTeacher = " . $id;
        $res = $this -> querySimpleExecute($sql);

        // Return a formatted array containing the full teacher details.
        $teachers = $this -> formatData($res);
        return $teachers[0];
    }

    /*
     * WRITE OPERATIONS
     */

    /**
     * Inserts a new teacher in the database.
     * 
     * @param $data An array that contains the teacher's data.
     */
    public function insertTeacher(array $data) {
        // SQL query to that inserts a new teacher to the database
        $sql = <<< SQL
            insert into
                t_teacher 
                (teaFirstname, teaName, teaGender, teaNickname, teaOrigine, 
                fkSection)
            values
                (:teaFirstname, :teaName, :teaGender, :teaNickname, 
                :teaOrigine, :fkSection)
        SQL;

        // Map placeholders to values from the data array.
        $binds = array(
            ':teaFirstname' => $data['firstname'],  
            ':teaName' => $data['lastname'],        
            ':teaGender' => $data['gender'],        
            ':teaNickname' => $data['nickname'],    
            ':teaOrigine' => $data['origin'],       
            ':fkSection' => $data['section']        
        );

        // Executes the query
        $this -> queryPrepareExecute($sql, $binds);
    }

    /**
     * Updates informatin regarding a specific teacher.
     * 
     * @param $data An array that contains the teacher's data.
     */
    public function editTeacher(array $data) {
        // SQL statement that, given the ID of a teacher, updates all fields.
        $sql = <<< SQL
            update 
                t_teacher
            set 
                teaFirstname = :teaFirstname,
                teaName = :teaName,
                teaGender = :teaGender,
                teaNickname = :teaNickname,
                teaOrigine = :teaOrigine,
                fkSection = :fkSection
            where 
                idTeacher = :idTeacher;
        SQL;

        // Map placeholders to values from the data array.
        $binds = array(
            ':idTeacher' => $data['id'],
            ':teaFirstname' => $data['firstname'],
            ':teaName' => $data['lastname'],
            ':teaGender' => $data['gender'],
            ':teaNickname' => $data['nickname'],
            ':teaOrigine' => $data['origin'],
            ':fkSection' => $data['section']
        );

        // Execute the query
        $this -> queryPrepareExecute($sql, $binds);
    }

    /*
     * DELETE OPERATIONS
     */
    /**
     * Given an ID, removes the corresponding teacher from the database.
     * @param int $id The unique ID of the teacher to be removed.
     */
    public function removeTeacher(int $id) {
        $sql = <<< SQL
            delete from t_teacher
            where idTeacher = {$id};
        SQL;

        $this -> querySimpleExecute($sql);
        header("Location: index.php");
    }

    /**
     * Lets the user vote for a teacher.
     * @param int $id Unique ID of the teacher.
     */
    public function vote(int $id) {
        $sql = <<< SQL
            update t_teacher
            set teaVotes = teaVotes + 1
            where idTeacher = {$id};
        SQL;

        $this -> querySimpleExecute($sql);
    }
}
?>