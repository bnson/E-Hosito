<?php

class PageObj {

    private $id;
    private $group;
    private $name;
    private $title;
    private $description;
    private $keywords;
    private $url;
    private $note;
    private $status;
    private $messageError;

    public function getId() {
        return $this->id;
    }

    public function getGroup() {
        return $this->group;
    }

    public function getName() {
        return $this->name;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getKeywords() {
        return $this->keywords;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getNote() {
        return $this->note;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setGroup($group) {
        $this->group = $group;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setKeywords($keywords) {
        $this->keywords = $keywords;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function setNote($note) {
        $this->note = $note;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getMessageError() {
        return $this->messageError;
    }

    public function setMessageError($messageError) {
        $this->messageError = $messageError;
    }

}
