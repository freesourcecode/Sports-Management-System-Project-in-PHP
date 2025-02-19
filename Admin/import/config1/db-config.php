<?php

    class DBController {

        private $hostname       =       "localhost:3307";

        private $username       =       "root";

        private $password       =       "";

        private $db             =       "sports_management_system";

        // Creating connection

        public function connect() {

            $conn               =       new mysqli($this->hostname, $this->username, $this->password, $this->db)or die("Database connection error." . $conn->connect_error);

            return $conn;           
        }

        // Closing connection

        public function close($conn) {

            $conn->close();
        }

    }
?>