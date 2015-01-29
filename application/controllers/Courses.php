<?php
class Courses extends CI_Controller
{
	//displays the add course page
	public function index()
	{
		$this->load->view('add_course_page');
	}
	public function show($id)
	{
		$this->output->enable_profiler(TRUE);
		$this->load->model("Course");
		$course = $this->Course->get_course_by_id($id);
		var_dump($course);
	}

	public  function add()
	{
		$this->load->model("Course");
		$courses_details = array(
			"title" => "Javascript",
			"description" => "javascript Roks!");

		$add_course = $this->Course->add_course($courses_details);
		if($add_course === TRUE)
			echo "Course is added!";
	}

	//proccesses the adding of a course
	public function add_course()
	{
		$courses_details['title'] = $this->input->post('title');
		$courses_details['description'] = $this->input->post('description');
		$this->load->model("Course_model");
		$add_course = $this->Course_model->add_course($courses_details);
		if ($add_course) 
		{
			echo "Course is added";
		}
	}



}
?>