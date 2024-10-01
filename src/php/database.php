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
     * Connects to the database using a PDO object.
     * @throws PDOException if an error occured when connecting to the database.
     */
    public function __construct(){
        try {
            $this -> connector = new PDO(
                'mysql:host=localhost:6033;dbname=db_nickname;charset=utf8',
                'root',
                'root'
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
     * TODO: � compl�ter
     */
    public function getOneTeacher($id){
        // TODO: r�cup�re la liste des informations pour 1 enseignant
        // TODO: avoir la requ�te sql pour 1 enseignant (utilisation de l'id)
        // TODO: appeler la m�thode pour executer la requ�te
        // TODO: appeler la m�thode pour avoir le r�sultat sous forme de tableau
        // TODO: retour l'enseignant
    }

    // + tous les autres m�thodes dont vous aurez besoin pour la suite (insertTeacher ... etc)
}


?>