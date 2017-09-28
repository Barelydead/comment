<?php

namespace CJ\Comment;

Use CJ\Comment\Comment();
Use CJ\Comment\CommentController();

/**
 * Unit test for Comment class
 */
class CommentTest extends \PHPUnit_Framework_TestCase
{
    private $comment;
    private $commentController;


    /**
     * Construct
     */
    public function __construct() {
        $this->comment = new Comment();
        $this->commentContrller = new CommentController();
    }

    /**
     * Testcases
     */
    public function test()
    {

    }
}
