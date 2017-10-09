CJ comment
==================================

[![Latest Stable Version](https://poser.pugx.org/cj/comment/v/stable)](https://packagist.org/packages/cj/comment)
[![Build Status](https://travis-ci.org/Barelydead/comment.svg?branch=master)](https://travis-ci.org/Barelydead/comment)
[![CircleCI](https://circleci.com/gh/Barelydead/comment.svg?style=svg)](https://circleci.com/gh/barelydead/comment)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Barelydead/comment/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Barelydead/comment/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/Barelydead/comment/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Barelydead/comment/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/Barelydead/comment/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Barelydead/comment/build-status/master)


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
