<?php

class Student
{
	private $_student_first_name;
	private $_student_last_name;
	private $_student_id;
	private $_student_grade;
	public $student_data;
	
	public function __construct()
	{
		echo "Creating student!";
	}
	
	public function create_student($data_array)
	{
		if(is_array($data_array))
		{
			try
			{
				$this->set_first_name($data_array['first_name']);
			}catch (Exception $e)
			{
				echo $e->getMessage();
				return;
			}
			try
			{
				$this->set_last_name($data_array['last_name']);
			}catch (Exception $e)
			{
				echo $e->getMessage();
				return;
			}
			try
			{
				$this->set_grade($data_array['grade']);
			}catch (Exception $e)
			{
				echo $e->getMessage();
				return;
			}
			try
			{
				$this->set_student_id();
			}catch (Exception $e)
			{
				echo $e->getMessage();
				return;
			}
			//return true;		
		}
		else
		{
			die("Need to pass an array of values!");
		}
		
	}
	
	private function set_first_name($first_name)
	{
		if(!$first_name)
		{
			throw new Exception("No first name passed!");
			return;
		}
		
		$this->_student_first_name = $first_name;
	}
	
	private function set_last_name($last_name)
	{
		if(!$last_name)
		{
			throw new Exception("No last name passed!");
			return;
		}
		$this->_student_last_name = $last_name;
	}
	
	private function set_grade($grade)
	{
		if(!$grade)
		{
			throw new Exception("No grade given!");
			return;
		}
		$this->_student_grade = $grade;
	}
	
	private function set_student_id()
	{
		$this->student_data = array(
			'first_name' => $this->_student_first_name,
			'last_name' => $this->_student_last_name,
			'grade'		=> $this->_student_grade
		);
		
		if(sizeof($this->student_data == 3))
		{
			$this->_student_id = 1;
			$st_id = array('student_id'=>$this->_student_id);
			array_merge($this->student_data, $st_id);
			return true;
		}
		else
		{
			throw new Exception("Missing student information to create id!");
		}
	}
}
