<?php

//$errors = array();

//$db = mysqli_connect('localhost','root','','mtalpykla') or die("cannot connect to database");

class Question {    
    private $question;   
    private $image;      
    private $type;   
    private $oldID;   
    private $fk_TESTid; 

    function __construct($question_in, $image_in, $type_in, $oldID_in, $fk_TESTid_in) {
      $this->setQuestion($question_in);
      $this->setImage($image_in);
      $this->setType($type_in);
      $this->setOldID($oldID_in);
      $this->setFk_TESTid($fk_TESTid_in);
    }  
    public function getQuestion() {
      return $this->question;
    }      
    public function setQuestion($question_in) {
      $this->question = $question_in;
    }
    public function getImage() {
      return $this->image;
    }      
    public function setImage($image_in) {
      $this->image = $image_in;
    }
    public function getType() {
      return $this->type;
    }      
    public function setType($type_in) {
      $this->type = $type_in;
    }  
    public function getOldID() {
      return $this->oldID;
    }      
    public function setOldID($oldID_in) {
      $this->oldID = $oldID_in;
    }
    public function getFk_TESTid() {
      return $this->fk_TESTid;
    }    
    public function setFk_TESTid($fk_TESTid_in) {
      $this->fk_TESTid = $fk_TESTid_in;
    }
}

class Memento {      
    private $question;   
    private $image;      
    private $type;   
    private $oldID;   
    private $fk_TESTid;   
    function __construct(Question $quest) {
        $this->setQuestion($quest);
        $this->setImage($quest);
        $this->setType($quest);
        $this->setOldID($quest);
        $this->setFk_TESTid($quest);
    }  
    public function getQuestion(Question $quest) {
      $quest->setQuestion($this->question);
    }  
    public function setQuestion(Question $quest) {
      $this->question = $quest->getQuestion();
    }    
    public function getImage(Question $quest) {
      $quest->setImage($this->image);
    }      
    public function setImage(Question $quest) {
      $this->image = $quest->getImage();
    }    
    public function getType(Question $quest) {
      $quest->setType($this->type);
    }      
    public function setType(Question $quest) {
      $this->type = $quest->getType();
    }    
    public function getOldID(Question $quest) {
      $quest->setOldID($this->oldID);
    }      
    public function setOldID(Question $quest) {
      $this->oldID = $quest->getOldID();
    }       
    public function getFk_TESTid(Question $quest) {
      $quest->setFk_TESTid($this->fk_TESTid);
    }      
    public function setFk_TESTid(Question $quest) {
      $this->fk_TESTid = $quest->getFk_TESTid();
    }   
    /*public function toString()
    {
        $line_in = $question $image $type $oldID $fk_TESTid;  
        writeln($line_in);
    }
    */
}

  // Client

  writeln('BEGIN TESTING MEMENTO PATTERN');
  writeln('');
 
  $bookReader = new Question('Core PHP Programming', '','radio', '' ,'2');
  $bookMark = new Memento($bookReader);
 
  writeln('(at beginning) bookReader title: '.$bookReader->getQuestion());
  writeln('(at beginning) bookReader page: '.$bookReader->getFk_TESTid());
 
  $bookReader->setQuestion("104");
  $bookMark->setQuestion($bookReader);
  writeln('(one page later) bookReader page: '.$bookReader->getQuestion());  

//   $bookReader->setQuestion('2005');  //oops! a typo
  writeln('(after typo) bookReader page: '.$bookReader->getQuestion());    
 
  $bookMark->getQuestion($bookReader);
  writeln('(back to one page later) bookReader page: '.$bookReader->getQuestion());    
  writeln('');

  writeln('END TESTING MEMENTO PATTERN');

  function writeln($line_in) {
    echo $line_in."<br/>";
  }

?> 