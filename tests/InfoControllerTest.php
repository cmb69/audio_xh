<?php

namespace Audio;

use ApprovalTests\Approvals;
use PHPUnit\Framework\TestCase;
use Plib\FakeSystemChecker;
use Plib\View;

class InfoControllerTest extends TestCase
{
    public function testRendersPluginInfo(): void
    {
        $sut = new InfoController(
            "./plugins/audio/",
            new FakeSystemChecker(),
            new View("./views/", XH_includeVar("./languages/en.php", "plugin_tx")["audio"])
        );
        $response = $sut();
        $this->assertSame("Audio 1.1-dev", $response->title());
        Approvals::verifyHtml($response->output());
    }
}
