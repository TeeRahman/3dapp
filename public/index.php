<?php

require "../app/core/init.php";

$app = new App;
$app->loadController();

?>

<!-- 
1. The app component aims to initiate the correct controller and run a specific method of that controller.
2. Should the user wish to specify a unique page, they can do through URL params. For example, /story will result in the story controller being initiated and the default index method being run. /story/method syntax can be used to specify alternative method.
3. Alternatively, should no URL params be provided, the default controller Home and index method will be used.
4. Requiring 'init.php' provides access to multiple files -> classes/controllers.
-->

<!-- QA CHECK 09/05 -->