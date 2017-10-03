<?php
namespace CJ\User;

/**
 * Unit test for User class
 */
class UserTest extends \PHPUnit_Framework_TestCase
{

    protected $di;
    protected $user;

    protected function setUp()
    {
        $this->di = new \Anax\DI\DIFactoryConfig("testDiConfig.php");
        $this->user = new \CJ\User\User();
        $this->user->init($this->di->get("db"), $this->di->get("session"));

        $session = $this->di->get("session");
        $session->set("user", 1);
    }

    protected function tareDown()
    {
        $this->user->deleteUser(1);
    }

    public function testAttributes()
    {
        $this->assertClassHasAttribute("id", "\CJ\User\User");
        $this->assertClassHasAttribute("created", "\CJ\User\User");
        $this->assertClassHasAttribute("mail", "\CJ\User\User");
    }

    public function testSetPassword()
    {
        $this->user->setPassword("test");

        $this->assertTrue(is_string($this->user->password));
    }

    public function testVerifyPassword()
    {
        $this->user->mail = "test@test.se";
        $this->user->setPassword("test");

        $this->assertTrue($this->user->verifyPassword("test@test.se", "test"));
    }

    public function testGetAllUser()
    {
        $res = $this->user->getAllUsers();

        $this->assertTrue(is_array($res));
    }


    public function testGetLoggedInUserId()
    {
        $loggedIn = $this->user->getLoggedInUserId();

        $this->assertEquals($loggedIn, 1);
    }

    public function testIsUserLoggedIn()
    {
        $this->assertTrue($this->user->isLoggedIn());
    }
}
