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

class Meta
{
    private const ID = 0;
    private const NAME = 1;
    private const DESCRIPTION = 2;

    /** @var list<string> */
    private $record;

    /** @param list<string> $record */
    public function __construct($record)
    {
        $this->record = $record;
    }

    public function id(): string
    {
        assert(isset($this->record[self::ID]));
        return $this->record[self::ID];
    }

    public function name(): string
    {
        return $this->record[self::NAME] ?? "";
    }

    public function description(): string
    {
        return $this->record[self::DESCRIPTION] ?? "";
    }
}
