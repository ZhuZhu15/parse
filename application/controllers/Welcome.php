<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['a'] = "hi";
		$this->load->view('welcome_message', $data);
	}
	public function second()
	{
		$this->load->database();
		$sql = "SELECT * FROM names";
		if (isset($_POST['Name']) && isset($_POST['Name']) && isset($_POST['Name'])) {
		$name = $_POST['Name'];
		$surname = $_POST['Surname'];
		$age = $_POST['Age'];
		$insert = "INSERT INTO names (Name, Surname, Age) VALUES ('$name', '$surname', '$age')";
		$insert = $this->db->query($insert);
		}
		$query = $this->db->query($sql);
		$data['c'] = $query;
   	
		$this->load->model('first');
		
		$data['a'] = $this->first->sayHelloSergy();
		$data['b'] = $this->first->sayHelloIvan();
        
		$this->load->view('welcome', $data);
		

	}
	public function parse() {
		$this->load->model('parsemodel');
		$html = $this->parsemodel->get_content();
		$data['html'] = $html;
		$this->load->view('parse', $data);
	}

}
