<?php

function Audio_html($player, $filename, $displayname)
{
    global $cf;
    
    $o = <<<HTML

<!-- Audio_XH: $displayname -->
<audio src="$filename" controls="controls" title="$displayname">
    <object type="application/x-shockwave-flash" data="$player"
            width="140" height="30">
        <param name="movie" value="$player"/>
        <param name="FlashVars" value="src=$filename"/>
        <a href="$filename">$displayname</a>
    </object>
</audio>

HTML;
    if (!$cf['xhtml']['endtags']) {
        $o = str_replace('/>', '>', $o);
    }
    return $o;
}

function audio($filename)
{
    global $pth;
    
    $path = $pth['folder']['media'] . $filename;
    $displayname = basename($filename);
    $player = $pth['folder']['plugins'] . 'audio/emff_stuttgart.swf';
    return Audio_html($player, $path, $displayname);
}