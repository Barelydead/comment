<?php

namespace CJ\Comment;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;
use \CJ\Comment\Comment;

class CommentModel implements InjectionAwareInterface
{
    use InjectionAwareTrait;


    /**
     * Gets all comments from session
     */
    public function getComments()
    {
        $db = $this->di->get("db");

        $comments = new Comment();
        $comments->setDb($db);

        return $comments->findAll();
    }

    /**
     * Gets all comments from session
     */
    public function getComment($index)
    {
        $db = $this->di->get("db");

        $comments = new Comment();
        $comments->setDb($db);

        return $comments->find("id", $index);
    }


    /**
     *
     */
    public function delete($index)
    {
        $comment = new Comment();
        $comment->setDb($this->di->get("db"));

        $comment->delete($index);
    }
}
