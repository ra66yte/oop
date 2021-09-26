<?php

class Db {

    private $host;
    private $user;
    private $password;
    private $base;
    private $charset = "utf-8";

    private $db;

    private $table;
    private $colums;
    private $values;
    private $where;
    private $count;
    private $limit;
    private $row;
    private $rows;
    private $collection;

    public function __construct($host, $user, $password, $base) {

        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->base = $base;

        $this->db = new mysqli($this->host, $this->user, $this->password, $this->base);

        if ($this->db->connect_error) {
            die("Connection falied: " . $this->db->connect_errno . " - " . $this->db->connect_error);
        }

        $this->db->set_charset($this->charset);

    }

    public function insertRows($params) {

        $this->columns = array();
        $this->values = array();

        if (is_array($params) and $params) {

            $this->table = $this->db->escape_string($params['where']);

            if (is_array($params['columns']) and $params['columns']) {

                foreach ($params['columns'] as $key => $value) {

                    $this->colums[] = "`" . $key . "`";
                    $this->values[] = "'" . $value . "'";

                }

                $this->columns = implode(", ", $this->columns) ? implode(", ", $this->columns) : $this->colums[0];
                $this->values = implode(", ", $this->values) ? implode(", ", $this->values) : $this->values[0];
            }

            $sql = "INSERT INTO `" . $this->table . "` (" . $this->columns . ") VALUES (" . $this->values . ")";
            if ($this->db->query($sql)) {
                if ($this->db->affected_rows) return true;
            }

        }

        return false;

    }

    public function getRows($params) {
        $this->rows = array();
        if (is_array($params) and $params) {

            $this->table = $this->db->escape_string($params['where']);

            if (isset($params['limit'])) $this->limit = abs(intval($params['limit']));
            
            if (is_array($params['conditions']) and $params['conditions']) {
                $this->where = $this->getWhere($params['conditions']);
            }

        }

        if ($this->collection = $this->db->query("SELECT * FROM `" . $this->table . "`" . $this->where . " ORDER by `id` DESC" . ($this->limit ? " LIMIT 0, " . $this->limit : '') . "")) {
            while ($this->row = $this->collection->fetch_assoc())
			    $this->rows[] = $this->row;
            
            return $this->rows;
        }

        return false;

    }

    public function deleteRows($params) {


        if (is_array($params) and $params) {

            $this->table = $this->db->escape_string($params['where']);
            if (is_array($params['conditions']) and $params['conditions']) {
                $this->where = $this->getWhere($params['conditions']);
            }

        }
        if ($this->db->query("DELETE FROM `" . $this->table . "`" . $this->where . "")) {
            return true;
        }

        return false;

    }

    public function editRows($params) {

		if (is_array($params) and $params) {

            $this->table = $this->db->escape_string($params['where']);

            if (is_array($params['data']) and $params['data']) {
                $this->columns = array();
                foreach ($params['data'] as $key => $value) {

                    $this->colums[] = "`" . $this->db->escape_string($key) . "` = '" . $this->db->escape_string($value) . "'";

                }

                $this->columns = implode(", ", $this->columns) ? implode(", ", $this->columns) : $this->colums[0];
            }

            if (is_array($params['conditions']) and $params['conditions']) {
                $this->where = $this->getWhere($params['conditions']);
            }

            $sql = "UPDATE `" . $this->table . "` SET " . $this->columns . $this->where . "";

            if ($this->db->query($sql)) {
                if ($this->db->affected_rows) return true;
            }

        }

        return false;

    }

    public function getCountRows($params) {

        if (is_array($params) and $params) {

            $this->table = $this->db->escape_string($params['where']);
            
            if (is_array($params['conditions']) and $params['conditions']) {
                $this->where = $this->getWhere($params['conditions']);
            }

        }
        if ($this->count = $this->db->query("SELECT COUNT(*) FROM `" . $this->table . "`" . $this->where . "")->fetch_row()) {
            return $this->count[0];
        }

        return false;
    
    }

    public function truncateTables($params) {

        if (is_array($params) and $params) {
            foreach ($params as $param) {
                if ($this->db->query("TRUNCATE TABLE `" . $this->db->escape_string($param) . "`")) {
                    // Все в норме
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }

        return true;

    }

    public function dropTables($params) {

        if (is_array($params) and $params) {
            foreach ($params as $param) {
                if ($this->db->query("DROP TABLE `" . $this->db->escape_string($param) . "`")) {
                    // Все в норме
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }

        return true;

    }

    private function getWhere($conditions) {

        $this->where = array();

        if (is_array($conditions) and $conditions) {
            foreach ($conditions as $key => $value) {
                $this->where[] = "`" . $this->db->escape_string($key) . "` = '" . $this->db->escape_string($value) . "'";
            }
        }

        $this->where = implode(" AND ", $this->where) ? implode(" AND ", $this->where) : $this->where[0];

        return " WHERE " . $this->where;
    }

}

//$db = new Db('localhost', 'root', '', 'base');

//var_dump($db->getCountRows(['where' => 'user', 'conditions' => array('name' => 'Вася')]));

// var_dump($db->deleteRows(['where' => 'user', 'conditions' => array('name' => 'Вася')]));

// var_dump($db->truncateTables(['user', 'article']));

// var_dump($db->dropTables(['article']));

 //var_dump($db->getRows(['where' => 'user', 'conditions' => array('name' => 'Петя'), 'limit' => 20]));

// var_dump($db->editRows(['where' => 'user', 'data' => array('name' => 'Петя'), 'conditions' => array('name' => 'Вася')]));
//var_dump($db->insertRows(['where' => 'user', 'columns' => array('name' => 'Вася')]));