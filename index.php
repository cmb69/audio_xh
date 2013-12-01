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
 * Returns an AUDIO element.
 *
 * @param string $player      A relative path to the SWF player.
 * @param string $filename    A relative path of the MP3 file.
 * @param string $displayname A name of the MP3 file.
 *
 * @return string (X)HTML.
 *
 * @global array The configuration of the core.
 */
function Audio_html($player, $filename, $displayname)
{
    global $cf;
    
    $o = <<<HTML

<!-- Audio_XH: $displayname -->
<audio src="$filename" controls="controls" title="$displayname">
    <object type="application/x-shockwave-flash" data="$player"
            width="140" height="30">
        <param name="movie" value="$player"/>
        <param name="FlashVars" value="src=$filename"/>
        <a href="$filename">$displayname</a>
    </object>
</audio>

HTML;
    if (!$cf['xhtml']['endtags']) {
        $o = str_replace('/>', '>', $o);
    }
    return $o;
}

/**
 * Returns an AUDIO element.
 * 
 * @param string $filename
 *
 * @return string (X)HTML.
 */
function audio($filename)
{
    global $pth;
    
    $path = Audio_folder() . $filename;
    if (file_exists($path)) {
        $displayname = basename($filename);
        $player = $pth['folder']['plugins'] . 'audio/emff_stuttgart.swf';
        return Audio_html($player, $path, $displayname);
    } else {
        e('missing', 'file', $path);
        return false;
    }
}

?>
