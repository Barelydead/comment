<?php

namespace CJ\Comment\HTMLForm;

use \Anax\HTMLForm\FormModel;
use \Anax\DI\DIInterface;
use \CJ\Comment\Comment;

/**
 * Form to create an item.
 */
class CreateCommentForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param Anax\DI\DIInterface $di a service container
     */
    public function __construct(DIInterface $di, $user)
    {
        parent::__construct($di);
        $this->form->create(
            [
                "id" => __CLASS__,
            ],
            [
                "title" => [
                    "type" => "text",
                    "validation" => ["not_empty"],
                    "class" => "form-control"
                ],

                "message" => [
                    "type" => "textarea",
                    "validation" => ["not_empty"],
                    "class" => "form-control"
                ],
                "user" => [
                    "type" => "hidden",
                    "value" => "$user->id"
                ],
                "userMail" => [
                    "type" => "hidden",
                    "value" => "$user->mail"
                ],
                "submit" => [
                    "type" => "submit",
                    "value" => "Comment",
                    "callback" => [$this, "callbackSubmit"],
                    "class" => "btn btn-default"
                ],
            ]
        );
    }



    /**
     * @return boolean true if okey, false if something went wrong.
     */
    public function callbackSubmit()
    {
        $title = $this->form->value("title");
        $message = $this->form->value("message");
        $user = $this->form->value("user");
        $userMail = $this->form->value("userMail");

        $comment = new Comment();
        $comment->setDb($this->di->get("db"));

        $comment->msg = $message;
        $comment->userId = $user;
        $comment->userMail = $userMail;
        $comment->heading = $title;
        $comment->save();

        $this->di->get("response")->redirect("comment");
    }
}
