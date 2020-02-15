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
		public function does_user_exist($user_id,$assigned_user,$date,$time,$instruction,$repeat,$notify,$pictures,$audios)
		{
			
		    $timestamp = date('Y-m-d h:m:s');
		    $image_path = 'image_path';
		    $audio_path = 'audio_path';
			$query = "insert into tasks (user_id,assigned_user,mob_date,mob_time,instruction,timestamp,days_repeat,notify) values ('$user_id','$assigned_user','$date','$time','$instruction','$timestamp','$repeat','$notify')";
			$inserted = mysqli_query($this -> connection, $query);
			$inserted_id = mysqli_insert_id($this -> connection);
			
			foreach($pictures as $a) {
			    if( $a->type == 'Picture' ) {
					$image_name = str_replace(".",$user_id,uniqid('', true)).'.png';
					$path = 'assets/task_files/'.$image_name;
					$bsf = str_replace('data:image/png;base64,', '', $a->file);
					$bsf = str_replace(' ', '+', $bsf);
					$data = base64_decode($bsf);
					// $data = base64_decode($a['file']);
		        	file_put_contents($path, $data);

					$type=$a->type;
					$query_a = "insert into attachment (task_id,file_path,file_type) values ('$inserted_id','$path','$type')";
					$insert_a = mysqli_query($this -> connection, $query_a);
				}
			}
			
			
// 			for($i=0;$i<count($audios['tmp_name']);$i++) {
// 			foreach($audios as $aa) {
			    if(isset($audios['audio_files'])){
						$errors= array();
						$file_name = $audios['audio_files']['name'];
						$file_size =$audios['audio_files']['size'];
						$file_tmp =$audios['audio_files']['tmp_name'];
						$file_type=$audios['audio_files']['type'];
						$file_ext=strtolower(end(explode('.',$file_name)));

						

						if($file_size > 9097152){
							$errors[]='File size must be excately 8 MB';
						}

						if(empty($errors)==true){
						    $path = 'assets/task_files/'.uniqid('', true).'.'.$file_ext;
							move_uploaded_file($file_tmp,$path);
				            
				            
				
							$type='audio';
        					$query_a = "insert into attachment (task_id,file_path,file_type) values ('$inserted_id','$path','$type')";
        					$insert_a = mysqli_query($this -> connection, $query_a);
				// 			echo $query_a;
						}else{
						 $json['errors'] = $errors;
						}
				  } //if exist condition end
// 			}


			
			if($inserted == 1 ){
				$json['msg'] = 'Task has been added.'.mysqli_insert_id($this -> connection);
				$json['status'] = true;
				// $json['errors'] = [];
			}else{
				$json['msg'] = 'Task could not be added. Please try again later';
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
	
	if(isset($_POST['user_id'],$_POST['assigned_user'],$_POST['date'],$_POST['time'],$_POST['instruction'],$_POST['days_repeat'],$_POST['notify'])) {
		$user_id=$_POST['user_id'];
		$assigned_user = $_POST['assigned_user'];
		$date = $_POST['date'];
		$time=$_POST['time'];
		$instruction=$_POST['instruction'];
		$repeat=$_POST['days_repeat'];
		$notify = $_POST['notify'];
		$pictures = [];
		$audios = [];
		
		
		if( isset($_POST['pictures']) ) {
		    $tt = json_decode($_POST['pictures']);
			$pictures = $tt;
		}
		if( isset($_FILES['audio_files']) ) {
// 			$audios = reArrayFiles($_FILES['audio_files']);
            $audios = $_FILES;
		}
		

		if(!empty($user_id) && !empty($assigned_user) && !empty($instruction)){

			
			$user->does_user_exist($user_id,$assigned_user,$date,$time,$instruction,$repeat,$notify,$pictures,$audios);
			die();

						
		}else{
		
			$json['msg'] = 'Error, User ID and Instruction cannot be empty.';
			$json['status'] = false;
			echo json_encode($json);
		}

		
	}else{

			$json['msg'] = 'Error, Something went wrong.';
			$json['status'] = false;
			echo json_encode($json);
		}



?>