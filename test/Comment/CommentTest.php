<?php
namespace CJ\Comment;

/**
 * Unit test for Comment class
 */
class CommentTest extends \PHPUnit_Framework_TestCase
{

    protected $di;
    protected $comment;

    protected function setUp()
    {
        $this->di = new \Anax\DI\DIFactoryConfig("testDiConfig.php");
        $this->comment = new \CJ\Comment\Comment();
    }


    /**
     * Test case for init of new object
     */
    public function testAttributes()
    {
        $this->assertClassHasAttribute("id", "\CJ\Comment\Comment");
        $this->assertClassHasAttribute("heading", "\CJ\Comment\Comment");
        $this->assertClassHasAttribute("userId", "\CJ\Comment\Comment");
        $this->assertClassHasAttribute("userMail", "\CJ\Comment\Comment");
    }


    /**
     * Test case for init of new object
     */
    public function testInit()
    {
        $this->comment->init($this->di->get("db"));
    }

    /**
     * Test case for init of new object
     */
    public function testFindIndex()
    {
        $this->comment->init($this->di->get("db"));
        $obj = $this->comment->getComment(1);


        $this->assertEquals($obj, false);
    }

    /**
     * Test case for init of new object
     */
    public function testFindAll()
    {
        $this->comment->init($this->di->get("db"));
        $obj = $this->comment->getComments();


        $this->assertEquals($obj, []);
    }


    /**
     * Test case for init of new object
     */
    public function testDeleteComment()
    {
        $this->comment->init($this->di->get("db"));
        $this->comment->id = 1;
        $obj = $this->comment->deleteComment(1);
    }


    /**
     * Test case for init of new object
     */
    public function testGetAvatar()
    {
        $this->comment->init($this->di->get("db"));
        $avatar = $this->comment->getAvatar(1);

        $this->assertTrue(is_string($avatar));
    }
}
