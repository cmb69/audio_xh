<?php

function audio($filename)
{
    global $pth, $cf;
    
    $displayname = basename($filename);
    $url = $pth['folder']['media'] . $filename;
    $player = $pth['folder']['plugins'] . 'audio/emff_stuttgart.swf';
    $o = <<<HTML
<audio src="$url" controls="controls" title="$displayname">
    <object type="application/x-shockwave-flash" data="$player" width="140" height="30">
        <param name="movie" value="$player"/>
        <param name="FlashVars" value="src=$url"/>
        <a href="$url">$displayname</a>
    </object>
</audio>

HTML;
    if (!$cf['xhtml']['endtags']) {
        $o = str_replace('/>', '>', $o);
    }
    return $o;
}