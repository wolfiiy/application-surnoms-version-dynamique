<?php
/**
 * Author: STE 
 * Date: September 30th, 2024
 */

include('writer.php');

/**
 * Handles database interactions.
 */
class Database {

    /**
     * Connection to the database.
     */
    private $connector;

    /**
     * Creates a new Database instance.
     * 
     * Establishes a connection to a database using the provided configuration.
     * The configuration file is located at the root of the application and is
     * named 'config.json'. It should contain the following keys:
     * - DBMS: the database management system.
     * - DB_HOST: the hostname or the IP address of the database server.
     * - DB_NAME: the name of the database to use.
     * - DB_CHARSET: the character set to use.
     * - DB_USER: the username for database authentification.
     * - DB_PASSWORD: the password for database authentification. 
     * 
     * @throws Exception If there is an error reading the config file.
     * @throws PDOException If the connection to the database fails.
     */
    public function __construct(){
        try {
            // Attempt to read the config file
            $configFile = file_get_contents('../../config.json');
            $conf = json_decode($configFile, true);

            // Create the DSN
            $dsn = $conf['DBMS'] . ":";
            $dsn .= "host=" . $conf['DB_HOST'] . ";";
            $dsn .= "dbname=" . $conf['DB_NAME'] . ";";
            $dsn .= "charset=" . $conf['DB_CHARSET'];
        } catch (Exception $e) {
            die ('An error occured while reading the config file.'
                . $e -> getMessage());
        }

        try {
            // Attempt to establish a connection to the database
            $this -> connector = new PDO(
                $dsn,
                $conf['DB_USER'],
                $conf['DB_PASSWORD']
            );
        } catch (PDOException $e) {
            die('Error: ' . $e -> getMessage());
        }
    }

    /**
     * Prepares and executes a simple query.
     * @param string $query The query to execute.
     * @return PDOStatement|false an associative array containing the result 
     * of the query, or false if it did not go through.
     */
    private function querySimpleExecute(string $query){
        try {
            return $this -> connector -> query($query);
        } catch (PDOException $e) {
            error_log("An error occured. " . $e -> getMessage());
            return false;
        }
    }

    /**
     * Prepares, sanitizes and executes a query.
     * @param string $query The query to be executed.
     * @param array $binds An array containing all binds related to the query.
     * @return PDOStatement|false an associative array containing the result
     * of the query if it succeeded, false otherwise.
     */
    private function queryPrepareExecute(string $query, $binds){
        try {
            $req = $this -> connector -> prepare($query);
            foreach ($binds as $name => $value) {
                // binds['teaname'] = 'teachers name';
                $req -> bindValue($name, $value, PDO::PARAM_STR);
            }

            if ($req -> execute()) return $req;
            else return false;
        } catch (PDOException $e) {
            error_log("An error occured. " . $e -> getMessage());
        }
    }

    /**
     * TODO: � compl�ter
     */
    private function formatData($req){

        // TODO: traiter les donn�es pour les retourner par exemple en tableau associatif (avec PDO::FETCH_ASSOC)
    }

    /**
     * TODO: � compl�ter
     */
    private function unsetData($req){

        // TODO: vider le jeu d�enregistrement
    }

    /**
     * Gets a list of all teachers registered in the database.
     * @return string a table containing all teachers.
     */
    public function getAllTeachers(){
        $sql = "select * from t_teacher";
        $res = $this -> querySimpleExecute($sql);
        $teachers = $res -> fetchAll(PDO::FETCH_ASSOC);
        return Writer::writeAllTeacher($teachers);
    }

    /**
     * Gets information on a teacher given an ID.
     * @param int $id ID of the teacher.
     * @return array an associative array that contains the details about the
     * queried teacher.
     */
    public function getOneTeacher($id) {
        // Prepare / simple?
        $sql = "select * from t_teacher where idTeacher = " . $id;
        $res = $this -> querySimpleExecute($sql);
        /*$sql = "select * from t_teacher where idTeacher = :idTeacher";
        $binds = array(':idTeacher' => $id);
        $res = $this -> queryPrepareExecute($sql, $binds);*/
        $teachers = $res -> fetchAll(PDO::FETCH_ASSOC);
        return $teachers[0];
    }

    /**
     * Gets the correct field given an ID.
     * @param int $id ID fo the field.
     * @return array an associative array that contains the field of study and
     * its ID.
     */
    public function getSectionById($id) {
        $sql = "select * from t_section where idSection = $id";
        $res = $this -> querySimpleExecute($sql);
        return $res -> fetchAll(PDO::FETCH_ASSOC)[0];
    }

    /**
     * Gets a list of all sections.
     * @return array an associative array that contains all sections found in 
     * the database.
     */
    public function getSectionList() {
        return $this -> querySimpleExecute("select * from t_section") 
                     -> fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Inserts a new teacher to the database.
     * @param $data An array that contains the teacher's data. TODO
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
        header("Location: index.php");
    }

    /**
     * Updates a teacher's information and redirects the user to the home page.
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
        header("Location: index.php");
    }

    /**
     * Given an ID, will remove the corresponding teacher from the database.
     */
    public function removeTeacher(int $id) {
        $sql = <<< SQL
            delete from t_teacher
            where idTeacher = {$id};
        SQL;

        $this -> querySimpleExecute($sql);
        header("Location: index.php");
    }
}


?>