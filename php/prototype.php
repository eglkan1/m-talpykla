<?php


/**
 * Prototype.
 */
class Question
{   
    public function __construct($question, $id, $image, $type, $oldID, $fk_TESTid)
    {
        $this->question = $question;
        $this->id = $id;
        $this->image = $image;
        $this->type = $type;
        $this->oldID = $oldID;
        $this->fk_TESTid = $fk_TESTid;
    }

    public function __clone()
    {
        $this->oldID = $this->id;
        $this->question = $this->question;
        $this->id = null;
        $this->image = $this->image;
        $this->type = $this->type;
        $this->fk_TESTid = $this->fk_TESTid;
    }
    public function getQuestion() {
        return $this->question;
      }      
      public function getId() {
        return $this->id;
      }      
      public function getImage() {
        return $this->image;
      }      
      public function getType() {
        return $this->type;
      }      
      public function getOldID() {
        return $this->oldID;
      }      
      public function getFk_TESTid() {
        return $this->fk_TESTid;
      }    
}

function clientCode()
{
    //$question_id_in = mysqli_real_escape_string($db, $_UPDATE['id']);
    
session_start();
    $errors = array();

    $db = mysqli_connect('localhost','root','','mtalpykla') or die("cannot connect to database");
    $question_id_in = mysqli_real_escape_string($db, 4);
    //SELECT `question`, `id`, `image`, `TYPE`, `oldID`, `fk_TESTid` FROM `questions` WHERE `id`=3
    $query = "SELECT `question`, `id`, `image`, `TYPE`, `oldID`, `fk_TESTid` FROM `questions` WHERE `id`= '$question_id_in'";
    $results = mysqli_query($db, $query);
    $db_field = mysqli_fetch_assoc( $results);
    //$quest = new Question($results[''],'2', '','radio', '' ,'2');
    $quest = new Question($db_field['question'], $db_field['id'], $db_field['image'], $db_field['TYPE'], $db_field['oldID'], $db_field['fk_TESTid']);
    $draft = clone $quest;
    $q = $draft->getQuestion();
    $i = $draft->getImage();
    $t = $draft->getType();
    $o = $draft->getOldID();
    $f = $draft->getFk_TESTid();
    $newQuery = "INSERT INTO `questions` (`question`, `id`, `image`, `TYPE`, `oldID`, `fk_TESTid`) VALUES ('$q', NULL, '$i', '$t', '$o', '$f')";
    //echo($newQuery);
    //print_r($db_field['question']);
    //$draft = clone $quest;
    //print_r($quest);
    //print_r($draft);
    $db -> query($newQuery);
}

clientCode();