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
		public function does_user_exist($task_id,$status)
		{
			
		    
			$query = "update tasks set status='$status' where id='$task_id' ";
			$inserted = mysqli_query($this -> connection, $query);

			
			if($inserted == 1 ){
				$json['msg'] = 'Task has been marked complete.'.mysqli_insert_id($this -> connection);
				$json['status'] = true;
				// $json['errors'] = [];
			}else{
				$json['msg'] = 'Task could not be marked complete. Please try again later';
				$json['status'] = false;
				// $json['errors'] = [];
			}
			
			echo json_encode($json);
			mysqli_close($this->connection);
		
			
		}
		
	}
	
	function reArrayFiles( $file_post ) {
				$file_ary = array();
				$file_count = count($file_post['name']);
				$file_keys = array_keys($file_post);

				for( $i=0; $i<$file_count; $i++ ) {
					foreach ($file_keys as $key) {
						$file_ary[$i][$key] = $file_post[$key][$i];
					}
				}

				return $file_ary;

			}
	
	
	$user = new User();

	if(isset($_POST['task_id'],$_POST['status'])) {
		$task_id=$_POST['task_id'];
		$status = $_POST['status'];

		if(!empty($task_id) && !empty($status) ){

			$user->does_user_exist($task_id,$status);
			die();
					
		}else{
			$json['msg'] = 'Error, Task ID and Status cannot be empty.';
			$json['status'] = false;
			echo json_encode($json);
		}
		
	}else{
		
			$json['msg'] = 'Error, Something went wrong.';
			$json['status'] = false;
			echo json_encode($json);
		}


?>