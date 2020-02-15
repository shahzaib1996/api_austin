<?php

include_once 'connection.php';
	
	class User {
		
		private $db;
		private $connection;
		
		function __construct() {
			$this -> db = new DB_Connection();
			$this -> connection = $this->db->getConnection();
		}
		
		public function does_user_exist($email,$password)
		{
				
			
			$query = "Select * from users where password = '$password' and (email='$email' OR username like '%$email%')";
		
			$result = mysqli_query($this->connection, $query);
			if(mysqli_num_rows($result)>0){
				$row = mysqli_fetch_assoc($result);
				
			    $user_id = $row["id"];	
			    
				$json['id']=$row["id"];	
				 
				$json['username']=$row["username"];	
				$json['email']=$row["email"];	
				$json['type']=$row["type"];	
				$json['employer_id'] = $row['employer_id'];	
				$json['mobile']=$row["mobile"];
				$json['created_at']=$row["created_at"];
				
				$json['msg'] = 'success';
				$json['status'] = true;
				
				if( $row["type"] == '1' ) {
				    $query_d = "Select * from users where employer_id = '$user_id'";
				    $result_d = mysqli_query($this->connection, $query_d);
        			if(mysqli_num_rows($result_d)>0){
        				$row_d = mysqli_fetch_assoc($result_d);
        				$json['domestic_helper'] = $row_d['id'];
        			} else {
        			    $json['domestic_helper'] = '';
        			}
				}
				
				echo json_encode($json);
				mysqli_close($this -> connection);			
			}else{
			    $json['status'] = false;
				$json['msg'] = 'wrong id or password';
				echo json_encode($json);
				mysqli_close($this -> connection);					
			}
			
			
		}
		
	}	
	
	$user = new User();
	if(isset($_POST['email'],$_POST['password'])) {
		
		$email = $_POST['email'];
		$password = $_POST['password'];
			
		if(!empty($email) && !empty($password)){
			
			$encrypted_password = md5($password);
            // $encrypted_password = $password;
			$user-> does_user_exist($email,$encrypted_password);
			
		}else{
		    
		    $json['status'] = false;
			$json['msg'] = ' Please input both the fields';
			echo json_encode($json);
		}
		
	}else {
	    $json['status'] = false;
		$json['msg'] = 'Error, Something went wrong.';
		echo json_encode($json);
	}
?>