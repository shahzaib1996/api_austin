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
		public function does_user_exist($mob,$email,$encrypted_password,$name,$type,$employer_id)
		{
			$query = "Select * from users where (email='$email' OR username='$name') ";
			
			$result = mysqli_query($this->connection, $query);
			if(mysqli_num_rows($result)>0){
				
				$json['msg']='User is already existed';
				$json['status'] = false;
				echo json_encode($json);
				mysqli_close($this -> connection);
			}else{
			    // $created_at = date();
			    if( $type == '1' ){
					$query = "insert into users (username,email,password,mobile,type) values ('$name','$email','$encrypted_password','$mob','$type')";
			    } else {
			    	if( $employer_id != '' ) {
				    	$queryx = "Select * from users where (employer_id='$employer_id') ";
						$resultx = mysqli_query($this->connection, $queryx);
						if(mysqli_num_rows($resultx)>0) {
							$json['msg'] = "Employer already have domestic helper.";
							$json['status'] = false;
				    		echo json_encode($json);
				    		mysqli_close($this->connection);
				    		die();
						}

						$query = "insert into users (username,email,password,mobile,type,employer_id) values ('$name','$email','$encrypted_password','$mob','$type','$employer_id')";

			    	} else {
			    		$json['msg'] = "Employer ID is required.";
			    		$json['status'] = false;
			    		echo json_encode($json);
			    		mysqli_close($this->connection);
			    		die();
			    	}
			    }
				
				$inserted = mysqli_query($this -> connection, $query);
				
				if($inserted == 1 ){
					$json['msg'] = 'Account has been created.';
					$json['status'] = true;
					if( $type == '2' ) {
						$json['helper_id'] = mysqli_insert_id($this -> connection);
					}
				}else{
					$json['msg'] = 'Account could not be created. Please try again later';
					$json['status'] = false;
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
		$employer_id=$_POST['employer_id'];
		
		if(!empty($email) && !empty($password)){
			
			$encrypted_password = md5($password);
            // $encrypted_password = $password;
			// $user-> does_user_exist($mob,$email,$encrypted_password,$weight,$height,$goal,$food_pref,$name);
			$user-> does_user_exist($mob,$email,$encrypted_password,$name,$type,$employer_id);
			
		}else{
		
			$json['msg'] = 'Error, invalid inputs.';
			$json['status'] = false;
			echo json_encode($json);
		}
		
	}else{
		
			$json['msg'] = 'Error, Something went wrong.';
			$json['status'] = false;
			echo json_encode($json);
		}


?>