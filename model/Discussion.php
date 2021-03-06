<?php
require 'Message.php';
class Discussion    
{
    const NbMaxWords = 2;
    private $i_myDiscussionId;
    private $s_myName;
    private $i_myNbLike;
    private $b_myState;
    private $i_myNbMaxMessage;
    private $tab_myMessages = array();
    function __construct($i_discussionId)
    {
        $dbLink = dbConnect();
        $query = 'SELECT discussionName, nbLike, state, nbMaxMessages FROM Discussion WHERE discussionId = \'' . $i_discussionId.'\'';
        $dbResult = testError($dbLink,$query);
        while($dbRow = mysqli_fetch_assoc($dbResult))
        {
            $this->s_myName = $dbRow['discussionName'];
            $this->i_myNbLike =$dbRow['nbLike'];
            $this->b_myState = $dbRow['state'];
            $this->i_myNbMaxMessage = $dbRow['nbMaxMessages'];
        }
        $this->i_myDiscussionId = $i_discussionId;
        $query = 'SELECT messageId, date, state FROM Message WHERE discussionId = \'' . $i_discussionId . '\' ORDER BY date';
        $dbResult = testError($dbLink,$query);
        while($dbRow = mysqli_fetch_assoc($dbResult))
        {
            $this->tab_myMessages[] = new Message($dbRow['messageId'],$dbRow['date'], $dbRow['state']);
        }
    }
    public function canOpenDiscussion()
    {
        if(count($this->tab_myMessages) < $this->i_myNbMaxMessage) return 1;
        else return 0;
    }
    public function closeAMessage()
    {
        end($this->tab_myMessages)->closeMessage();
    }
    public function lastMessage()
    {
        $i_lastMessage = -1 ;
        $dbLink = dbConnect();
        $query = 'SELECT messageId FROM Message WHERE discussionId = \'' . $this->i_myDiscussionId .'\' AND state = 1' ;
        $dbResult = testError($dbLink,$query);
        while($dbRow = mysqli_fetch_assoc($dbResult))
        {
            $i_lastMessage = $dbRow['messageId'];
        }
        return $i_lastMessage;
    }
    public function getMessages()
    {
        return $this->tab_myMessages;
    }
    public function getNbMessages()
    {
        return count($this->tab_myMessages);
    }
    public function closeDiscussion()
    {
        $this->b_myState = 0;
        $dbLink = dbConnect();
        $query = 'UPDATE Discussion SET state = 0 WHERE discussionId = ' . $this->i_myDiscussionId;
        testError($dbLink,$query);
    }
    /**
     * @param mixed $b_myState
     */
    public function openDiscussion()
    {
        $this->b_myState = 1;
        $dbLink = dbConnect();
        $query = 'UPDATE Discussion SET state = 1 WHERE discussionId = ' . $this->i_myDiscussionId;
        testError($dbLink,$query);
    }
    /**
     * @return mixed
     */
    public function getDiscussionId()
    {
        return $this->i_myDiscussionId;
    }
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->s_myName;
    }

    /**
     * @return mixed
     */
    public function getNbLike()
    {
        return $this->i_myNbLike;
    }
    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->b_myState;
    }
}
