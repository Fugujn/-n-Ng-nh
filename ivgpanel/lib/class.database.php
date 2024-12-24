<?php

if (!defined('_lib'))
    die("Error");

class database {

    var $db;
    var $result;
    var $insert_id;
    var $sql = "";
    var $refix = "";
    var $servername;
    var $username;
    var $password;
    var $database;
    var $table = "";
    var $where = "";
    var $order = "";
    var $limit = "";
    var $error = array();

    function database($config = array()) {
        if (!empty($config)) {
            $this->init($config);
            $this->connect();
        }
    }

    function init($config = array()) {
        foreach ($config as $k => $v)
            $this->$k = $v;
    }

    function connect() {
        $this->db = @mysqli_connect($this->servername, $this->username, $this->password, $this->database);

        if( !$this->db){
            die('Could not connect: ' . mysqli_connect_error());
        }

        mysqli_set_charset($this->db,"utf8");

        /*$this->db = mysqli_connect($this->servername, $this->username, $this->password);

        if (!$this->db) {
            die('Could not connect: ' . mysql_error());
        }

        if (!mysql_select_db($this->database, $this->db)) {
            die(mysql_errno($this->db) . ": " . mysql_error($this->db));
            return false;
        }

        mysql_query('SET NAMES "utf8"', $this->db);*/
        
    }

    /*function query($sql = "") {
        if ($sql)
            $this->sql = str_replace('#_', $this->refix, $sql);
        $this->result = mysqli_query($this->sql, $this->db);
        if (!$this->result) {
            #die(mysql_errno($this->db) . ": " . mysql_error($this->db));
            die("syntax error: " . $this->sql);
        }
        return $this->result;
    }*/
    function query($sql = "") {
        if ($sql)
            $this->sql = str_replace('#_', $this->refix, $sql);
            $this->result = mysqli_query($this->db, $this->sql);
            if (!$this->result) {
                #die(mysql_errno($this->db) . ": " . mysql_error($this->db));
                die("syntax error: " . $this->sql);
            }
            return $this->result;
    }

    function insert($data = array()) {
        $key = "";
        $value = "";
        foreach ($data as $k => $v) {
            $key .= "," . $k;
            $value .= ",'" . $v . "'";
        }
        if ($key{0} == ",")
            $key{0} = "(";
        $key .= ")";
        if ($value{0} == ",")
            $value{0} = "(";
        $value .= ")";
        $this->sql = "insert into " . $this->refix . $this->table . $key . " values " . $value;
        $this->query();
        $this->insert_id = mysqli_insert_id($this->db);
        return $this->result;
    }

    function update($data = array()) {
        $values = "";
        foreach ($data as $k => $v) {
            $values .= ", " . $k . " = '" . $v . "' ";
        }
        if ($values{0} == ",")
            $values{0} = " ";
        $this->sql = "update " . $this->refix . $this->table . " set " . $values;
        $this->sql .= $this->where;
        return $this->query();
    }

    function delete() {
        $this->sql = "delete from " . $this->refix . $this->table . $this->where;
        return $this->query();
    }

    function select($str = "*") {
        $this->sql = "select " . $str;
        $this->sql .= " from " . $this->refix . $this->table;
        $this->sql .= $this->where;
        $this->sql .= $this->order;
        $this->sql .= $this->limit;
        return $this->query();
    }

    function num_rows() {
        return mysqli_num_rows($this->result);
    }

    function fetch_array() {
        return mysqli_fetch_assoc($this->result);
    }

    function result_array() {
        $arr = array();
        while ($row = mysqli_fetch_assoc($this->result))
            $arr[] = $row;
        return $arr;
    }

    function setTable($str) {
        $this->table = $str;
    }

    function setWhere($key, $value = "") {
        if ($value != "") {
            if ($this->where == "")
                $this->where = " where " . $key . " = '" . $value . "'";
            else
                $this->where .= " and " . $key . " = '" . $value . "'";
        }
        else {
            if ($this->where == "")
                $this->where = " where " . $key;
            else
                $this->where .= " and " . $key;
        }
    }

    function setWhereOr($key, $value) {
        if ($value != "") {
            if ($this->where == "")
                $this->where = " where " . $key . " = " . $value;
            else
                $this->where .= " or " . $key . " = " . $value;
        }
        else {
            if ($this->where == "")
                $this->where = " where " . $key;
            else
                $this->where .= " or " . $key;
        }
    }

    function setOrder($str) {
        $this->order = " order by " . $str;
    }

    function setLimit($str) {
        $this->limit = " limit " . $str;
    }

    function setError($msg) {
        $this->error[] = $msg;
    }

    function showError() {
        foreach ($this->error as $value)
            echo '<br>' . $value;
    }

    function reset() {
        $this->sql = "";
        $this->result = "";
        $this->where = "";
        $this->order = "";
        $this->limit = "";
        $this->table = "";
    }

    function debug() {
        echo "<br> servername: " . $this->servername;
        echo "<br> username: " . $this->username;
        echo "<br> password: " . $this->password;
        echo "<br> database: " . $this->database;
        echo "<br> " . $this->sql;
    }

    /**
     * Escape String
     *
     * @access	public
     * @param	string
     * @return	string
     */
    
    function getMaxId($table){
        $this->query(sprintf("select max(id)+1 as id from #_%s", $table));
        $result = $this->fetch_array();
        if(!isset($result['id']))
            return 1;
        return $result['id'];
    }



}

?>