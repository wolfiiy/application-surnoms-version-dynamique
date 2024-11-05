<?php
class Writer {
    static function writeAllTeacher($teachers) {
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

        $table .= <<< HTML
                </tbody>
            </table>
        HTML;

        return $table;
    }

    /**
     * Writes an array of strings as a list.
     */
    static function writeAsList($array, $color) {
        $html = "";
        $html .= "<ul>";

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