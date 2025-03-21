<?php

/**
 * Copyright (c) Christoph M. Becker
 *
 * This file is part of Audio_XH.
 *
 * Audio_XH is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Audio_XH is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Audio_XH.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Audio;

use Plib\SystemChecker;
use Plib\View;

class InfoController
{
    /** @var string */
    private $pluginFolder;

    /** @var SystemChecker */
    private $systemChecker;

    /** @var View */
    private $view;

    public function __construct(string $pluginFolder, SystemChecker $systemChecker, View $view)
    {
        $this->pluginFolder = $pluginFolder;
        $this->systemChecker = $systemChecker;
        $this->view = $view;
    }

    public function __invoke(): string
    {
        return $this->view->render("info", [
            "version" => AUDIO_VERSION,
            "checks" => $this->systemChecks(),
        ]);
    }

    /** @return list<object{class:string,message:string}> */
    private function systemChecks(): array
    {
        $checks = [];
        $phpVersion = "7.1.0";
        $checks[] = (object) [
            "class" => $this->systemChecker->checkVersion(PHP_VERSION, $phpVersion)
                ? "xh_success"
                : "xh_fail",
            "message" => $this->view->plain("syscheck_phpversion", $phpVersion),
        ];
        $xhVersion = "1.7.0";
        $checks[] = (object) [
            "class" => $this->systemChecker->checkVersion(CMSIMPLE_XH_VERSION, "CMSimple_XH $xhVersion")
                ? "xh_success"
                : "xh_fail",
            "message" => $this->view->plain("syscheck_xhversion", $xhVersion),
        ];
        $plibVersion = "1.3";
        $checks[] = (object) [
            "class" => $this->systemChecker->checkPlugin("plib", $plibVersion)
                ? "xh_success"
                : "xh_fail",
            "message" => $this->view->plain("syscheck_plibversion", $plibVersion),
        ];
        foreach (array("css/", "languages/") as $folder) {
            $folders[] = $this->pluginFolder . $folder;
        }
        foreach ($folders as $folder) {
            $checks[] = (object) [
                "class" =>  $this->systemChecker->checkWritability($folder)
                    ? "xh_success"
                    : "xh_warning",
                "message" => $this->view->plain("syscheck_writable", $folder),
            ];
        }
        return $checks;
    }
}
