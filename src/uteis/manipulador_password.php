<?php

class ManipuladorPassword {

    static public function hash_password($password): string{
        return password_hash($password, PASSWORD_BCRYPT);
    }
    
    
    static public function verify_password($password, $hash): bool{
        return password_verify($password, $hash);
    }
}