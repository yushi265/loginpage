<?php

require_once('../dbconnect.php');

class UserLogic {
    /**
     * ユーザーを登録する
     * @param array $userData
     * @return bool $result
     */
    public static function createUser($userData) {
        $result = false;
        $sql = 'INSERT INTO users (name, email, password) VALUES (?, ?, ?)';　//プレースホルダー

        //ユーザーデータを配列に入れる
        $arr = [];
        $arr[] = $userData['username'];
        $arr[] = $userData['email'];
        $arr[] = password_hash($userData['password'], PASSWORD_DEFAULT);　//ハッシュ化
        try {
            $stmt = connect()->prepare($sql);
            $result = $stmt->execute($arr);
            return $result; //成功したらtrueを返す
        } catch(\Exception $e) {
            return $result;
        }
    }
}

?>