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
			// $image_name = 'aaaa.jpg';
			// $image_file = fopen($image_name, "w") or die("Unable to open file!");
			// $txt = "iVBORw0KGgoAAAANSUhEUgAAAWgAAADICAYAAADFjnuPAAAACXBIWXMAAA7EAAAOxAGVKw4bAAANgUlEQVR42u3dT3LaWhbH8d/r6vErvymDLmUDXWQM9RAbeMEbeDYbSOQNRKVsADkbMMkGTHoDQArGoXsDpnvANOzg9UBXybWsf4DAWPp qlJJbCwL6XJ0dHR0JQEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD44Rc2we5aYdCW1Jb0yvryg6TVxvNXbCEABOjTBuULSTeS/pTk5Lx0LemzpNHG87dsOQAE6OMG54GkUUFgTtpKutl4/pgtCIAAfZzgHEh6f8AixhvPH7IlARCgzys4E6QBEKCPEJxdSdOsgCvp08bzZ9br25KuJF1Lukj5mSHlDgAE6GoC9IOe1pxXJtCucn7OkXSvqMvDtpX0iguHAMr6G5sgNcheZwTnflEb3cbz15L65vW2uAsEAAjQB3iX8rVh2ezXvO7SZM22t2xaAATo/bNnR0/LE Ndb0AxmfQ4mUWb2jYAEKD30E752pc9l/Wp5PIBgABdwuuUr832WVBG1v0bmxgAAboiB3ZeMDcHAAL0maKtDgABGgAI0AAAAjQANFUjb/VuhcFIkneGqzaTdMnt4AAamUGb27i9M109V9FkSwDQyBJH78zX7w3DEkBTA/TgzNfPNY/XAkCAbg4zZ/NLCH4uQxNA0zLocw589oXBHkMTQNMC9DnWdyeShuZPbMDQBNCYNjtT1/1 JqszUzTT3SRuqWuFwZ0ed3C8MlOWAmiovzfovbrP/PtXVlBOC7yDlP HDFGAAN0Ez1HeWCsqYdzaQdlM2n x8fyJ f9ATy9e9gjQAAGaDLpaW/186vejqUZNF4lvvjcpOHhQhwYarhE1aPMYq4cjB WJpC JwGv/fl/Rg2iHyRJHKwy K739r7/x/BnDFCCDrrNjZaOTlGzYDrzxk7zfSvq48fxhymsGyu7NfqM9n YCgAD9UlTZV7w1QXeSN6mRmfNjZF5/mZMJ59XGXYYo0FxNKXH8dYTFziR9lTSVtLLa5VxJd4rKGRNFJY28QP5d Xc30m4HEKBrG5xdE0SPLX7Y7Dfzd7jx/JuCdRtIui9Y7nDj WOGKtA8TShxnKq97nLj X4rDOL/X7fC4FPGk713Wbeeoq6Qg/U6XXfPH13Nl4ttieU75sxBkjRfLmZ7rmdbUlvSK ugt5ovF uK35ckrdOWa64ftCX1zZe K plXxWcEdnzvWwL9n98AfnHNit7Udisn6vHT6F/kDQre8ZVZm6aMutjkqA8ZbZDvL13VucL6U0I0O6Jfs/vcTCTdKuoa2PaCoN zuAsc/FyoMe3gR9i3zOJvspdrLyzt3ev0 3vEqR7ne5AUd3eyfj WtLtfLkIK3pfkvTB7Cs7UIyUMy93Kwzi3va09zaytsHMCvCZZ0iS3pc9qzXB8F3e2GmFwVpSUOLMa1T0 TAJx0rRxfBw33FlLec2Y73aB zH2lYCaj0Xh8lO2if6da4VoNeSLuPBazKVtPJGmZn1LtJ /tyYLDb5Yb/a4eevFZV7nJyXOZJGvU73wWTZVY XCxMkrkscNKfmyTynHM8js35FB3ZH0l0rDKYVTV3bljRqhcE385k6ZDlVrlft1X2ypGNnz2tFd/vZFwj/Z53SxdnTfcqA3KX0cvkCtnVaML42ZY8ypZG7lG07y8jcnYJAvq9RygE9Xoe0ssHJ5u42c7V4GWNwZhKDtPFfZTBsq/iaSdnP5R3hlxLHserPW0V9zX4rDL5ZmXBf0r1V0libP22r3LHdobwR 8M Da/IbL5c9KtYkAmw1zmn8EXrnvz jV3G6HW6F2Z7xTf7jOfLxY/e8/ly8UvGetndOx/my4VfkD3b72Gl6LrCOnFG5luvG57i ZGtMAhStu/YlDHWifdwkyiZxEG1aF/PNp7fT/zetkkO3lpjvN0KAy n3PFh4/l ynKuEgeYQSsM3Jz68ZPlkEGTQZcJzB8Utb755pTTzrj iIOzGZRT6/txkL7Yobwh60NxzqeEw8Q2sm/ceWsCbNEp Y/AmKwxz5eL7Xy5GCu6IPbBBKGqJTPnIHmxbeP5a3Oz0WtJN0UXvioKzk4i4MYHhmHK m1NUHutx/OLu6Yvfycbz1 Z5fUPSXzMcm5S9huPd2t4gK4qqD0KzBvP35pyhpcWSE0AnqZ86OOgfbXHOrhnvJ3fWv eKLpIau DQRX7zARqv0xHyTHHjgk4p5rI6l3i/2HRxT9z4BgWnKXsFGATpaZ9uy3CxIGjLTQ6QFcemK1Tyaxa3Mh87yInU9vn1vOzzDbMxT37vQamc2O1Q3CwP7ROr9O9L1O7rtg6uR/3yTqPYJDYTkHJYDhJ7AOnwovNFxVuZ Soew16rf0uJm0lfZQ0yqgx3uUM0mN9qKvOoJ1ep1v4Yc r26YE35nVU3yrnxeCnF6n6 a03H1JBKKBpEGv011J pek6b491Ttkd2vTnuZYQejOlLEmkubaocfYCopF2/j3gvKGPX5nO9a8PyWy1LbSLyaWei/Wv/daRkpXVd57 b3Etnuo 01cdQ/Qn/W0fldkrKi uM0YZJ6eZypQpxUG7Qrrnk7JbePnZM9u4oN7awX2ca/THVkHMl8ZvdTmtb2Ug1t8w8r7Xqcb17aDrBtWKnCpqAR1kcgWr N1a4VB/OCFcYlg6ewx/rKCoiT9Z8efT46VV3sE1bgv/KAAnXHW aUgISlKSmaq6CYuAvQzMBfy/lC5WtdYKReGEoOsreq7KXbNoldntInt uja7qwwPloByu11uk5WcJ0vF8Nep/tvs30vMk6rrxW17oXz5eLmCONl1QqD1yYgZR2E44PGu1YYXJ7iQuEJE4Bkxvqr2Q7JA0WwY b7D7Oci0T2PKGI0ewMWjKtbzlH48LAXLK0cQpvVN1TVraHBHtTIx6kZc J7fU kY0Pc8opoaTQ3FH4xuwzJ WlXq/T/W/KHYWVlDokXZrTcXs90rLbaSsMXuVk0mW2saPyZbhfjxmgS2b7w4LPSpnMd6torvO8M5C1iuvVdTk4NjdAm0HQN10XV9aH4aukux3mLRjp a86uxUua3VgH3TyTGJkShp5Br1O96aoC8Nk4pPEgeBdIpD5OuIjwcy4COPfYY2f65SsPms9Vsne4pRxFWQFxo3nz6y5XfbZ/8kLy4fcEr9WVPo7NOudqVyL4mf6oBv0yCvTED/b52czWuqeRSsMBhV8SA5i3Tiyq/hGitIfPFMSiTPrqRWkLvJKJscaP60wuNXPGQul4z87cmUlBu2CmzvscZK88aYo48zK9r9K rbDmEvLfLeK6uf3NSoJEaDPJCDmtdQ9S3zU89furg8o9fyZFqB7na6n6A7BvOz6ayKLdFRh25a5xuDkBSNTp7aD5rFLXnY3jBR1lrwucYFylFi3oouahdl SWS FaIPuthz152flAnOYB3eJU5Z wV/PthB1fRO28E5MAHlW8HUof9MZNezqt6QdSC b4XBKOvOzZRWsaNmhKaNbJ04KE2zJi0yN0rdJbLn0v3TIIN Sdnzc7XU5XFaYeBU8JSVUn3Q8UEqLiWY4GoHh09FgdL0M9vzOVzJtEeZC4Lv7eDT63RnilqwVlaWepXYF7OKt vUel eovm8J2Y9ttb6Jevs8xPs82T7X1vSQysMxon1e6P0roubF/hUnjJ90PFBrLYZOwE6/3R3dKar5 rw/k9H5Xt0p1YWZ9 mHs RkWu XGx7ne5YP v4rnXjykqP66zx 3MLFlt1Rpi8qeNR/3OG2SmuB5iyyjDlbK5o/aSX 0SeMmMgVtsATYkj 3T3nKdDfJbbvs0czPaH5uMOP55sw7sywXs9Xy7iSZDK3CW3lTSs s5CM0/E6x0y85lOOA2sORD0d1i/taJWtjGfaDLouvF13hO5uHv 3L5BbWv9XnsZpQ9i8 VibbJox8rg7e/7pk0v7j1uJ14zk2mN3KFzw17XhzKZqqKWzHh6zOQBaW2y/S85gW V8e8sD2X3i7V rlk/N7GNtmZZX0oG5l3XtZLtnDPGZoSex35hEzzJnss8yPUc9Ov8LDYAlDheWmnj2cscAAjQzyVvmtBz47K7AAJ0U7Jn74UFvTYP3gQI0E0IzufcUpdnwN4DCNB1Ds4vqe6c1GMIAwToOjv3ljoyaKChGt1mZ/pJpy/8bbxmhjCADLqORjV4Dy7DGCBA11EdHvtOPzRAgK4XU96oA5d2O4AAXTd1qtu6DGWAAF0b5ukS65q8HcocAAG6dj6TQQMgQJ9nFu2rHqUOh6EMEKDrqK/jPpX5FGbsRqB mA/aMA/hHEj67YWt ncVP7EZAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAICX7f/du6o1VJnPbgAAAABJRU5ErkJggg==";
			// fwrite($image_file, $txt);
			// fclose($image_file);
			// echo uniqid('', true);
			// die();
		    $timestamp = date('Y-m-d h:m:s');
		    $image_path = 'image_path';
		    $audio_path = 'audio_path';
			$query = "insert into tasks (user_id,assigned_user,mob_date,mob_time,instruction,timestamp,days_repeat,notify) values ('$user_id','$assigned_user','$date','$time','$instruction','$timestamp','$repeat','$notify')";
			$inserted = mysqli_query($this -> connection, $query);
			$inserted_id = mysqli_insert_id($this -> connection);

