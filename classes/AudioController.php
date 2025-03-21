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
    /** @var string */
    private $mediaFolder;

    /** @var View */
    private $view;

    public function __construct(string $mediaFolder, View $view)
    {
        $this->mediaFolder = $mediaFolder;
        $this->view = $view;
    }

    /**
     * @param string $filename
     * @param bool $autoplay
     * @param bool $loop
     * @return string
     */
    public function defaultAction($filename, $autoplay = false, $loop = false)
    {
        $extensions = array('.ogg', '.mp3');
        foreach ($extensions as $extension) {
            $file = $this->mediaFolder . $filename . $extension;
            if (!file_exists($file)) {
                return $this->view->message("fail", "error_missing_file", $file);
            }
        }
        return $this->renderView($filename, $autoplay, $loop);
    }

    /**
     * @param string $filename
     * @param bool $autoplay
     * @param bool $loop
     * @return string
     */
    private function renderView($filename, $autoplay, $loop)
    {
        return $this->view->render("audio", [
            "filename" => $this->mediaFolder . $filename,
            "displayname" => basename($filename),
            "autoplay" => $autoplay ? 'autoplay' : '',
            "loop" => $loop ? ' loop' : '',
        ]);
    }
}
