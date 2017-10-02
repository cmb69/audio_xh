<?php

/**
 * Copyright 2013-2017 Christoph M. Becker
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

class Plugin
{
    const VERSION = '@AUDIO_VERSION@';

    /**
     * @return void
     */
    public static function run()
    {
        if (XH_ADM) {
            XH_registerStandardPluginMenuItems(false);
            if (XH_wantsPluginAdministration('audio')) {
                self::handleAdministration();
            }
        }
    }

    /**
     * @return void
     */
    private static function handleAdministration()
    {
        global $o, $admin, $action, $pth;

        $o .= print_plugin_admin('off');
        switch ($admin) {
            case '':
                $view = new View('info');
                $view->logo = "{$pth['folder']['plugins']}audio/audio.png";
                $view->version = self::VERSION;
                $o .= $view;
            default:
                $o .= plugin_admin_common($action, $admin, 'audio');
        }
    }
}