// 			echo $query;die();
			
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
			
// 			if( count($audios['tmp_name']) == 1 ) {
// 			    $errors= array();
// 						$file_name = $audios['name'][$i];
// 						$file_size =$audios['size'][$i];
// 						$file_tmp =$audios['tmp_name'][$i];
// 						$file_type=$audios['type'][$i];
// 						$file_ext=strtolower(end(explode('.',$file_name)));

// 						// $extensions= array("jpeg","jpg","png");

// 						// if(in_array($file_ext,$extensions)=== false){
// 						//    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
// 						// }

// 						// echo $file_name;
// 						// die();

// 						if($file_size > 9097152){
// 							$errors[]='File size must be excately 8 MB';
// 						}

// 						if(empty($errors)==true){
// 						    $path = 'assets/task_files/'.uniqid('', true).$file_ext;
// 							move_uploaded_file($file_tmp,$path);
				            
				            
				
// 							$type='audio';
//         					$query_a = "insert into attachment (task_id,file_path,file_type) values ('$inserted_id','$path','$type')";
//         					$insert_a = mysqli_query($this -> connection, $query_a);
// 				// 			echo $query_a;
// 						}else{
// 						 $json['errors'] = $errors;
// 						}
// 			}
			
// 			for($i=0;$i<count($audios['tmp_name']);$i++) {
// 			foreach($audios as $aa) {
			    if(isset($audios['audio_files'])){
						$errors= array();
						$file_name = $audios['audio_files']['name'];
						$file_size =$audios['audio_files']['size'];
						$file_tmp =$audios['audio_files']['tmp_name'];
						$file_type=$audios['audio_files']['type'];
						$file_ext=strtolower(end(explode('.',$file_name)));

						// $extensions= array("jpeg","jpg","png");

						// if(in_array($file_ext,$extensions)=== false){
						//    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
						// }

				// 		echo $file_name;
				// 		echo $file_tmp;
				// 		die();

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


// 			foreach($attachment as $a) {
// 				if( $a['type'] == 'picture' ) {
// 					$image_name = str_replace(".",$user_id,uniqid('', true)).'.png';
// 					$path = 'assets/task_files/'.$image_name;
// 					$bsf = str_replace('data:image/png;base64,', '', $a['file']);
// 					$bsf = str_replace(' ', '+', $bsf);
// 					$data = base64_decode($bsf);
// 					// $data = base64_decode($a['file']);
// 		        	file_put_contents($path, $data);

// 					$type=$a['type'];
// 					$query_a = "insert into attachment (task_id,file_path,file_type) values ('$inserted_id','$path','$type')";
// 					$insert_a = mysqli_query($this -> connection, $query_a);
// 				} else if( $a['type'] == 'audio' ) {

// 					if(isset($_FILES['file'])){
// 						$errors= array();
// 						$file_name = $_FILES['audio_file']['name'];
// 						$file_size =$_FILES['audio_file']['size'];
// 						$file_tmp =$_FILES['audio_file']['tmp_name'];
// 						$file_type=$_FILES['audio_file']['type'];
// 						// $file_ext=strtolower(end(explode('.',$_FILES['audio_file']['name'])));

// 						// $extensions= array("jpeg","jpg","png");

// 						// if(in_array($file_ext,$extensions)=== false){
// 						//    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
// 						// }

// 						// echo $file_name;
// 						// die();

// 						if($file_size > 9097152){
// 							$errors[]='File size must be excately 8 MB';
// 						}

// 						if(empty($errors)==true){
// 							move_uploaded_file($file_tmp,$file_name);
// 							echo "Success";
// 						}else{
// 						 print_r($errors);
// 						}
// 				   }
				   

// 				} else {
// 					echo "else no picture type";
// 				}
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
		
//Test STart		
// 		    $myfile = fopen("newfilea.txt", "w") or die("Unable to open file!");
// 			$txt = "John Doe\n";
// 			$tts = reArrayFiles($_FILES['audio_files']);
// 			fwrite($myfile, $tts );
// 			fclose($myfile);
// // 		$json['testing_audios'] = reArrayFiles($_FILES['audio_files']['tmp_name']);
// 		$json['testing_audios'] = $_FILES['audio_files']['tmp_name'];
		
// 		for($i=0;$i<count($_FILES['audio_files']['tmp_name']);$i++) {
// // 		foreach($tts as $aa) {
// 			 //   if(isset($_FILES['file'])){
// 						$errors= array();
// 						$file_name = $_FILES['audio_files']['name'][$i];
// 						$file_size =$_FILES['audio_files']['size'][$i];
// 						$file_tmp =$_FILES['audio_files']['tmp_name'][$i];
// 						$file_type=$_FILES['audio_files']['type'][$i];
// 						$file_ext=strtolower(end(explode('.',$file_name)));

// 						// $extensions= array("jpeg","jpg","png");

// 						// if(in_array($file_ext,$extensions)=== false){
// 						//    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
// 						// }

// 						// echo $file_name;
// 						// die();

// 						if($file_size > 9097152){
// 							$errors[]='File size must be excately 8 MB';
// 						}

// 						if(empty($errors)==true){
// 						    $path = 'assets/task_files/'.uniqid('', true).$file_name.'.'.$file_ext;
// 							move_uploaded_file($file_tmp,$path);
// 				// 			$type='audio';
//     //     					$query_a = "insert into attachment (task_id,file_path,file_type) values ('$inserted_id','$path','$type')";
//     //     					$insert_a = mysqli_query($this -> connection, $query_a);
// 				// 			echo $query_a;
// 						}else{
// 						 $json['errors'] = $errors;
// 						}
// 				//   }
// 			}
		
		
		
// 		echo json_encode($_FILES['audio_files']);
// 		die();
		
		//TEst end
		
		if( isset($_POST['pictures']) ) {
		    $tt = json_decode($_POST['pictures']);
			$pictures = $tt;
		}
		if( isset($_FILES['audio_files']) ) {
// 			$audios = reArrayFiles($_FILES['audio_files']);
            $audios = $_FILES;
		}
		
// 		$pictures = [  ];
// 		$pictures[0]['type'] = 'picture';  
// 		$pictures[0]['file'] = "iVBORw0KGgoAAAANSUhEUgAAAMkAAAA8CAMAAAD7R26dAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6Q0FCREZGOTEyMzVGMTFFN0I4N0I4RkI3NTdBNDJFNTciIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6Q0FCREZGOTIyMzVGMTFFN0I4N0I4RkI3NTdBNDJFNTciPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpDQUJERkY4RjIzNUYxMUU3Qjg3QjhGQjc1N0E0MkU1NyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpDQUJERkY5MDIzNUYxMUU3Qjg3QjhGQjc1N0E0MkU1NyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PsEgfygAAAGAUExURWO2Jv5jC67X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";
// 		$pictures[1]['type'] = 'picture';  
// 		$pictures[1]['file'] = "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";  

		// print_r($attachment[0]);die();
		// $attachment = '';
		if(!empty($user_id) && !empty($assigned_user) && !empty($instruction)){


				// 	if(isset($_FILES['audio_file'])){
				//       $errors= array();
				//       $file_name = $_FILES['audio_file']['name'];
				//       $file_size =$_FILES['audio_file']['size'];
				//       $file_tmp =$_FILES['audio_file']['tmp_name'];
				//       $file_type=$_FILES['audio_file']['type'];
				//       // $file_ext=strtolower(end(explode('.',$_FILES['audio_file']['name'])));
				      
				//       // $extensions= array("jpeg","jpg","png");
				      
				//       // if(in_array($file_ext,$extensions)=== false){
				//       //    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
				//       // }

				//       // echo $file_name;
				//       // die();
				      
				//       if($file_size > 8097152){
				//          $errors[]='File size must be excately 2 MB';
				//       }
				      
				//       if(empty($errors)==true){
				//          move_uploaded_file($file_tmp,$file_name);
				//          echo "Success";
				//       }else{
				//          print_r($errors);
				//       }
				//   }
				//   echo "dno";
				//   die();
			
			$user->does_user_exist($user_id,$assigned_user,$date,$time,$instruction,$repeat,$notify,$pictures,$audios);
			die();

			// $img = $_POST['img']; // Your data 'data:image/png;base64,AAAFBfj42Pj4';
			// $img = str_replace('data:image/png;base64,', '', $img);
			// $img = str_replace(' ', '+', $img);
			// $data = base64_decode($img);
			// file_put_contents('image.png', $data);
			// echo "saved";

			// $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
			// $txt = "John Doe\n";
			// fwrite($myfile, $txt);
			// $txt = "Jane Doe\n";
			// fwrite($myfile, $txt);
			// fclose($myfile);
			// echo uniqid('', true);

			// echo str_replace(".","111",uniqid('', true)).'.png';

			// echo "test";

			// $image_name = 'imagee.png';
			// $image_file = fopen($image_name, "w") or die("Unable to open file!");
			// $txt = "iVBORw0KGgoAAAANSUhEUgAAAMkAAAA8CAMAAAD7R26dAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6Q0FCREZGOTEyMzVGMTFFN0I4N0I4RkI3NTdBNDJFNTciIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6Q0FCREZGOTIyMzVGMTFFN0I4N0I4RkI3NTdBNDJFNTciPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpDQUJERkY4RjIzNUYxMUU3Qjg3QjhGQjc1N0E0MkU1NyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpDQUJERkY5MDIzNUYxMUU3Qjg3QjhGQjc1N0E0MkU1NyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PsEgfygAAAGAUExURWO2Jv5jC67X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";
			// fwrite($image_file, $txt);
			// fclose($image_file);
			// echo uniqid('', true);
			// die();

			// $data = 'data:image/png;base64,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';

// $data = str_replace('data:image/png;base64,', '', $data);

// $data = str_replace(' ', '+', $data);

// $data = base64_decode($txt);

// 			$file = uniqid().'.png';



//         	file_put_contents($file, $data);

						
		}else{
		
			$json['msg'] = 'Error, User ID and Instruction cannot be empty.';
			$json['status'] = false;
			echo json_encode($json);
		}

		
	}else{
// 		$file = file_get_contents('newfile.txt');
// 		$tt = json_decode($file);
// 		print_r($tt[0]->file);
		
// 		foreach($tt as $a) {
// 			    if( $a->type == 'Picture' ) {
// 					$image_name = uniqid('', true).'itested.png';
// 					$path = 'assets/task_files/'.$image_name;
// 					$bsf = str_replace('data:image/png;base64,', '', $a->file);
// 					$bsf = str_replace(' ', '+', $bsf);
// 					$data = base64_decode($bsf);
// 					// $data = base64_decode($a->file);
// 		        	file_put_contents($path, $data);
//                     echo "SS--";
// 				}
// 			}
		
// 		die();

			$json['msg'] = 'Error, Something went wrong.';
			$json['status'] = false;
			echo json_encode($json);
		}



?>