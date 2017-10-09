<?php

namespace CJ\Comment\HTMLForm;

use \Anax\HTMLForm\FormModel;
use \Anax\DI\DIInterface;
use \CJ\Comment\Comment;

/**
 * Form to create an item.
 */
class EditCommentForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param Anax\DI\DIInterface $di a service container
     */
    public function __construct(DIInterface $di, $comment)
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
                    "class" => "form-control",
                    "value" => "$comment->heading"
                ],

                "message" => [
                    "type" => "textarea",
                    "validation" => ["not_empty"],
                    "class" => "form-control",
                    "value" => "$comment->msg"
                ],

                "id" => [
                    "type" => "hidden",
                    "class" => "form-control",
                    "value" => "$comment->id"
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
        $id = $this->form->value("id");

        $comment = new Comment();
        $comment->setDb($this->di->get("db"));

        $comment->find("id", $id);
        $comment->msg = $message;
        $comment->heading = $title;

        $comment->save();

        $this->form->addOutput("Kommentar uppdaterad");
        return true;
    }
}
