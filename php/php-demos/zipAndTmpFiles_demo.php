<?php
echo "Creating the zip archive object\n";
$zip = new ZipArchive();
echo " Now opening the zip file...you need 
       all these things...you cant just have the filename\n";
$zip->open("./snarf.zip", ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE);
echo "now echoing into a file in the zip archive\n";
for ($i = 0; $i <= 20;$i++) {
    $zip->addFromString("file_" . $i ."_.txt", "snarfishness");
}
echo "now closing the zip file\n";
$zip->close();

$tmpfile = tempnam("/tmp","MC_");
$zip = new ZipArchive();
$zip->open($tmpfile, ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE);
echo "Now going to do something similar using a tmp file\n";
for ($i = 0; $i <= 20;$i++) {
    $zip->addFromString("file_" . $i ."_.txt", "snarfishness");
    echo "The tmp file size as it is being written is" . filesize($tmpfile) . "\n";
}
$zip->close();
echo file_get_contents($tmpfile);
    echo "The file size after it is closed is: " . filesize($tmpfile) . "\n";
unlink($tmpfile);//delets the file
 echo is_null($tmpfile);



