<?php

    class ModeleGenerique{
        protected $pdo;

        public function __construct()
        {
            $this->pdo = new PDO("mysql:host=localhost;dbname=blog_b2", "root", "", [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

            $this->pdo->exec("SET NAMES utf8");
        }

        public function getAll($table){
            $stmt = $this->pdo->prepare("SELECT * FROM " .$table);
            $stmt->execute();
            return $stmt->fetchAll();

        }

        public function getOne($table, $value){
            $stmt = $this->pdo->prepare("SELECT * FROM " .$table . " WHERE id = ? ");
            $stmt->execute([$value]);
            return $stmt->fetch();
            
        }

        
    }