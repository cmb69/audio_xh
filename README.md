# Audio_XH

Audio_XH facilitates the presentation of audio players on a CMSimple_XH website.
You have to provide an MP3 and an Ogg Vorbis file for each player.
If the browser of the visitor supports the AUDIO element,
the plugin uses this feature, and offers a link to the MP3 file otherwise.
JavaScript is not required.

- [Requirements](#requirements)
- [Download](#download)
- [Installation](#installation)
- [Usage](#usage)
- [Troubleshooting](#troubleshooting)
- [License](#license)
- [Credits](#credits)

## Requirements

Audio_XH is a plugin for [CMSimple_XH](https://cmsimple-xh.org/).
It requires CMSimple_XH ≥ 1.7.0 and PHP ≥ 7.1.0.
## Download

The [lastest release](https://github.com/cmb69/audio_xh/releases/latest)
is available for download on Github.

## Installation

The installation is done as with many other CMSimple_XH plugins.

1. Backup the data on your server.
1. Unzip the distribution on your computer.
1. Upload the whole directory `audio/` to your server
   into the `plugins/` directory of CMSimple_XH.
1. Set write permissions for the subdirectories
   `css/` and `languages/`.
<!-- 1. Navigate to `Plugins` → `Audio` in the back-end
   to check if all requirements are fulfilled. -->

## Usage

As Audio_XH provides no such facility, you have to upload your audio files to
the configured media folder via FTP, the file browser or
[Uploader_XH](https://github.com/cmb69/uploader_xh).
Each audio file has to be uploaded as MP3 (.mp3) *and* Ogg Vorbis (.ogg) version;
both files have to be in the same folder and have the same name.

To present an audio player on a page, just insert the following plugin call:

    {{{audio('FILENAME')}}}

`FILENAME` has to be a file path (without file extension) relative to the
configured media folder.

For example, if you have music.mp3 and music.ogg directly in the media
folder, use:

    {{{audio('music')}}}

To present an audio player on all pages, just insert the following in your template:

    <?=audio('FILENAME')?>

Autoplay can be activated by adding a second argument 1 in the call:

    . . . audio('FILENAME', 1); . . .

Automatic repeat is activated by adding a third argument 1 in the call, e.g. with autoplay:

    . . . audio('FILENAME', 1, 1); . . .

or without autoplay:

    . . . audio('FILENAME', 0, 1); . . .

Note, that it is possible to have multiple audio players with autoplay enabled
on a single page, but it is usually not desired by your visitors.

## Troubleshooting

Report bugs and ask for support either on
[Github](https://github.com/cmb69/audio_xh/issues)
or in the [CMSimple\_XH Forum](https://cmsimpleforum.com/).

## License

Audio_XH is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Audio_XH is distributed in the hope that it will be useful,
but *without any warranty*; without even the implied warranty of
*merchantibility* or *fitness for a particular purpose*. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Audio_XH.  If not, see <https://www.gnu.org/licenses/>.

Copyright © Christoph M. Becker

## Credits

This plugin was inspired by *jop*.

The plugin icon is designed by [YellowIcon](http://www.yellowicon.com/).
Many thanks for publishing this icon under GPL.

Many thanks to the community at the [CMSimple_XH forum](https://cmsimpleforum.com/)
for tips, suggestions and testing.
Especially I want to thank *Ulrich* for the early feedback, and *svasti*
for contributing the autoplay code.

And last but not least many thanks to
[Peter Harteg](https://www.harteg.dk/), the “father” of CMSimple,
and all developers of [CMSimple\_XH](https://www.cmsimple-xh.org/)
without whom this amazing CMS would not exist.
