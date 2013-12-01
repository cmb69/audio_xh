<?php

function audio($filename)
{
    global $pth;
    
    $url = $pth['folder']['media'] . $filename;
    $displayname = basename($filename);
    $o = <<<EOS
<audio src="$url" controls="controls">
    <a href="$url">$displayname</a>
</audio>

EOS;
    return $o;
}