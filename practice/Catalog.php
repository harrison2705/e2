<?php 

// should not see code outside the class. Create a class
class Catalog
{
    # Properties (variables) public: where the variable can be used (public, private, protected)
    public $products;

    # Methods (functions)
    public function __construct($dataSource) //magic methods built in PHP. 
    {
        $json = file_get_contents($dataSource);//
        $this->products = json_decode($json, true); //an array of data
        
    }
    public function getAll () 
    {
        return $this->products;
    }
    public function getById(int $id) 
    {
        var_dump ("You invoked get by id with the id of " .$id);
        var_dump($this->products[$id]["description"]);
    }
    public function searchByName (string $term)
    {
        $results = [];
        foreach($this->products as $product) 
        {
            if(strstr($product['name'], $term)) {
                $results[] = $product;
            }
        }
        return $results;
    }
}