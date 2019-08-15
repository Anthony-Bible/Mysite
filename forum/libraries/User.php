<?php 
class User{
	//Init DB Variable
	private $db;
	
	/*
	 *	Constructor
	 */
	 public function __construct(){
		$this->db = new Database;
	 }
	 
	/*
	 * Register User
	 */
	public function register($data){
			//Insert Query
			$this->db->query('INSERT INTO users (name, email, avatar, username, password, about, last_activity) 
											VALUES (:name, :email, :avatar, :username, :password, :about, :last_activity)');
			//Bind Values
			$this->db->bind(':name', $data['name']);
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':avatar', $data['avatar']);
			$this->db->bind(':username', $data['username']);
			$this->db->bind(':password', $data['password']);
			$this->db->bind(':about', $data['about']);
			$this->db->bind(':last_activity', $data['last_activity']);
			//Execute
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
			//echo $this->db->lastInsertId();
	}
	
	/*
	 * Upload User Avatar
	 */
	public function uploadAvatar(){
		// $allowedExts = array("gif", "jpeg", "jpg", "png");
		// $temp = explode(".", $_FILES["avatar"]["name"]);
		// $extension = end($temp);
		// if ((($_FILES["avatar"]["type"] == "image/gif")
		// 		|| ($_FILES["avatar"]["type"] == "image/jpeg")
		// 		|| ($_FILES["avatar"]["type"] == "image/jpg")
		// 		|| ($_FILES["avatar"]["type"] == "image/pjpeg")
		// 		|| ($_FILES["avatar"]["type"] == "image/x-png")
		// 		|| ($_FILES["avatar"]["type"] == "image/png"))
		// 		&& ($_FILES["avatar"]["size"] < 100000)
		// 		&& in_array($extension, $allowedExts)) {
		// 	if ($_FILES["avatar"]["error"] > 0) {
		// 		redirect('register.php', $_FILES["avatar"]["error"], 'error');
		// 	} else {
		// 		if (file_exists("images/avatars/" . $_FILES["avatar"]["name"])) {
		// 			redirect('register.php', 'File already exists', 'error');
		// 		} else {
		// 			move_uploaded_file($_FILES["avatar"]["tmp_name"],
		// 			"images/avatars/" . $_FILES["avatar"]["name"]);
					
		// 			return true;
		// 		}
		// 	}
		// } else {
		// 	redirect('register.php', 'Invalid File Type!', 'error');
		// }


		$target_dir = "images/avatars/";
		$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        redirect('register.php', 'Invalid File Type!', 'error');
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    redirect('register.php', 'File already exists', 'error');
		    print_r($_FILES);
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["avatar"]["size"] > 500000) {
		    redirect('register.php', 'File TOO LARGE', 'error');
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		        redirect('register.php', 'Invalid File Type!', 'error');
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		        redirect('register.php', $_FILES["avatar"]["error"], 'error');
		   
		} else {
		    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["avatar"]["name"]). " has been uploaded.";
		        return true;
		    } else {
		        redirect('register.php', $_FILES["avatar"]["error"], 'error');
		    }
		}

	}
	
	/*
	 * User Login
	 */
	public function login($username, $password){
		$this->db->query("SELECT * FROM users
									WHERE username = :username
									AND password = :password			
		");
		
		//Bind Values
		$this->db->bind(':username', $username);
		$this->db->bind(':password', $password);
		
		$row = $this->db->single();

		//Check Rows
		if($this->db->rowCount() > 0){
			$this->setUserData($row);
			return true;
		} else {
			return false;
		}
	}
	
	/*
	 * Set User Data
	 */
	private function setUserData($row){
		$_SESSION['is_logged_in'] = true;
		$_SESSION['user_id'] = $row->id;
		$_SESSION['username'] = $row->username;
		$_SESSION['name'] = $row->name;
	}
	
	/*
	 * User Logout
	*/
	public function logout(){
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_id']);
		unset($_SESSION['username']);
		unset($_SESSION['name']);
		return true;
	}
	
	/*
	 * Get Total # Of Users
	 */
	public function getTotalUsers(){
		$this->db->query('SELECT * FROM users');
		$rows = $this->db->resultset();
		return $this->db->rowCount();
	}
}