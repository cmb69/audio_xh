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

class MetaRepo
{
    /** @var string */
    private $folder;

    /** @var ?resource */
    private $stream = null;

    public function __construct(string $folder)
    {
        $this->folder = $folder;
    }

    public function find(string $id): ?Meta
    {
        $res = null;
        $records = $this->read($this->folder . "audio.csv");
        foreach ($records as $record) {
            if ($record[0] === $id) {
                $res = new Meta($record);
                break;
            }
        }
        $this->close();
        return $res;
    }

    /** @return iterable<list<string>> */
    private function read(string $filename): iterable
    {
        if (is_readable($filename)) {
            $stream = fopen($filename, "r");
            if ($stream) {
                $this->stream = $stream;
                flock($this->stream, LOCK_SH);
                while (($record = fgetcsv($this->stream, 0, ",", '"', "\0"))) {
                    if ($this->listOfStrings($record)) {
                        yield $record;
                    }
                }
            }
        }
    }

    private function close(): void
    {
        if ($this->stream) {
            flock($this->stream, LOCK_UN);
            fclose($this->stream);
            $this->stream = null;
        }
    }

    /**
     * @param list<string|null> $record
     * @phpstan-assert-if-true list<string> $record
     */
    private function listOfStrings(array $record): bool
    {
        foreach ($record as $field) {
            if (!is_string($field)) {
                return false;
            }
        }
        return true;
    }
}
