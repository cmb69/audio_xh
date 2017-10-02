<?php

/**
 * Front-end of Audio_XH.
 *
 * PHP versions 4 and 5
 *
 * @category  CMSimple_XH
 * @package   Audio
 * @author    Christoph M. Becker <cmbecker69@gmx.de>
 * @copyright 2013-2017 Christoph M. Becker <http://3-magi.net>
 * @license   http://www.gnu.org/licenses/gpl-3.0.en.html GNU GPLv3
 * @version   SVN: $Id$
 * @link      http://3-magi.net/?CMSimple_XH/Audio_XH
 */

namespace Audio;

class Plugin
{
    /**
    * Returns the path of the audio folder.
    *
    * @return string
    *
    * @global array The paths of system files and folders.
    */
    private static function folder()
    {
        global $pth;

        $folder = isset($pth['folder']['media'])
            ? $pth['folder']['media']
            : $pth['folder']['downloads'];
        return $folder;
    }

    /**
    * Returns an (X)HTML string with all empty XHTML elements converted to empty
    * HTML elements.
    *
    * @param string $html An HTML string.
    *
    * @return string (X)HTML.
    *
    * @global array The configuration of the core.
    */
    private static function fixEmptyElements($html)
    {
        global $cf;

        if (!$cf['xhtml']['endtags']) {
            $html = str_replace('/>', '>', $html);
        }
        return $html;
    }

    /**
    * Returns an AUDIO element.
    *
    * @param string $filename A relative path of an audio file (without file extension).
    * @param string $player   A relative path to an SWF player.
    * @param bool   $autoplay Whether playback shall start automatically.
    * @param bool   $loop     Whether playback shall be repeated automatically.
    *
    * @return string (X)HTML.
    */
    private static function html($filename, $player, $autoplay, $loop)
    {
        $displayname = basename($filename);
        $urlencodedFilename = urlencode($filename . '.mp3');
        $html5autoplay = $autoplay? 'autoplay="autoplay"' : '';
        $html5autoplay .= $loop? ' loop="loop"' : '';
        $flashautoplay = $autoplay? '&amp;autostart=yes' : '';
        $flashautoplay .= $loop? '&amp;repeat=yes' : '';
        $o = <<<HTML

    <!-- Audio_XH: $displayname -->
    <audio controls="controls" title="$displayname" $html5autoplay>
        <source src="$filename.ogg" type="audio/ogg"/>
        <source src="$filename.mp3" type="audio/mpeg"/>
        <object type="application/x-shockwave-flash" data="$player"
                width="140" height="30">
            <param name="movie" value="$player"/>
            <param name="FlashVars" value="src=$urlencodedFilename$flashautoplay"/>
            <a href="$filename.mp3">$displayname</a>
        </object>
    </audio>

HTML;

        $o = self::fixEmptyElements($o);
        return $o;
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
        global $pth;

        $path = self::folder() . $filename;
        $extensions = array('.ogg', '.mp3');
        foreach ($extensions as $extension) {
            $filename = $path . $extension;
            if (!file_exists($filename)) {
                e('missing', 'file', $filename);
                return false;
            }
        }
        $player = $pth['folder']['plugins'] . 'audio/emff_stuttgart.swf';
        return self::html($path, $player, $autoplay, $loop);
    }
}
