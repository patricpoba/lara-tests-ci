<?php

namespace App;
 
class File
{
	/**
	* Write data to a given file
	*
	* @param string $path
	* @param string $content
	* @return mixed
	*/
	
	public function put($path, $content)
	{
	 	return file_put_contents($path, $content .' ', FILE_APPEND);
	}

	public function exists($file)
	{
		return true;
	}

}