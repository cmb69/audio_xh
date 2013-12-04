<?php

/**
 * Front-end of Audio_XH.
 *
 * PHP versions 4 and 5
 *
 * @category  CMSimple_XH
 * @package   Audio
 * @author    Christoph M. Becker <cmbecker69@gmx.de>
 * @copyright 2013 Christoph M. Becker <http://3-magi.net>
 * @license   http://www.gnu.org/licenses/gpl-3.0.en.html GNU GPLv3
 * @version   SVN: $Id$
 * @link      http://3-magi.net/?CMSimple_XH/Audio_XH
 */

/*
 * Prevent direct access.
 */
if (!defined('CMSIMPLE_XH_VERSION')) {
    header('HTTP/1.0 403 Forbidden');
    exit;
}

/**
 * Returns the path of the audio folder.
 *
 * @return string
 *
 * @global array The paths of system files and folders.
 */
function Audio_folder()
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
function Audio_fixEmptyElements($html)
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
 *
 * @return string (X)HTML.
 */
function Audio_html($filename, $player)
{
    $displayname = basename($filename);
    $urlencodedFilename = urlencode($filename . '.mp3');
    $o = <<<HTML

<!-- Audio_XH: $displayname -->
<audio controls="controls" title="$displayname">
    <source src="$filename.oga" type="audio/ogg"/>
    <source src="$filename.mp3" type="audio/mpeg"/>
    <object type="application/x-shockwave-flash" data="$player"
            width="140" height="30">
        <param name="movie" value="$player"/>
        <param name="FlashVars" value="src=$urlencodedFilename"/>
        <a href="$filename.mp3">$displayname</a>
    </object>
</audio>

HTML;

    $o = Audio_fixEmptyElements($o);
    return $o;
}

/**
 * Returns an AUDIO element.
 * 
 * @param string $filename An audio filename without file extension.
 *
 * @return string (X)HTML.
 */
function audio($filename)
{
    global $pth;
    
    $path = Audio_folder() . $filename;
    $extensions = array('.oga', '.mp3');
    foreach ($extensions as $extension) {
        $filename = $path . $extension;
        if (!file_exists($filename)) {
            e('missing', 'file', $filename);
            return false;
        }
    }
    $player = $pth['folder']['plugins'] . 'audio/emff_stuttgart.swf';
    return Audio_html($path, $player);
}

?>
