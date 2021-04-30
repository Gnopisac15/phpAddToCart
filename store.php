<?php 
    class Store
    {
        private $server ="mysql:host=localhost;dbname=phpstore";
        private $user = "root";
        private $pass = "";
        private $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        protected $connection;

        public function openConnection()
        {
            try
            {   
                $this->connection = new PDO(
                    $this->server,
                    $this->user,
                    $this->pass,
                    $this->options
                );
                return $this->connection;

            }catch(PDOException $error){

                echo "Error conection: ".$error->getMessage();

            }
        }

        public function closeConnection()
        {

            $this->connection = null;

        }

        public function getUsers()
        {
            $connection = $this->openConnection();
            $statement = $connection->prepare("SELECT * FROM users");
            $statement->execute();

            $users =$statement->fetchAll();
            $userCount = $statement->rowCount();

            if($userCount>0)
            {
                return $users;
            }else
            {
                return 0;
            }
        }
        public function login()
        {
            if(isset($_POST['submit']))
            {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $connection = $this->openConnection();

                $statement = $connection->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
                $statement->execute([$username, $password]);

                $user = $statement->fetch();
                $total = $statement->rowCount();

                if($total > 0)
                {
                    header("location: addUser.php", true, 301);
                }
                else
                {
                    echo "Login Failed";
                }


            }
        }
        public function addUser()
        {
            if(isset($_POST['add']))
            {
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                
                if($this->checkUserExist($email)==0)
                {
                    $connection = $this->openConnection();
                    $statement = $connection->prepare("INSERT INTO users (first_name, last_name, email,password) VALUES (?, ?, ?, ?)");
                    $statement->execute([$first_name, $last_name,$email, $password]);
                    echo "User created!";
                }
                else
                {
                    echo "Email already exist!";
                }
                // $connection = $this->openConnection();
                // $statement = $connection->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES ( )");
                
            }
        }

        public function checkUserExist($email)
        {
            $connection = $this->openConnection();
            $statement = $connection->prepare("SELECT * FROM users WHERE email = ? ");
            $statement->execute([$email]);
            $total = $statement->rowCount();

            return $total;
        }
    };

    $store = new Store();
    
?>