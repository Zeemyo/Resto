<?php
class Login_model extends CI_Model
{
	function check_data($username,$password)
	{
	$query=$this->db->query("select * from user where (email='".$username."' or phone='".$username."')");
		$row = $query->num_rows();
		if($row)
		{
		$res=$query->result_array();
		$email=$res[0]['email'];
		$phone=$res[0]['phone'];
		$query=$this->db->query("select * from user where (email='".$email."' and phone='".$phone."') and password='$password'");
		$row1 = $query->num_rows();
		 if($row1){
			redirect('http://localhost/ci/index.php/Login_controller/welcome');
		 }else{
			$data['message']="<h3 style='color:red'>Password is not correct.</h3>";
            $this->load->view('login_view',@$data);
		 }
		}
		else
		{
		$data['message']="<h3 style='color:red'>This user is not registered</h3>";
        $this->load->view('login_view',@$data);
		}


		}

}
