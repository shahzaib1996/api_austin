<?php

include_once 'connection.php';
	
	class User {
		
		private $db;
		private $connection;
		
		function __construct() {
			$this -> db = new DB_Connection();
			$this -> connection = $this->db->getConnection();
		}
		
		public function does_user_exist($user_id,$type)
		{
			
			if( $type == '1' ) {
				$query = "Select * from tasks where user_id = '$user_id'";
			} else if($type == '2') {
				$query = "Select * from tasks where assigned_user = '$user_id'";
			}
			$tasks = [];
			if ($result = mysqli_query($this->connection, $query)) {

			    /* fetch object array */
			    while ($row = mysqli_fetch_assoc($result)) {
			        // print_r($row);
			        // print_r("+++===++++");
			        $task_id = $row['id'];
			        $query_a = "Select * from attachment where task_id = '$task_id'";
			        $att = [];
			        if ($result_a = mysqli_query($this->connection, $query_a)) {
				        while ($row_a = mysqli_fetch_assoc($result_a)) {
				        	$att[] = $row_a;
				        }
				    }
			        $row['attachments'] = $att;
			        $tasks[] = $row;
			    }

			    /* free result set */
			    $result->close();
			}

			// print_r($tasks);

			$json['tasks'] =$tasks;
			$json['status'] =true;
			echo json_encode($json);
			mysqli_close($this -> connection);		

			// $query = "Select * from users where password = '$password' and (email='$email' OR username like '%$email%')";
		
			// $result = mysqli_query($this->connection, $query);
			// if(mysqli_num_rows($result)>0){
			// 	$row = mysqli_fetch_assoc($result);
				
			//     $user_id = $row["id"];	
			    
			// 	$json['id']=$row["id"];	
				 
			// 	$json['task_id']=$row["username"];	
			// 	$json['user_id']=$row["email"];	
			// 	$json['assigned_id']=$row["type"];	
			// 	$json['employer_id'] = $row['employer_id'];	
			// 	$json['mobile']=$row["mobile"];
			// 	$json['created_at']=$row["created_at"];
				
				
			// 	$json['msg'] = 'success';
				
				
			// 	echo json_encode($json);
			// 	mysqli_close($this -> connection);			
			// }else{				
			// 	$json['msg'] = 'wrong id or password';
			// 	echo json_encode($json);
			// 	mysqli_close($this -> connection);					
			// }
			
			
		}
		
	}	
	
	$user = new User();
	if(isset($_POST['user_id'],$_POST['type'])) {
		
		$user_id = $_POST['user_id'];
		$type = $_POST['type'];
			
		if(!empty($user_id) && !empty($type)){
			
			$user-> does_user_exist($user_id,$type);
			
		}else{
		
			$json['msg'] = 'Please input both the fields';
			$json['status'] = false;
			echo json_encode($json);
		}
		
	}else{
		
			$json['msg'] = 'Error, Something went wrong.';
			$json['status'] = false;
			echo json_encode($json);
		}

?>