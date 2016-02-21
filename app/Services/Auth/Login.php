<?php
namespace App\Services\Auth;
abstract class Login 
{
    
    abstract protected function validateCode();
    
    abstract protected function validateData();
    
    abstract protected function validatePassword();
    
    abstract protected function loginBefore();
    
    abstract protected function logining();
    
    abstract protected function loginAfter();
    
    public function logind()
    {
        $this->validateCode();
        
        $this->validateData();
        
        $this->validatePassword();
    }
    
}