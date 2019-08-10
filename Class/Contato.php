<?php 
    
    class Contato {
        
        private $dsn = "mysql:dbname=contatos; host=localhost";
        private $dbuser = "root";
        private $dbpass = "";
        private $pdo;
        
        public function __construct() {
            $this->pdo = new PDO($this->dsn, $this->dbuser, $this->dbpass);
        }

        public function addContato($email, $nome = '') {
            //1 passo = verificar se o email ja existe
            //2 passo = adicionar
            if($this->existeEmail($email) == false) {
                $sql = "INSERT INTO contatos (nome, email) VALUES (:nome, :email)";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':email', $email);
                $sql->execute();
                return true;
            } else {
                // Se o email não existir deve retornar false
                return false;
            }
        }

        public function getOne($email) {
            $sql = "SELECT * FROM contatos WHERE email=:email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $info = $sql->fetch();
                return $info;
            } else {
                return '';
            }
        }

        //getAll sempre vai retornar um array, ou seja uma lista de contatos
        public function getAll() {
            $sql = "SELECT * FROM contatos";
            $sql = $this->pdo->query($sql);

            if($sql->rowCount() > 0 ) {
                return $sql->fetchAll();
            } else {
                return array();
            }
        }

        public function editar($nome, $email) {
            if($this->existeEmail($email) == true) {
                $sql = "UPDATE contatos SET nome = :nome WHERE email = :email";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':email', $email);
                $sql->execute();

                return true;
            } else {
                return false;
            }
        }

        public function excluir($email) {
            if($this->existeEmail($email) == true) {
                $sql = "DELETE FROM contatos WHERE email = :email";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':email', $email);
                $sql->execute();

                return true;
            } else {
                return false;
            }
        }

        private function existeEmail($email) {
            $sql = "SELECT * FROM contatos WHERE email = :email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->execute();

            if($sql->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

    }
?>