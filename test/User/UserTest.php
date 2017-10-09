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

    /*
     *
    */
    public function testAttributes()
    {
        $this->assertClassHasAttribute("id", "\CJ\User\User");
        $this->assertClassHasAttribute("created", "\CJ\User\User");
        $this->assertClassHasAttribute("mail", "\CJ\User\User");
    }

    /*
     *
    */
    public function testSetPassword()
    {
        $this->user->setPassword("test");

        $this->assertTrue(is_string($this->user->password));
    }

    /*
     *
    */
    public function testVerifyPassword()
    {
        $this->user->setPassword("test");

        $this->assertTrue($this->user->verifyPassword("test@test.se", "test"));
    }


    /*
     *
    */
    public function testGetAllUser()
    {
        $res = $this->user->getAllUsers();

        $this->assertTrue(is_array($res));
    }


    /*
     *
    */
    public function testGetLoggedInUserId()
    {
        $loggedIn = $this->user->getLoggedInUserId();

        $this->assertEquals($loggedIn, true);
    }


    /*
     *
    */
    public function testIsUserLoggedIn()
    {
        $this->assertTrue($this->user->isLoggedIn());
    }

    /*
     *
    */
    public function testIsUserAdmin()
    {
        $this->user->find("id", 1);

        $this->user->userType = "admin";

        $this->assertTrue($this->user->isUserAdmin());

        $this->user->userType = "user";

        $this->assertFalse($this->user->isUserAdmin());
    }

    /*
     *
    */
    public function testGetUserImg()
    {
        $this->assertTrue(strlen($this->user->getUserImg("test")) > 6);
    }

    /*
     *
    */
    public function testGetLoggedInUser()
    {
        $this->user->mail = "test";
        $this->user->save();
        $testUser = $this->user->getLoggedInUser();

        $this->assertEquals($testUser->mail, "test");

        $this->di->get("session")->delete("user");
        $testUser = $this->user->getLoggedInUser();

        $this->assertEquals($testUser, null);

        $this->user->deleteUser(1);
    }


    /*
     *
    */
    public function testDeleteUser()
    {
        $this->user->mail = "test";
        $this->user->save();
        $this->user->deleteUser(1);

        $this->assertEquals($this->user->getUser(1), null);
    }
}
