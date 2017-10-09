<?php
namespace CJ\Comment\HTMLForm;

use CJ\User\User;

/**
 * Unit test for CreateCommentForm Class
 */
class CreateCommentFormTest extends \PHPUnit_Framework_TestCase
{
    protected $di;
    protected $form;

    protected function setUp()
    {
        $this->di = new \Anax\DI\DIFactoryConfig("testDiConfig.php");
        $user = new User();
        $this->form = new CreateCommentForm($this->di, $user);
    }

    public function testConstruct()
    {
        $this->assertTrue(is_string($this->form->getHTML()));
    }
}
