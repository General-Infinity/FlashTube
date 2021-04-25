<?php
$id = $_GET['video_id']; 
$file = "sample.flv";
$attachment_location = $_SERVER["DOCUMENT_ROOT"] . "/$file";
if ($id == "fag") {
    header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
    header("Cache-Control: public"); // needed for internet explorer
    header("Content-Type: video/x-flv");
    header("Content-Transfer-Encoding: Binary");
    header("Content-Length:".filesize($attachment_location));
    header("Content-Disposition: attachment; filename=$file");
    readfile($attachment_location);
}
