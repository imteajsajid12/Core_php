<?php

namespace Http\Forms;

class LohinForm
{
    /**
     * @var array
     */
    protected $Errors=[];
public  function __construct(){

}

public function validate($email , $password): array
{
    //validation
    if (!\Core\Validation::string($email, 5, 255)) {
        $this->Errors['errors'] = 'Email is required';
    }
    if (!\Core\Validation::string($password, 6, 255)) {
        $this->Errors['errors'] = 'Password is required';
    }
    return $this->Errors;

}

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->Errors;
    }
}