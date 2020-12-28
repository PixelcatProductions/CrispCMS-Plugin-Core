<?php

if (isset($_CRON)) {


    switch ($_CRON["Data"]->name) {
        case "cleanup_badges":
            $files = glob(__DIR__ . "/../../../api/badges/*.{png,svg}", GLOB_BRACE);
            foreach($files as $file){
                unlink($file);
            }
            break;
    }

    \crisp\api\lists\Cron::markAsFinished($_CRON["ID"]);
    exit;
}