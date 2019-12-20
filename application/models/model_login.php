<?php


class Model_Login extends Model
{
    function Login($mail, $pass)
    {

        $a = "Неверный пароль";
        $b = "Вы успешно вошли как";
        $c = "Введите mail";
        $sql = (new Connection())->createSql();
        $query = "SELECT `password_hash`,`username` FROM `user` WHERE `email`='$mail' and `password_hash`=md5('$pass')";
        $result = $sql->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ($mail == null) {
             return $c;
        }else if ($row['password_hash'] != null) {
            $user_password = $row['password_hash'];
            if ($user_password == md5($pass)) {
                $user = $row['username'];
                return ($b . "  " . $user);

            }
        } else return $a;

    }
}
