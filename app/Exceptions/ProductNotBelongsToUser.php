<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelongsToUser extends Exception
{
    public function render(){
        return ['Errors' => 'Product Not Belongs To User'];
    }
}
