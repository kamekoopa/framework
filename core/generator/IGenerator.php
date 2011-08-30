<?php namespace framework\core\generator;

interface core_generator_IGenerator {

	
	public function assign($key, $value);
	
	public function generate();
}
