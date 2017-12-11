<?php
namespace dwisiswant0\gD0rk;
define("G00GLE", "https://www.google.co.id");

/**
* gD0rk v1.0
* Please get updated on my GitHub (dwisiswant0)
* --
* Change the author name don't make you become a coder
* @ 2017, dw1
**/

class main {
    public function __construct() {
        include "vendor/mwhite/random-uagent/uagent.php";
    }

    private function hajar($url, $data = null, $head = null, $proxy = null, $verbose = false) {
        $cuih = curl_init();
        curl_setopt($cuih, CURLOPT_URL, $url);
        if ($data != null) {
            curl_setopt($cuih, CURLOPT_POST, 1);
            curl_setopt($cuih, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($cuih, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($cuih, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($cuih, CURLOPT_VERBOSE, ($verbose != false ? 1 : 0));
        curl_setopt($cuih, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($cuih, CURLOPT_COOKIESESSION, 1);
        curl_setopt($cuih, CURLOPT_HEADER, 1);
        if ($head != null) curl_setopt($cuih, CURLOPT_HTTPHEADER, $head);
        if ($proxy != null) {
            curl_setopt($cuih, CURLOPT_TIMEOUT, 20);
            curl_setopt($cuih, CURLOPT_FRESH_CONNECT, 1);
            curl_setopt($cuih, CURLOPT_PROXY, $proxy);
            curl_setopt($cuih, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
        }
        curl_setopt($cuih, CURLOPT_USERAGENT, random_uagent());
        $eks = curl_exec($cuih);
        $header_size = curl_getinfo($cuih, CURLINFO_HEADER_SIZE);
        curl_close($cuih);
        $header = substr($eks, 0, $header_size);
        $body = substr($eks, $header_size);
        return array($body, $header);
    }

    public function gD0rk($dork, $page = null, $proxy = null, $verbose = false) {
        ob_start();
        $get = $this->hajar(G00GLE . "/search?q=" . urlencode($dork) . ($page != null ? "&start=" . $page : null), null, array("Referer: " . G00GLE . "/"), ($proxy != null ? $proxy : null), ($verbose != false ? 1 : 0));
        ob_end_flush();
        return $get;
    }

    public function grabUrl($html) {
        preg_match_all("/<div class=\"rc\"><h3 class=\"r\"><a href=\"(.*?)\" onmousedown=\"return/mi", $html, $url);
        return $url[1];
    }

    public function parseUrl($urls) {
        $uri = "";
        foreach ($urls as $url) {
            $uri .= html_entity_decode($url) . "\n";
        }
        return $uri;
    }
}