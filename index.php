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

use Audio\Dic;

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
    return Dic::audioController()->defaultAction($filename, $autoplay, $loop);
}

(new Audio\Plugin())->run();
