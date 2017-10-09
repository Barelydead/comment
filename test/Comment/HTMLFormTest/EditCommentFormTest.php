<?php
namespace CJ\Comment\HTMLForm;

use CJ\Comment\Comment;

/**
 * Unit test for EditCommentForm Class
 */
class EditCommentFormTest extends \PHPUnit_Framework_TestCase
{
    protected $di;
    protected $form;

    protected function setUp()
    {
        $this->di = new \Anax\DI\DIFactoryConfig("testDiConfig.php");
        $comment = new Comment();
        $this->form = new EditCommentForm($this->di, $comment);
    }

    protected function tearDown()
    {
        $db = $this->di->get("db");
        $db->connect();

        $db->execute("DELETE FROM c_comments");
    }

    public function testConstruct()
    {
        $this->assertTrue(is_string($this->form->getHTML()));
    }

    public function testCallback()
    {
        $this->assertTrue($this->form->callbackSubmit());
    }
}
