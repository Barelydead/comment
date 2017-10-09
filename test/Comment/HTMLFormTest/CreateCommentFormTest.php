<?php
namespace CJ\Comment\HTMLForm;

use CJ\User\User;

/**
 * Unit test for CreateCommentForm Class
 */
class CreateCommentFormTest extends \PHPUnit_Framework_TestCase
{
    protected $di;

    protected function setUp()
    {
        $this->di = new \Anax\DI\DIFactoryConfig("testDiConfig.php");
    }

    public function testConstruct()
    {
        $user = new User();
        $form = new CreateCommentForm($this->di, $user);

        $this->assertTrue(is_string($form->getHTML()));
    }
}
