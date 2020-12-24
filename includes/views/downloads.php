<?php

$FeaturedExtension;

$_vars["extensions"] = $this->getConfig("extensions");

if (CURRENT_UNIVERSE >= crisp\Universe::UNIVERSE_PUBLIC) {
    foreach ($_vars["extensions"] as $Key => $Extension) {
        if (strpos($Extension->browser, get_browser(null, true)["browser"]) !== false) {
            $FeaturedExtension = $Extension;
            unset($_vars["extensions"][$Key]);
        }
    }
}

$_vars["featured"] = $FeaturedExtension;