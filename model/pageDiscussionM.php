<?php
require 'Discussion.php';

function createMessage($i_discussionId)
{
    $dbLink = dbConnect();
    $d_date = date('Y-m-d H:i:s');
    $query = "INSERT INTO Message (discussionId, date, state) VALUES ('$i_discussionId','$d_date', 1)";
    testError($dbLink,$query);
}

function addToMessage($s_contents, $i_messageId, $i_authorId)
{
    $dbLink = dbConnect();
    $d_date = date('Y-m-d H:i:s');
    $query = "INSERT INTO Post(messageId, authorId, contents, date) VALUES ('$i_messageId','$i_authorId', '$s_contents','$d_date')";
    testError($dbLink,$query);
}

function getDiscussions()
{
    $tab_discussions = array();
    $dbLink = dbConnect();
    $query = 'SELECT discussionId FROM Discussion ORDER BY nbLike DESC';
    $dbResult = testError($dbLink,$query);
    while($dbRow = mysqli_fetch_assoc($dbResult))
    {
        $tab_discussions[] = new Discussion($dbRow['discussionId']);
    }
    return $tab_discussions;
}

function testIfLike($i_discussionId, $i_userId)
{
    $i_cpt = 0;
    $dbLink = dbConnect();
    $query = "SELECT discussionId FROM LikeDiscussion WHERE discussionId = '$i_discussionId' AND userId = '$i_userId'";
    $dbResult = testError($dbLink,$query);
    while($dbRow = mysqli_fetch_assoc($dbResult))
    {
        ++$i_cpt;
    }
    return $i_cpt;
}

function addLike($i_discussionId, $i_userId)
{
    $dbLink = dbConnect();
    $query = "INSERT INTO LikeDiscussion (discussionId, userID) VALUES ('$i_discussionId', '$i_userId')";
    testError($dbLink,$query);
    $query = "UPDATE Discussion SET nblike = nbLike + 1 WHERE discussionId = '$i_discussionId'";
    testError($dbLink,$query);
}

function removeLike ($i_discussionId, $i_userId)
{
    $dbLink = dbConnect();
    $query = "DELETE FROM LikeDiscussion WHERE discussionId = '$i_discussionId' AND userID = '$i_userId'";
    testError($dbLink,$query);
    $query = "UPDATE Discussion SET nblike = nbLike - 1 WHERE discussionId = '$i_discussionId'";
    testError($dbLink,$query);
}

function isAlreadyComment($i_messageId, $i_userId)
{
    $i_cpt = 0;
    $dbLink = dbConnect();
    $query = "SELECT * FROM Post WHERE messageId = '$i_messageId' AND authorId = '$i_userId'";
    $dbResult = testError($dbLink,$query);
    while($dbRow = mysqli_fetch_assoc($dbResult))
    {
        ++$i_cpt;
    }
    return $i_cpt;
}

