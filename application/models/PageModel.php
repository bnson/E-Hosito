<?php

class PageModel extends Db {
       
    public function getPageObjByName($pageName) {
        $$pageName = strtolower($pageName);
        $sql = "SELECT id, `group`, name, title, description, keywords, url, note, status FROM configuration_page WHERE LOWER(name) = '{$pageName}'";
        $result = $this->connect()->query($sql);
        $pageObj = null;
        
        while ($pageObj = $result->fetch_object('PageObj')) {
            break;
        }
        
        return $pageObj;
    }    
        

}
