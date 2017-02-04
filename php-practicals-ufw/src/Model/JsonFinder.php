<?php

use Model\FinderInterface;

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
        
         $statusJson = array();

        $jsonFile = file($file);


        foreach ($jsonFile as $ligne) {
            $ligne = json_decode($ligne, true);
            foreach ($ligne as $key => $value) {
                array_push($statusJson, $value);
            }
        }
        
        $message = "{'4': '$message'}";
        
        array_push($statusJson, $message)
        
        file_put_contents($file, $message);
        
    }

}
