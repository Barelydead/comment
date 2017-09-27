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
    ],
];
