<?php

namespace Audio;

use PHPUnit\Framework\TestCase;

class DicTest extends TestCase
{
    public function setUp(): void
    {
        global $pth, $plugin_tx;

        $pth = ["folder" => ["media" => "", "plugins" => ""]];
        $plugin_tx = ["audio" => []];
    }

    public function testMakesAudioController(): void
    {
        $this->assertInstanceOf(AudioController::class, Dic::audioController());
    }

    public function testMakesInfoController(): void
    {
        $this->assertInstanceOf(InfoController::class, Dic::infoController());
    }
}
