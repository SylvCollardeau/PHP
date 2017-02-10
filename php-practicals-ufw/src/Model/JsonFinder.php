<?php

use Model\FinderInterface;
use Exception\HttpException;

class JsonFinder implements FinderInterface {

    /**
     * Returns all elements.
     *
     *  @return array
     */
    public function findAll() {
        $file = __DIR__ . "/../../data/statuses.json";
        $statusJson = array();

        $jsonFile = file($file);


        foreach ($jsonFile as $ligne) {
            $ligne = json_decode($ligne, true);
            foreach ($ligne as $key => $value) {
                array_push($statusJson, $value);
            }
        }

        return $statusJson;
    }

    /**
     * Retrieve an element by its id.
     *
     * @param  mixed      $id
     * @return null|mixed
     */
    public function findOneById($id) {
        $file = __DIR__ . "/../../data/statuses.json";
        $jsonFile = file($file);

        foreach ($jsonFile as $ligne) {
            $ligne = json_decode($ligne, true);
            foreach ($ligne as $key => $value) {
                if ($key == $id) {
                    return $value;
                }
            }
        }
        return null;
    }

    public function insertStatus($message){

		$file = __DIR__ . "/../../data/statuses.json";
		$jsonFile = file($file);

		$statusJson = '{';
		
		$count = 1;
			foreach ($jsonFile as $ligne) {
				$ligne = json_decode($ligne, true);
				foreach ($ligne as $key => $value) {
					$count = $key + 1; 
					$statusJson = $statusJson. '"' . $key . '":"'.$value .'",';
					
				}
			}

		$statusJson = $statusJson .'"'. $count . '":"'.$message.'"}';	
		
		file_put_contents($file, $statusJson);

    }

    public function suprStatus($id){

	$file = __DIR__ . "/../../data/statuses.json";
    $jsonFile = file($file);
	
	$count = 1;
	$i = 1;
	
	$statusJson = '{';

        foreach ($jsonFile as $ligne) {
            $ligne = json_decode($ligne, true);
            if (isset($id)){
				unset($ligne[$id]);
			}
			else{
					throw new HttpException(404, 'Page Not Found');
				}
            foreach ($ligne as $key => $value) {
				if ($key < count($ligne[$key])) {
					$statusJson = $statusJson. '"' . $count . '":"'.$value .'",'; 							
					$count = $count + 1;
					$i = $i + 1;	
				}else{
					$statusJson = $statusJson. '"' . $count . '":"'.$value .'"'; 					
				}	
			}
		}
        

	$statusJson = $statusJson .'}';

	file_put_contents($file, $statusJson);
    }
    



}
