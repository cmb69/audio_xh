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

use Plib\View;

class AudioController
{
    /** @var View */
    private $view;

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
    public function __construct(View $view, $filename, $autoplay = false, $loop = false)
    {
        global $pth;

        $this->view = $view;
        $this->filename = "{$pth['folder']['media']}{$filename}";
        $this->autoplay = (bool) $autoplay;
        $this->loop = (bool) $loop;
    }

    /**
     * @return string
     */
    public function defaultAction()
    {
        $extensions = array('.ogg', '.mp3');
        foreach ($extensions as $extension) {
            $filename = $this->filename . $extension;
            if (!file_exists($filename)) {
                return $this->view->message("fail", "error_missing_file", $filename);
            }
        }
        return $this->renderView();
    }

    /**
    * @return string
    */
    private function renderView()
    {
        return $this->view->render("audio", [
            "filename" => $this->filename,
            "displayname" => basename($this->filename),
            "autoplay" => $this->autoplay ? 'autoplay' : '',
            "loop" => $this->loop ? ' loop' : '',
        ]);
    }
}
