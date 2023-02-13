<?php

echo <<<EOD
<script>
setInterval(function() {
    var scrollPosition = window.pageYOffset;
    location.reload();
    window.scrollTo(0, scrollPosition);
}, 3000);
</script>
EOD;

require_once 'core/AutoLoader.php';

use core\router\Router;
use core\AutoLoader;
use src\controller\Accueil;

(new AutoLoader())->init();

$router = new Router();
$router->add('', [Router::METHODS['GET']], Accueil::class, true);
$router->call();
