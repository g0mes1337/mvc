<?php


class Model_Login extends Model
{
    function Login($log, $pass)
    {
        $sql = (new Connection())->createSql();
        $query = "SELECT `password_hash` FROM `user` WHERE `email`='$log' and `password_hash`='$pass'";
        $result = $sql->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ($row != null) {
            $tmp_password = $row['password_hash'];
            if ($tmp_password == $pass) {
                $_SESSION['ml'] = $log;
                $_SESSION['pswrd'] = $pass;
                return array("success" => true);
            } else return array("success" => false);
        }
    }

}