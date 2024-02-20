<?php

namespace Models;

class Roles
{

    protected $fillable = [
        'name',
        'slug',
    ];
    public function get(){
        var_dump($this->fillable);
    }
}