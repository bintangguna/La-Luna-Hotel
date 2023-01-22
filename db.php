<?php
class database  {
    var $hostname = "localhost";
    var $username = 'root';
    var $password = '';
    var $dbname = 'reservasi_hotel';
    var $connection;

    public function __construct()
    {
        $this->connection = mysqli_connect($this->hostname,$this->username,$this->password,$this->dbname);
        if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
    }

    public function staffCount(){
        $data = mysqli_query($this->connection, "SELECT * FROM staff");
        return $data->num_rows;
    }

    public function roomCount(){
        $data = mysqli_query($this->connection, "SELECT * FROM room WHERE deleteStatus = '0'");
        return $data->num_rows;
    }

    public function reserveCount(){
       $data = mysqli_query($this->connection, "SELECT * FROM booking");
       return $data->num_rows;
    }

    public function pendingPyment(){
        $data = mysqli_query($this->connection, "SELECT SUM( total_price) FROM booking WHERE payment_status = '0'");    
        $row_amountsum = mysqli_fetch_assoc($data);
        return $row_amountsum['SUM( total_price)'];
    }
    public function pendingPymentCount(){
        $data = mysqli_query($this->connection, "SELECT * FROM booking WHERE payment_status = '0'");    
        return $data->num_rows;
    }

    public function getEarnings(){
        $data = mysqli_query($this->connection, "SELECT SUM( total_price) FROM booking WHERE payment_status = '1'");    
        $row_amountsum = mysqli_fetch_assoc($data);
        return $row_amountsum['SUM( total_price)'];
    }
    public function checkinCount(){
        $data = mysqli_query($this->connection, "SELECT * FROM room WHERE check_in_status = '1'");    
        return $data->num_rows;
    }
    public function bookRoomCount(){
        $data = mysqli_query($this->connection, "SELECT * FROM room WHERE status = '1'");    
        return $data->num_rows;
    }
    public function avRoomCount(){
        $data = mysqli_query($this->connection, "SELECT * FROM room WHERE status IS NULL AND deleteStatus = '0'");    
        return $data->num_rows;
    }
    public function getUser($user_id){
        $userQuery = "SELECT * FROM user WHERE id = '$user_id'";
        $result = mysqli_query($this->connection, $userQuery);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    
}

// $connection = mysqli_connect("localhost","root","","sekararum");

// // if(!$connection){
// //     die("failed to connect");
// // } else{
// //     echo "connect successfully";
// // }