<?php

/*
 *  Author 	: aprillins
 *  Description : Saving and read JSON file. Variable $data must be an array.
 *  Version 	: 1.0
 */

class FileJSON{
	private $data;
	private $filename;
	private $folder;
	private $status;

	public function __construct($folder, $filename){
		$this->folder = $folder;
		$this->filename = $filename;
		$this->status = '';
	}

	public function save(){
		$file = fopen($this->folder.'/'.$this->filename, 'w'); // Opening file handle
		fwrite($file, $this->data); // Writing file
		fclose($file); // Closing file handle
		$this->status = 'File saved as '. $this->filename;
		unset($this->data);
	}

	public function read(){
		$file = fopen($this->folder.'/'.$this->filename, 'r') or die("Unable to open file!");
		$content = fread($file,filesize($this->folder.'/'.$this->filename));
		$content = json_decode($content);
		return $content;
	}

	public function setData($data){
		$this->data = json_encode($data);
	}

	public function getStatus(){
		echo $this->status;
	}

}
?>
