<?php

class StrategyContext {
    private $strategy = NULL; 
    //bookList is not instantiated at construct time
    public function __construct($strategy_ind_id) {
        switch ($strategy_ind_id) {
            case "a": 
                $this->strategy = new StrategyTests();
            break;
            case "b": 
                $this->strategy = new StrategyFiles();
            break;
        }
    }
    public function showFolders_context() {
      return $this->strategy->showFolders();
    }
}

interface StrategyInterface {
    public function showFolders();
}
 
class StrategyTests implements StrategyInterface {
    public function showFolders() {
        $query = "SELECT `folders`.`id`, `folders`.`title`, FROM `folders` JOIN `tests` ON `tests`.`fk_FOLDERid`=`folders`.`id` WHERE `tests`.`public`=1";
        return $query;
    }
}

class StrategyFiles implements StrategyInterface {
    public function showFolders() {
        $query = "SELECT `folders`.`id`, `folders`.`title`, FROM `folders` INNER JOIN `files` ON `files`.`fk_FOLDERid`=`folders`.`id` WHERE `tests`.`public`=1";
        return $query;
    }
}

class Folder {
    private $id;
    private $title;
    /*private $password;
    private $public;
    private $fk_TEACHERid;
    
    function __construct($id_in, $title_in, $password_in, $public_in, $fk_TEACHERid_in) {
        $this->id = $id_in;
        $this->title  = $title_in;
        $this->password = $password_in;
        $this->public  = $public_in;
        $this->fk_TEACHERid  = $fk_TEACHERid_in;
    }
    function getId() {
        return $this->id;
    }
    function getTitle() {
        return $this->title;
    }
    function getPassword() {
        return $this->password;
    }
    function getPublic() {
        return $this->public;
    }
    function getFk_TEACHERid() {
        return $this->fk_TEACHERid;
    }
    function getTeacherAndTitle() {
        return $this->getFk_TEACHERid() . ' -> ' . $this->getTitle();
    }
    */
    function __construct($id_in, $title_in) {
        $this->id = $id_in;
        $this->title  = $title_in;
    }
    function getId() {
        return $this->id;
    }
    function getTitle() {
        return $this->title;
    }
}
    $errors = array();

    $db = mysqli_connect('localhost','root','','mtalpykla') or die("cannot connect to database");
  writeln('BEGIN TESTING STRATEGY PATTERN');
  writeln('');

  //$book = new Folder('PHP for Cats','Larry Truett');
 
  $strategyContextTests = new StrategyContext('a');
  $strategyContextFiles = new StrategyContext('b');
 
  writeln('test 1 - show folders that has public tests');
  $newQuery = $strategyContextTests->showFolders_context();
  writeln($newQuery);
  //$db -> query($newQuery);

  writeln('test 2 - show folders that has public files');
  $newQuery2 = $strategyContextFiles->showFolders_context();
  writeln($newQuery2);
  //$db -> query($newQuery2);

  writeln('');

  function writeln($line_in) {
    echo $line_in."<br/>";
  }

?>