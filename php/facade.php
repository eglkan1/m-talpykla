<?php

/**
 * The Facade class provides a simple interface to the complex logic of one or
 * several subsystems. The Facade delegates the client requests to the
 * appropriate objects within the subsystem. The Facade is also responsible for
 * managing their lifecycle. All of this shields the client from the undesired
 * complexity of the subsystem.
 */
class Facade
{
    protected $question;

    protected $answer;

    /**
     * Depending on your application's needs, you can provide the Facade with
     * existing subsystem objects or force the Facade to create them on its own.
     */
    public function __construct(
        question $question = null,
        answer $answer = null
    ) {
        $this->question = $question ?: new Question();
        $this->answer = $answer ?: new Answer();
    }

    /**
     * The Facade's methods are convenient shortcuts to the sophisticated
     * functionality of the subsystems. However, clients get only to a fraction
     * of a subsystem's capabilities.
     */
    public function operation($qu, $an)
    {
        $errors = array();

        $db = mysqli_connect('localhost','root','','mtalpykla') or die("cannot connect to database");

        $question_query = $this->question->create($qu);
        $questionid = $db->query($question_query);

        $answer_query = $this->answer->create($an, $questionid, 1);
        $db->query($answer_query);

        print_r($question_query);
        print_r($answer_query);

    }
}

/**
 * The Subsystem can accept requests either from the facade or client directly.
 * In any case, to the Subsystem, the Facade is yet another client, and it's not
 * a part of the Subsystem.
 */
class Question
{
    private $quest;
    private $id;

    public function create($question_in)
    {
        $query = "INSERT INTO `questions` (`question`, `id`, `image`, `TYPE`, `oldID`, `fk_TESTid`) VALUES ('$question_in', NULL, NULL, 'radio', NULL, '3'); SELECT LAST_INSERT_ID();";
        return $query;
    }
}

/**
 * Some facades can work with multiple subsystems at the same time.
 */
class Answer
{
    private $ans;
    private $id;

    public function create($answer_in, $questionid_in, $isRight)
    {
        $query = "INSERT INTO `answers` (`answer`, `isRightChoice`, `id`, `fk_QUESTIONid`, `fk_RESPONSEid_RESPONSE`) VALUES ('$answer_in', '$isRight', NULL, '$questionid_in', NULL);";
        return $query;
    }
}

/**
 * The client code works with complex subsystems through a simple interface
 * provided by the Facade. When a facade manages the lifecycle of the subsystem,
 * the client might not even know about the existence of the subsystem. This
 * approach lets you keep the complexity under control.
 */
function clientCode(Facade $facade)
{
    $facade->operation("Kas as esu?", "Niekas");
}

/**
 * The client code may have some of the subsystem's objects already created. In
 * this case, it might be worthwhile to initialize the Facade with these objects
 * instead of letting the Facade create new instances.
 */
$question = new Question();
$answer = new Answer();
$facade = new Facade($question, $answer);
clientCode($facade);