<?php
require_once("gd0rk.class.php");
use \dwisiswant0\gD0rk As gD0rk;

#############################
echo "\n  # gD0rk v1.0";
echo "\n  # @ 2017, dw1\n\n";
$opened = "Usage: php " . basename(__FILE__) . " -d \"inurl:index.php?id= ext:php\" -p \"127.0.0.1:9050\"\n\n";
$header = "Startup:";
$header .= "\n  -d DORK\t\tDORK for searching.\n\n";
$header .= "Optional arguments:";
$header .= "\n  -h,  --help\t\tprint this help.";
$header .= "\n  -p PROXY\t\tsurf with PROXY.";
$header .= "\n  -o FILE\t\tlog results to FILE.";
$header .= "\n  -v,  --verbose\tshows details about the results of surfing.";
#############################

$cmd = getopt("d:p:o:h::v::", array("help::", "verbose::"));
$dork = @$cmd['d'];
if (isset($cmd['h']) || isset($cmd['help'])) exit($opened . $header . "\n");
elseif (!isset($dork) || !$dork || empty($dork) || $dork == null) exit($opened . "Try `php " . basename(__FILE__) . " --help' for more options.\n");
$main = new gD0rk\main();
$proxy = (@$cmd['p'] != null ? $cmd['p'] : null);
if (isset($cmd['v'])) $verbose = 1;
echo "\n  D0rk: " . $dork . ($proxy ? "\n  Pr0xy: " . $proxy : null) . "\n\n";
$get = $main->gD0rk($dork, null, $proxy, (@$verbose ? 1 : 0));
if (preg_match("/g-recaptcha/", $get[0])) exit("CAPTCHA detected. Please try with `-p` option.\n");
preg_match_all("/&amp;start=(.*?)&amp;sa=N/mi", $get[0], $page);
$url = $main->grabUrl($get[0]);
$uri = $main->parseUrl($url);
for ($i=0; $i <= count($page[1]); $i++) { 
    $get = $main->gD0rk($dork, $i+1 . "0", $proxy);
    $url = $main->grabUrl($get[0]);
    $uri .= $main->parseUrl($url);
}
echo $uri;
if (isset($cmd['o'])) file_put_contents($cmd['o'], $uri);