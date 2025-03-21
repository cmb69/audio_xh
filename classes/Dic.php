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

use Audio\Model\AudioRepo;
use Audio\Model\MetaRepo;
use Plib\SystemChecker;
use Plib\View;

class Dic
{
    public static function audioController(): AudioController
    {
        global $pth;

        return new AudioController(
            new AudioRepo($pth["folder"]["media"]),
            new MetaRepo($pth["folder"]["content"]),
            self::view()
        );
    }

    public static function infoController(): InfoController
    {
        global $pth;

        return new InfoController($pth["folder"]["plugins"] . "audio/", new SystemChecker(), self::view());
    }

    private static function view(): View
    {
        global $pth, $plugin_tx;

        return new View($pth["folder"]["plugins"] . "audio/views/", $plugin_tx["audio"]);
    }
}
