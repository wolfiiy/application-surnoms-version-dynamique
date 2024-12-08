<?php
/**
 * Author: STE
 * Date: November 11th, 2024
 * Description: Writes various things on the page.
 */

class Writer {
    /**
     * Writes a list of all teachers found in the database. The list allows
     * authorized users to view, edit and/or delete a teacher's details.
     */
    static function writeAllTeacher() {
        $db = new Database();
        $teachers = $db -> getAllTeachers();

        // Table header
        $table = <<< HTML
            <table>
                <thead>
                    <tr>
                        <th>Nom complet</th>
                        <th>Surnom</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
        HTML;

        // Teacher(s) rows
        foreach ($teachers as $t) {
            $table .= <<< HTML
                <tr>
                    <td>
                        {$t['teaFirstname']} {$t['teaName']}
                    </td>
                    <td>
                        {$t['teaNickname']}
                    </td>
                    <td class="containerOptions">
                        <a href="editTeacher.php?id={$t['idTeacher']}">
                            <img height="20em" src="../img/edit.png" alt="edit">
                        </a>
                        <a href="javascript:confirmDelete({$t['idTeacher']})">
                            <img height="20em" src="../img/delete.png" alt="delete">
                        </a>
                        <a href="detailTeacher.php?id={$t['idTeacher']}">
                            <img height="20em" src="../img/detail.png" alt="detail">
                        </a>
                    </td>
                </tr>
            HTML;
        }    

        // End the table
        $table .= <<< HTML
                </tbody>
            </table>
        HTML;

        echo $table;
    }

    /**
     * Given an array of strings and a color, writes a list on the screen.
     * 
     * @param array $array An array containing all strings to be written on the
     * screen.
     * @param $color The color in which to write the strings from the 'array'
     * array. The color can be any valid value for the HTML 'color' attribute.
     */
    static function writeAsList($array, $color) {
        $html = "";
        $html .= "<ul>";

        // Loop over the strings
        foreach ($array as $str) {
            $html .= '<li style="color:' . $color . ';">';
            $html .= $str;
            $html .= "</li>";
        }

        $html .= "</ul>";

        echo $html;
    }
}
?>