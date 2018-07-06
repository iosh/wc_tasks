<?php

namespace App;
use Illuminate\Contracts\Auth\Access\Gate;

trait Authorizable
{
    private $abilities = [
        'index' => 'view',
        'edit' => 'edit',
        'show' => 'view',
        'update' => 'edit',
        'create' => 'add',
        'store' => 'add',
        'destroy' => 'delete',
        'self'  => 'self'
    ];

    /**
     * Override of callAction to perform the authorization before
     *
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public function callAction($method, $parameters)
    {
        $routeName = explode('.', \Request::route()->getName());
        $action = array_get($this->getAbilities(), $method);
        $ability = $action ? $action . '_' . $routeName[0] : null;
        
        if( $ability) {
            if($routeName[0] == "users") {
                $this->authorize($ability);    
            }
            
        }

        return parent::callAction($method, $parameters);
    }

    private function getAbilities()
    {
        return $this->abilities;
    }

    public function setAbilities($abilities)
    {
        $this->abilities = $abilities;
    }
}