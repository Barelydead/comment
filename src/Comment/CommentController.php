<?php

namespace CJ\Comment;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;
use \CJ\User\User;
use \CJ\Comment\Comment;
use \CJ\Comment\HTMLForm\CreateCommentForm;
use \CJ\Comment\HTMLForm\EditCommentForm;

/**
 * A controller for the comment section
 */
class CommentController implements InjectionAwareInterface
{
    use InjectionAwareTrait;



    /**
     * process incomming POST
     */
    public function newComment()
    {
        $umodel = $this->di->get("umodel");

        if (!$umodel->isLoggedIn()) {
            $this->di->get("response")->redirect($this->di->get("url")->create("user/login"));
        }

        $form = new CreateCommentForm($this->di, $umodel->getLoggedInUserId());
        $form->check();

        $data = ["form" => $form->getHTML()];

        $this->di->get("view")->add("user/createUser", $data);

        $this->di->get("pageRender")->renderPage(["title" => "CommentForm"]);
    }

    /**
     * remove one comment
     */
    public function removeComment($index)
    {
        $user = $this->di->get("umodel");
        $comment = $this->di->get("cmodel");

        $comment->getComment($index);


        if ($comment->user !== $this->di->get("session")->get("user")) {
            if ($user->isUserAdmin()) {
                // Do nothing
            } else {
                $this->di->get("response")->redirect($this->di->get("url")->create("comment"));
            }
        }


        $comment->deleteComment($index);
        $this->di->get("response")->redirect($this->di->get("url")->create("comment"));
    }

    /**
     * load edit page
     */
    public function editComment($index)
    {
        $comment = $this->di->get("cmodel")->getComment($index);
        $user = $this->di->get("umodel");


        if ($comment->user !== $this->di->get("session")->get("user")) {
            if ($user->isUserAdmin()) {
                // Do nothing
            } else {
                $this->di->get("response")->redirect($this->di->get("url")->create("comment"));
            }
        }

        $form = new EditCommentForm($this->di, $comment);
        $form->check();

        $data = ["form" => $form->getHTML()];

        $this->di->get("view")->add("user/update", $data, "main");
        $this->di->get("pageRender")->renderPage(["title" => "guestbook - edit"]);
    }


    /**
     * render comment view
     */
    public function renderComments()
    {
        $data = ["title" => "guestbook"];
        $comments = $this->di->get("cmodel")->getComments();
        $comments = array_reverse($comments);

        $this->di->get("view")->add("components/commentholder", ["comments" => $comments], "main");
        $this->di->get("pageRender")->renderPage($data);
    }
}
