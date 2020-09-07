<?php

$XHPROF_ROOT = '/var/www/html/xhprof';
require_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_lib.php";
require_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_runs.php";

// xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
xhprof_enable(XHPROF_FLAGS_CPU);

register_shutdown_function(function () {
    $xhprof_data = xhprof_disable();
    if (function_exists('fastcgi_finish_request')) {
        fastcgi_finish_request();
    }
    $xhprof_runs = new XHProfRuns_Default();
    $run_id = $xhprof_runs->save_run($xhprof_data, str_replace(array('/', '?', '=', '&', '#', '.'), '_', $_SERVER['REQUEST_URI']));
});
