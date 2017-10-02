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

/*
 * Prevent direct access.
 */
if (!defined('CMSIMPLE_XH_VERSION')) {
    header('HTTP/1.0 403 Forbidden');
    exit;
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
function audio($filename, $autoplay = false, $loop = false)
{
    return Audio\Plugin::audio($filename, $autoplay, $loop);
}
