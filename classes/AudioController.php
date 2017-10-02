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

class AudioController
{
    /**
     * @var array
     */
    private $lang;

    /**
     * @var string
     */
    private $filename;

    /**
     * @var bool
     */
    private $autoplay;

    /**
     * @var bool
     */
    private $loop;

    /**
     * @param string $filename
     * @param bool $autoplay
     * @param bool $loop
     */
    public function __construct($filename, $autoplay = false, $loop = false)
    {
        global $pth, $plugin_tx;

        $this->lang = $plugin_tx['audio'];
        $this->filename = "{$pth['folder']['media']}{$filename}";
        $this->autoplay = (bool) $autoplay;
        $this->loop = (bool) $loop;
    }

    /**
     * @return void
     */
    public function defaultAction()
    {
        $extensions = array('.ogg', '.mp3');
        foreach ($extensions as $extension) {
            $filename = $this->filename . $extension;
            if (!file_exists($filename)) {
                return XH_message('fail', $this->lang['error_missing_file'], $filename);
            }
        }
        $this->prepareView()->render();
    }

    /**
    * @return View
    */
    private function prepareView()
    {
        $view = new View('audio');
        $view->filename = $this->filename;
        $view->displayname = basename($this->filename);
        $view->autoplay = $this->autoplay ? 'autoplay' : '';
        $view->loop = $this->loop ? ' loop' : '';
        return $view;
    }
}
