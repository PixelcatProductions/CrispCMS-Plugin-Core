<?php

/*
 * Copyright 2020 Pixelcat Productions <support@pixelcatproductions.net>
 * @author 2020 Justin René Back <jback@pixelcatproductions.net>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */


/** @var crisp\core\Plugin $this */
\crisp\core\Theme::addtoNavbar("about", $this->getTranslation("about"), \crisp\api\Helper::generateLink("about"), "_self", -97);
\crisp\core\Theme::addtoNavbar("downloads", $this->getTranslation("title"), \crisp\api\Helper::generateLink("downloads"), "_self", -96);

if ($this->getConfig("maintenance_enabled") || isset($_GET["simulate_maintenance"])) {
  http_response_code(503);
  echo $TwigTheme->render($this->PluginName . "/templates/maintenance/maintenance.twig", array("plugin" => $this));
  exit;
}
if ($this->getConfig("highload_enabled") || isset($_GET["simulate_highload"])) {
  http_response_code(503);
  echo $TwigTheme->render($this->PluginName . "/templates/highload/highload.twig", array("plugin" => $this));
  exit;
}