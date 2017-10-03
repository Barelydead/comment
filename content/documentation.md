Anax comments
==================================

[![Latest Stable Version](https://poser.pugx.org/anax/comments/v/stable)](https://packagist.org/packages/anax/comments)
[![Join the chat at https://gitter.im/mosbth/anax](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/canax?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Build Status](https://travis-ci.org/canax/comments.svg?branch=master)](https://travis-ci.org/canax/comments)
[![CircleCI](https://circleci.com/gh/canax/comments.svg?style=svg)](https://circleci.com/gh/canax/comments)
[![Build Status](https://scrutinizer-ci.com/g/canax/comments/badges/build.png?b=master)](https://scrutinizer-ci.com/g/canax/comments/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/canax/comments/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/canax/comments/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/canax/comments/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/comments/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/d831fd4c-b7c6-4ff0-9a83-102440af8929/mini.png)](https://insight.sensiolabs.com/projects/d831fd4c-b7c6-4ff0-9a83-102440af8929)

Anax comments module.

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
