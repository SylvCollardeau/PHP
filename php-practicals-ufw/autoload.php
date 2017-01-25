<?php

// your autoloader
spl_autoload_register(function($class) {
	
	echo $class;
	$directories=['src','tests'];
	
	foreach($directories as $value){
			
			if(file_exists($value. '/' . str_replace('_','/', $class) . '.php') == true){
				
				require $value . '/' . str_replace('_','/', $class) . '.php';
			}
			else if(file_exists($value. '/' . str_replace('\\','/', $class) . '.php') == true){
				
				require $value .'/' . str_replace('\\','/', $class) . '.php';
			}		
			else if(file_exists($value .'/' .$class . '.php')){						
				require $value .'/' .$class . '.php'; 
			}
		}
	
}); 
