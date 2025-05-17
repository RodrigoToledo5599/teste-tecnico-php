<?php

class User
{
    public ?int    $id;
    public string  $username;
    public string  $password;


    public function __construct(
        ?int    $id     = null,
        string  $username,
        string  $password,
    ) {
        $this->username   = $username;
        $this->password   = $password;
        $this->id         = $id;
    }
}