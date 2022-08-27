<?php

class AccountObj {

    private $id;
    private $email;
    private $password;
    private $displayName;
    private $activationCode;
    private $rememberMe;
    private $loggedIn;

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getDisplayName() {
        return $this->displayName;
    }

    public function getActivationCode() {
        return $this->activationCode;
    }

    public function getRememberMe() {
        return $this->rememberMe;
    }

    public function getLoggedIn() {
        return $this->loggedIn;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setDisplayName($displayName) {
        $this->displayName = $displayName;
    }

    public function setActivationCode($activationCode) {
        $this->activationCode = $activationCode;
    }

    public function setRememberMe($rememberMe) {
        $this->rememberMe = $rememberMe;
    }

    public function setLoggedIn($loggedIn) {
        $this->loggedIn = $loggedIn;
    }

}
