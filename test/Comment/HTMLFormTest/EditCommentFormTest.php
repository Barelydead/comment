<?php
namespace CJ\Comment\HTMLForm;

use CJ\Comment\Comment;

/**
 * Unit test for EditCommentForm Class
 */
class EditCommentFormTest extends \PHPUnit_Framework_TestCase
{
    protected $di;

    protected function setUp()
    {
        $this->di = new \Anax\DI\DIFactoryConfig("testDiConfig.php");
    }

    public function testConstruct()
    {
        $comment = new Comment();
        $form = new EditCommentForm($this->di, $comment);

        $this->assertTrue(is_string($form->getHTML()));
    }
}
