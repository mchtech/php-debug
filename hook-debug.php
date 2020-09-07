<?php

function __msectime()
{
    list($msec, $sec) = explode(' ', microtime());
    return (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
}

uopz_set_hook('preg_match', function ($pattern, $subject, $matches=array(), $flags = 0, $offset = 0) {
    $t1 = __msectime();
    $ret = preg_match($pattern, $subject, $matches, $flags, $offset);
    $t2 = __msectime() - $t1;
    file_put_contents("/var/www/html/uopz/preg_match.log", "$t2\t$pattern\t$subject\n", FILE_APPEND);
    return $ret;
});


uopz_set_hook('preg_match_all', function ($pattern, $subject, $matches=array(), $flags = PREG_PATTERN_ORDER, $offset = 0) {
    $t1 = __msectime();
    $ret = preg_match_all($pattern, $subject, $matches, $flags, $offset);
    $t2 = __msectime() - $t1;
    file_put_contents("/var/www/html/uopz/preg_match_all.log", "$t2\t$pattern\t$subject\n", FILE_APPEND);
    return $ret;
});

uopz_set_hook('preg_filter', function ($pattern, $replacement, $subject, $limit = -1, $count = 0) {
    $t1 = __msectime();
    $ret = preg_filter($pattern, $replacement, $subject, $limit, $count);
    $t2 = __msectime() - $t1;
    file_put_contents("/var/www/html/uopz/preg_filter.log", "$t2\t$pattern\t$replacement\t$subject\n", FILE_APPEND);
    return $ret;
});

uopz_set_hook('preg_replace', function ($pattern, $replacement, $subject, $limit = -1, $count = 0) {
    $t1 = __msectime();
    $ret = preg_replace($pattern, $replacement, $subject, $limit, $count);
    $t2 = __msectime() - $t1;
    file_put_contents("/var/www/html/uopz/preg_replace.log", "$t2\t$pattern\t$replacement\t$subject\n", FILE_APPEND);
    return $ret;
});

uopz_set_hook('preg_replace_callback', function ($pattern, $callback, $subject, $limit = -1, $count = 0, $flags = 0) {
    $t1 = __msectime();
    $ret = preg_replace_callback($pattern, $callback, $subject, $limit, $count, $flags);
    $t2 = __msectime() - $t1;
    file_put_contents("/var/www/html/uopz/preg_replace_callback.log", "$t2\t$pattern\t$subject\n", FILE_APPEND);
    return $ret;
});

uopz_set_hook('preg_quote', function ($str, $delimiter = null) {
    $t1 = __msectime();
    $ret = preg_quote($str, $delimiter);
    $t2 = __msectime() - $t1;
    file_put_contents("/var/www/html/uopz/preg_quote.log", "$t2\t$str\t$delimiter\n", FILE_APPEND);
    return $ret;
});

uopz_set_hook('preg_split', function ($pattern, $subject, $limit = -1, $flags = 0) {
    $t1 = __msectime();
    $ret = preg_split($pattern, $subject, $limit, $flags);
    $t2 = __msectime() - $t1;
    file_put_contents("/var/www/html/uopz/preg_split.log", "$t2\t$pattern\t$subject\n", FILE_APPEND);
    return $ret;
});

uopz_set_hook('preg_grep', function ($pattern, $input, $flags = 0) {
    $t1 = __msectime();
    $ret = preg_grep($pattern, $input, $flags);
    $t2 = __msectime() - $t1;
    file_put_contents("/var/www/html/uopz/preg_grep.log", "$t2\t$pattern\t$input\n", FILE_APPEND);
    return $ret;
});
