CJ comment
==================================

[![Latest Stable Version](https://poser.pugx.org/cj/comments/v/stable)](https://packagist.org/packages/cj/comment)
[![Join the chat at
[![Build Status](https://travis-ci.org/Barelydead/comment.svg?branch=master)](https://travis-ci.org/barelydead/comment)


Anax comment module.

Requirements
-----------------
Have previous knowledge on how to use the anax framework.
Have a scaffolded or otherwise functioning instance of the anax framework.


Install
--------------------
You can install the module by using composer.
```
composer require cj/comment
```

post-install settings
----------------------------------
##### Get api documentation
```
rsync -av vendor/cj/comment/content/documentation.md content/documentation.md
```

##### Copy the routefile
```
rsync -av vendor/cj/comment/config/route/comments.php config/route
```
Add the comments route to your route config file. Se sample in
```
vendor/cj/comment/config/route.php
```

##### Add dependencies to DI-container
Add the dependencies to your di config file. Se sample in
```
vendor/cj/comment/config/di.php
```




License
------------------

This software carries a MIT license.



```
 .  
..:  Copyright (c) 2017 Christofer Jungberg (christofer.jungberg@gmail.com)
```
