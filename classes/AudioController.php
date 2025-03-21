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

use Audio\Model\AudioRepo;
use Audio\Model\Meta;
use Audio\Model\MetaRepo;
use Plib\View;

class AudioController
{
    /** @var AudioRepo */
    private $audioRepo;

    /** @var MetaRepo */
    private $metaRepo;

    /** @var View */
    private $view;

    public function __construct(AudioRepo $audioRepo, MetaRepo $metaRepo, View $view)
    {
        $this->audioRepo = $audioRepo;
        $this->metaRepo = $metaRepo;
        $this->view = $view;
    }

    public function defaultAction(string $filename, bool $autoplay, bool $loop): string
    {
        $audios = $this->audioRepo->find($filename);
        if (empty($audios)) {
            return $this->view->message("fail", "error_missing_file", $filename);
        }
        $meta = $this->metaRepo->find($filename);
        return $this->view->render("audio", [
            "audios" => $audios,
            "download" => end($audios),
            "displayname" => $meta && $meta->name() ? $meta->name() : basename($filename),
            "autoplay" => $autoplay ? 'autoplay' : '',
            "loop" => $loop ? ' loop' : '',
            "meta" => $meta,
        ]);
    }
}
