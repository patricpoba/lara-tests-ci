<?php

namespace App;
 
class Generator {

	protected $file;

	public function __construct(File $file)
	{
		$this->file = $file;
	}

	protected function getContent()
	{
		// simplified for demo
		return 'foo bar';
		// return 'foo bar @' . date('Y-m-d H:m:s');
	}

	public function fire()
	{ 
		$content = $this->getContent();
		$file = 'foo.txt';

		if (! $this->file->exists($file)) {
			$this->file->put($file, $content);
		}

	}

 
	
}