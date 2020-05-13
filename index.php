<?php

    $xmlfile = file_get_contents('sample2.xml');
    $ob= simplexml_load_string($xmlfile);
    $json  = json_encode($ob);
	$configData = json_decode($json, true);
    print_r($configData);