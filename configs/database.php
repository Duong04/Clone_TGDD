<?php 
    class Database {
        private $serverName = 'mysql:host=localhost;dbname=demo;charset=utf8';
        private $userName = 'root';
        private $password = '';
        private $connect;

        function __construct() {
            try {
                $this->connect = new PDO($this->serverName, $this->userName, $this->password);
                $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        protected function getConnect() {
            return $this->connect;
        }

        function selectAll($sql) {
            try {
                $conn = $this->getConnect();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare($sql);
                $stmt->execute();
    
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }

        function selectAllWithId($sql, $value) {
            try {
                $conn = $this->getConnect();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare($sql);
                $stmt->execute($value);
    
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    

        function selectOne($sql, $value) {
            try {
                $conn = $this->getConnect();
                $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare($sql);
                $stmt -> execute($value);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                return $result;
            }catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        function cud($sql, $value) {
            try {
                $conn = $this->getConnect();
                $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare($sql);
                $stmt -> execute($value);

                return true;
            }catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        function insertGetId($sql, $value, &$lastInsertId) {
            try {
                $conn = $this->getConnect();
                $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare($sql);
                $stmt -> execute($value);
                $lastInsertId = $conn->lastInsertId();

                return true;
            }catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

    }
?>