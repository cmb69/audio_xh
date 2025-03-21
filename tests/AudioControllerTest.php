<?php

namespace Audio;

use ApprovalTests\Approvals;
use org\bovigo\vfs\vfsStream;
use PHPUnit\Framework\TestCase;
use Plib\View;

class AudioControllerTest extends TestCase
{
    public function testRendersAudioWidget(): void
    {
        vfsStream::setup("root");
        mkdir(vfsStream::url("root/userfiles/media"), 0777, true);
        touch(vfsStream::url("root/userfiles/media/goldberg.mp3"));
        touch(vfsStream::url("root/userfiles/media/goldberg.ogg"));
        $sut = new AudioController(
            vfsStream::url("root/userfiles/media/"),
            new View("./views/", XH_includeVar("./languages/en.php", "plugin_tx")["audio"])
        );
        Approvals::verifyHtml($sut->defaultAction("goldberg"));
    }
}
