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

namespace Audio\Model;

class AudioRepo
{
    /** @var string */
    private $folder;

    public function __construct(string $folder)
    {
        $this->folder = $folder;
    }

    /** @return array<string,string> */
    public function find(string $basename): array
    {
        $extensions = [
            ".webm" => "audio/webm;codecs=opus",
            ".m4a" => "audio/mp4",
            ".ogg" => "audio/ogg; codecs=vorbis",
            ".mp3" => "audio/mpeg",
        ];
        $res = [];
        foreach ($extensions as $extension => $mimetype) {
            $filename = $this->folder . $basename . $extension;
            if (is_file($filename)) {
                $res[$mimetype] = $filename;
            }
        }
        return $res;
    }
}
