<?php
	include_once 'connection.php';
	
	class User {
		
		private $db;
		private $connection;
		
		function __construct() {
			$this -> db = new DB_Connection();
			$this -> connection = $this->db->getConnection();
		}
		
				
		// public function does_user_exist($mob,$email,$encrypted_password,$weight,$height,$goal,$food_pref,$name)
		public function does_user_exist($mob,$email,$encrypted_password,$name,$type)
		{
			$query = "Select * from users where (email='$email' OR username='$name') ";
			
			$result = mysqli_query($this->connection, $query);
			if(mysqli_num_rows($result)>0){
				
				$json['msg']='User is already existed';
				echo json_encode($json);
				mysqli_close($this -> connection);
			}else{
			    $created_at = date();
				$query = "insert into users (username,email,password,mobile,type) values ('$name','$email','$encrypted_password','$mob','$type')";
				
				$inserted = mysqli_query($this -> connection, $query);
				
				if($inserted == 1 ){
					$json['msg'] = 'Account has been created.';
				}else{
					$json['msg'] = 'Account could not be created. Please try again later';
				}
				
				echo json_encode($json);
				mysqli_close($this->connection);
			}
			
		}
		
	}
	
	
	
	$user = new User();
	// if(isset($_POST['email'],$_POST['password'],$_POST['weight'],$_POST['height'],$_POST['goal'],$_POST['food_pref'])) {
	if(isset($_POST['username'],$_POST['mobile'],$_POST['email'],$_POST['password'],$_POST['type'])) {
		$mob=$_POST['mobile'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$name=$_POST['username'];
		$type=$_POST['type'];
		
		if(!empty($email) && !empty($password)){
			
			$encrypted_password = md5($password);
            // $encrypted_password = $password;
			// $user-> does_user_exist($mob,$email,$encrypted_password,$weight,$height,$goal,$food_pref,$name);
			$user-> does_user_exist($mob,$email,$encrypted_password,$name,$type);
			
		}else{
			echo json_encode("invalid input");
		}
		
	}else echo json_encode("error");


?>