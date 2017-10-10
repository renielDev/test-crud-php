<?php

namespace App;
require('DB.php');

use App\DB;

class Students {

    private $connection;

    public function __construct()
    {
        $this->connection = DB::connect();
    }

    public function add($request=array())
    {
        $sql = 'INSERT INTO `users` (email, first_name, last_name, contact, access_level) ';
        $sql .= ' VALUES ("' . $request['email'] . '", "' . $request['first_name'] . '", "' . $request['last_name'] . '", "' . $request['contact'] . '", "student")';

        return DB::executeQuery($sql);
    }

    public function update($request)
    {
        $sql = 'UPDATE `users` SET `email` = "' . $request['email'] . '", `first_name` = "' . $request['first_name'] . '", `last_name` = "' . $request['last_name'] . '", `contact` = "' . $request['contact'] . '" ';
        $sql .= ' WHERE `users`.`id` = "' . $request['id'] . '"';

        return DB::executeQuery($sql);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM `users` WHERE id=' . $id;

        return DB::executeQuery($sql);
    }

    public function getList($filter='')
    {
        $sql = 'SELECT * FROM `users` WHERE ';
        $sql .= 'first_name LIKE "%' . $filter . '%" OR ';
        $sql .= 'last_name LIKE "%' . $filter . '%" OR ';
        $sql .= 'email LIKE "%' . $filter . '%" OR ';
        $sql .= 'contact LIKE "%' . $filter . '%"';

        DB::executeQuery($sql);
        return DB::getData();
    }
}
