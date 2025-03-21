<?php

namespace Audio;

use ApprovalTests\Approvals;
use PHPUnit\Framework\TestCase;
use Plib\View;

class InfoControllerTest extends TestCase
{
    public function testRendersPluginInfo(): void
    {
        $sut = new InfoController(
            "./plugins/audio/",
            new View("./views/", XH_includeVar("./languages/en.php", "plugin_tx")["audio"])
        );
        Approvals::verifyHtml($sut());
    }
}
