<?php

$FeaturedExtension;

if (CURRENT_UNIVERSE >= crisp\Universe::UNIVERSE_BETA) {
    foreach ($this->getConfig("extensions") as $Extension) {
        if (strpos($Extension->browser, get_browser(null, true)["browser"]) !== false) {
            $FeaturedExtension = $Extension;
        }
    }
}

$_vars["featured"] = $FeaturedExtension;