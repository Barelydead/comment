<?php
namespace CJ\Comment;

/**
 * Unit test for Comment class
 */
class CommentControllerTest extends \PHPUnit_Framework_TestCase
{

    protected $di;
    protected $controller;

    protected function setUp()
    {
        $this->di = new \Anax\DI\DIFactoryConfig("testDiConfig.php");
        $this->controller = $this->di->get("commentController");
    }


    public function testRenderCommentsMethod()
    {
        $this->controller->renderComments();
    }

}
