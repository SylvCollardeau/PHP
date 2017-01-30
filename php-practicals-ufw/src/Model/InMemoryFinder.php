<?php

use Model\FinderInterface;

class InMemoryFinder implements FinderInterface{
	
	private $inMemory = array (0=>
		"test1",
		"test2",
		"test3"
	); 

	/**
     * Returns all elements.
     *
     * @return array
     */
    public function findAll(){
		return $this->inMemory;
	}

    /**
     * Retrieve an element by its id.
     *
     * @param  mixed      $id
     * @return null|mixed
     */
    public function findOneById($id){
		return $this->inMemory[$id];
	}
	
}
