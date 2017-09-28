<?php
/**
 * Configuration file for DI container.
 */
return [

    // Services to add to the container.
    "services" => [
        "commentController" => [
            "shared" => false,
            "callback" => function () {
                $ccontrol = new \CJ\Comment\CommentController();
                $ccontrol->setDI($this);
                return $ccontrol;
            }
        ],
        "comment" => [
            "shared" => false,
            "callback" => function () {
                $cmodel = new \CJ\Comment\Comment();
                $cmodel->init($this->get("db"));
                return $cmodel;
            }
        ],
        "umodel" => [
            "shared" => false,
            "callback" => function () {
                $umodel = new \CJ\User\User();
                $umodel->init($this->get("db"), $this->get("session"));
                return $umodel;
            }
        ],
    ],
];
