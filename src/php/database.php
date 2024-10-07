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
     * TODO: � compl�ter
     */
    private function queryPrepareExecute($query, $binds){
        
        // TODO: permet de pr�parer, de binder et d�ex�cuter une requ�te (select avec where ou insert, update et delete)
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
        $sql = "select * from t_teacher where idTeacher = " . $id;
        $res = $this -> querySimpleExecute($sql);
        $details = $res -> fetchAll(PDO::FETCH_ASSOC);
        return $details;
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
        return $res -> fetchAll(PDO::FETCH_ASSOC);
    }

    // + tous les autres m�thodes dont vous aurez besoin pour la suite 
    // (insertTeacher ... etc)
}


?>