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
                        <a href="#">
                            <img height="20em" src="../img/edit.png" alt="edit">
                        </a>
                        <a href="javascript:confirmDelete()">
                            <img height="20em" src="../img/delete.png" alt="delete">
                        </a>
                        <a href="#">
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
}
?>