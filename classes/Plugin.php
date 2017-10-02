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
        global $o, $admin, $action;

        $o .= print_plugin_admin('off');
        switch ($admin) {
            default:
                $o .= plugin_admin_common($action, $admin, 'audio');
        }
    }

    /**
    * Returns an AUDIO element.
    *
    * @param string $filename A relative path of an audio file (without file extension).
    * @param bool   $autoplay Whether playback shall start automatically.
    * @param bool   $loop     Whether playback shall be repeated automatically.
    *
    * @return string (X)HTML.
    */
    private static function html($filename, $autoplay, $loop)
    {
        $displayname = basename($filename);
        $html5autoplay = $autoplay? 'autoplay' : '';
        $html5autoplay .= $loop? ' loop' : '';
        return <<<HTML

    <!-- Audio_XH: $displayname -->
    <audio controls="controls" title="$displayname" $html5autoplay>
        <source src="$filename.ogg" type="audio/ogg">
        <source src="$filename.mp3" type="audio/mpeg">
        <a href="$filename.mp3">$displayname</a>
    </audio>

HTML;
    }

    /**
    * Returns an AUDIO element.
    *
    * @param string $filename An audio filename without file extension.
    * @param bool   $autoplay Whether playback shall start automatically.
    * @param bool   $loop     Whether playback shall be repeated automatically.
    *
    * @return string (X)HTML.
    */
    public static function audio($filename, $autoplay = false, $loop = false)
    {
        global $pth, $plugin_tx;

        $path = "{$pth['folder']['media']}$filename";
        $extensions = array('.ogg', '.mp3');
        foreach ($extensions as $extension) {
            $filename = $path . $extension;
            if (!file_exists($filename)) {
                return XH_message('fail', $plugin_tx['audio']['error_missing_file'], $filename);
            }
        }
        return self::html($path, $autoplay, $loop);
    }
}
