# WhereJson
A Laravel package to mange WHERE clause for json data.
(This is for Laravel 5+. [For Laravel 4.2](https://github.com/SUKOHI/WhereJson/tree/1.0))

# Installation

Execute composer command.

    composer require sukohi/where-json:2.*

# Preparation
    
Set `WhereJsonTrait` in your model like so.
    
    <?php
    
    namespace App;
    
    use Illuminate\Database\Eloquent\Model;
    use Sukohi\WhereJson\WhereJsonTrait;
    
    class JsonValue extends Model
    {
        use WhereJsonTrait;
    }

# Usage
  
    $items = \App\Item::whereJson('column', [1])->get();
    
or
    
    $items = \App\Item::whereJson('column', [
        'key1' => 'value1', 
        'key2' => 'value2', 
        'key3' => 'value3', 
    ])->get();

* 1st argument is column name.
* 2nd argument is array containing value you want to retrieve from the column value.  

# License

This package is licensed under the MIT License.

Copyright 2016 Sukohi Kuhoh