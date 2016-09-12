<?php 

class REST 
{
	public $content_type = "application/json";
	public $_request = array();
	public $method = "";
	private $code = 200;

	public function __construct()
	{
		$this->input();
	}
	public function request_method()
	{
		return $_SERVER['REQUEST_METHOD'];
	}
	public function response($data,$status)
	{
		$this->code = ($status) ? $status : 200;
		$this->set_header();
		echo $data;
		exit;
	}
	protected function status_message()
	{
		$status = array(
			200 => "OK",
			201 => "Created",
			204 => "No content",
			404 => "Not Found",
			406 => "Not acceptable"
		);
		return ($status[$this->code]) ? $status[$this->code] : $status[500];
	}
	protected function input()
	{
		switch($this->request_method()) {
			case "POST":
				$this->_request = $this->clearInputs($_POST);
				break;
			case "GET":
			case "DELETE":
				$this->_request = $this->clearInputs($_GET);
				break;
			case "PUT":
				parse_str(file_get_contents("php://input"),$this->_request);
				$this->_request = $this->cleanInputs($this->_request);
				break;
			
			default:
				$this->response('',406);
				break;
		}
	}
	protected function cleanInputs($data)
	{
		$clean_input = array();
		if(is_array($data)) {
			foreach ($data as $k => $v) {
				$clearInputs[$k] = $this->cleanInputs[$v];
			}
		} else {
			if(get_magic_quotes_gpc()) {
				$data = trim(stripslashes($data));
			}
			$data = strip_tags($data);
			$clean_input = trim($data);
		}
		return $clean_input;
	}
	protected function set_header()
	{
		header("HTTP/1.1".$this->code." ".$this->status_message());
		header("Content-Type:".$this->content_type);
	}

}

class API extends REST
{
	public $data = "";

	const DB_SERVER = "localhost";
	const DB_USER = "root";
	const DB_PASSWORD = "";
	const DB = "db_reccoon_review";

	protected $db = null;
	protected $mysqli = null ;

	public function __construct(){
		parent::__construct();
		$this->dbConnect();
	}

	public function dbConnect()
	{
		$this->mysqli = new mysqli(self::DB_SERVER,self::DB_USER,self::DB_PASSWORD,self::DB);
	}

	public function processApi()
	{
		$url = strtolower(trim(str_replace("/","",$_SERVER["REQUEST_URI"])));
		if((int)method_exists($this,$url) > 0) {
				$this->$url();
			} else {
				$this->response('',404);
		}
	}

	public function getKey($name,$key)
	{
		$process = false;
		if(!empty($key)) {
			$update_name = "select reviewer_name from review where viewer_key = $key";
			$update_name = $this->mysqli->query($update_name);
			$update_name = $update_name->fetch_assoc();
			$updater_name = $update_name['reviewer_name'];
			if($name == $updater_name) {
				return $this->process = true;
			} else {
				$this->response('', 204);
			}
		}
		$error = array('status' => "Failed", "msg" => "Invalid key");
		$this->response($this->json($error), 400);
	}

	public function sort_raccoons()
	{

		if($this->request_method() != "GET") {
			$this->response('',406);
		}
		$selected_opt = strtoupper($this->_request['sort_opt']);
		if(!empty($selected_opt)) {
			switch ($selected_opt) {
				case "ASC":
				$query="select * from tbl_raccoon ORDER by reviewer_name ASC";
				$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
				if($r->num_rows > 0) {
					$result = $r->fetch_assoc();	
					$this->response($this->json($result), 200); // send user details
				}
				$this->response('',204);
				break;
				
				case "DESC":
				$query="select * from tbl_raccoon ORDER by reviewer_name DESC";
				$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
				if($r->num_rows > 0) {
					$result = $r->fetch_assoc();	
					$this->response($this->json($result), 200); // send user details
				}
				$this->response('',204);
				break;

				case "LOWEST":
				$query="select * from tbl_raccoon ORDER by reviewer_name DESC";
				$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
				if($r->num_rows > 0) {
					$result = $r->fetch_assoc();	
					$this->response($this->json($result), 200); // send user details
				}
				$this->response('',204);
				// SELECT tbl_raccoon.name as Raccoon,sum(review.rating) as Total_Rating from tbl_raccoon inner JOIN review ON tbl_raccoon.id = review.raccoon_id order by tbl_raccoon.id ASC
				// 
				// 
				break;

				case "HIGHEST":
				$query="select * from tbl_raccoon ORDER by reviewer_name DESC";
				$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
				if($r->num_rows > 0) {
					$result = $r->fetch_assoc();	
					$this->response($this->json($result), 200); // send user details
				}
				$this->response('',204);
				// SELECT tbl_raccoon.name as Raccoon,sum(review.rating) as Total_Rating from tbl_raccoon inner JOIN review ON tbl_raccoon.id = review.raccoon_id order by tbl_raccoon.id ASC
				// 
				// 
				break;
				
				default:
					$this->response('',406);
					break;
			}
		}
	}

	public function insertRaccoon()
	{
		if($this->request_method() != "POST") {
			$this->response('',406);
		}

		// $raccoon = json_decode(file_get_contents("php://input"),true);
		$reviewer_name = trim($_POST['reviewer_name']);
		$viewer_key = trim($_POST['viewer_key']);
		$review = trim($_POST['review']);
		$rate = trim($_POST['']);
		$raccon_id = trim($_POST['']);

		$all = array($reviewer_name,$viewer_key,$review,$rate);

		$query = "insert into review(raccoon_id,reviewer_name,viewer_key,review,rating) values('$raccon_id','$reviewer_name','$viewer_key','$review','$rate')";
		$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
		$success = array(
			'status' => 'Success',
			'msg' => 'Customer created Successfully !',
			'data' => $all
		);
		if($query) {
			$this->response($this->json($success),200);
		} else {
			$this->response('',204);
		}
	}

	public function UpdateRaccoon(){
		if($this->get_request_method() != "PUT"){
				$this->response('',406);
			}

		$name = $this->_request['name'];
		$key = $this->_request['key']; 

		$reviewer_name = trim($_POST['reviewer_name']);
		$review = trim($_POST['review']);
		$rate = trim($_POST['']);
		$raccon_id = trim($_POST['']);
		$process = $this->getKey($name,$key);

		$all = array($reviewer_name,$review,$rate);

		if($process === true) {
				$query = "UPDATE review SET reviewer_name = '$reviewer_name',review = '$review',rating = 'rate' WHERE  viewer_key = $key and raccon_id = $raccon_id";
				$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
				$success = array('status' => "Success", "msg" => "Customer ".$reviewer_name." Updated Successfully.", "data" => $all);
				$this->response($this->json($success),200);
		} else {
			$this->response('',406);
		}

	}

	public function Delete() 
	{
		if($this->get_request_method() != "PUT"){
				$this->response('',406);
			}

		$name = $this->_request['name'];
		$key = $this->_request['key'];	
		$process = $this->getKey($name,$key);

		if($process === true) {
			
			$query = "DELETE from review where viewer_key = $key";
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
			$success = array('status' => 'Success',"msg" => "Successfully Deleted");
			$this->response($this->json($success),200);
		} else {
			$this->request('',204);
		}
	}

	protected function json($data) {
		if(is_array($data)) {
			return json_encode($data);
		}
	}



}

$api = new API();
$api->processApi();


?>