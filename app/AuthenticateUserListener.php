<?php 

namespace app;

interface AuthenticateUserListener {
    
    /**
     * @param $user
     * @return mixed
     */
    public function userHasLoggedIn($user);
}