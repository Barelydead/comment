<?php
namespace CJ\Comment;

use \Anax\Database\ActiveRecordModel;

/**
 * A database driven model.
 */
class Comment extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "c_comments";

    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $user;
    public $msg;
    public $heading;
    public $postDate;
    public $deleted;
    public $updated;
    public $liked;


    /**
    *  Inits the object with the dabase
    */
    public function init($db) {
        $this->setDb($db);
    }

    /**
     * Gets all comments from Db
     */
    public function getComments()
    {
        return $this->findAll();
    }

    /**
     * Gets all comments from Db
     */
    public function getComment($index)
    {
        return $this->find("id", $index);
    }


    /**
     * Delete comment with a specific ID
     */
    public function deleteComment($index)
    {
        $this->find("id", $index);
        $this->delete();
    }
}
