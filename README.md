# WhereJson
A Larave package to mange WHERE clause for json data.
(This is for Laravel 4.2. [For Laravel 5+](https://github.com/SUKOHI/WhereJson))

# Installation

Execute composer command.

    composer require sukohi/where-json:1.*

# Preparation
    
Set `WhereJsonTrait` in your model like so.
    
    <?php
    
    use \Sukohi\WhereJson\WhereJsonTrait;
    
    class JsonValue extends Eloquent {
    
        use WhereJsonTrait;
    
    }

# Usage
  
    $items = Item::whereJson('column', [1])->get();
    
or
    
    $items = Item::whereJson('column', [
        'key1' => 'value1', 
        'key2' => 'value2', 
        'key3' => 'value3', 
    ])->get();

* 1st argument is column name.
* 2nd argument is array containing value you want to retrieve from the column value.  

# License

This package is licensed under the MIT License.

Copyright 2016 Sukohi Kuhoh