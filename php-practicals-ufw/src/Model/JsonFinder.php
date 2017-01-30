<?php

use Model\FinderInterface;

class JsonFinder implements FinderInterface{


	
	/**
     * Returns all elements.
     *
     * @return array
     */
    public function findAll(){
		$file = __DIR__ . "/../../data/statuses.json";
		$statusJson = array();
		
		$jsonFile = file($file);
		
		
		foreach ($jsonFile as $ligne) {
			array_push($statusJson, json_encode($ligne));
		}
		
		return $statusJson;
	}

    /**
     * Retrieve an element by its id.
     *
     * @param  mixed      $id
     * @return null|mixed
     */
    public function findOneById($id){
		
		$statusJson = array();
		
		$jsonFile = file($this->$file);
		
		foreach($jsonFile as $ligne){
			
		}
		return "";
    }
	
}
