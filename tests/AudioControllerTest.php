<?php

namespace Audio;

use ApprovalTests\Approvals;
use Audio\Infra\CsvFile;
use Audio\Model\MetaRepo;
use org\bovigo\vfs\vfsStream;
use PHPUnit\Framework\TestCase;
use Plib\View;

class AudioControllerTest extends TestCase
{
    public function testRendersAudioWidget(): void
    {
        $description = <<<'EOS'
        The Goldberg Variations (German: Goldberg-Variationen), BWV 988, is a musical composition
        for keyboard by Johann Sebastian Bach, consisting of an aria and a set of 30 variations.
        First published in 1741, it is named after Johann Gottlieb Goldberg,
        who may also have been the first performer of the work.
        EOS;
        vfsStream::setup("root");
        mkdir(vfsStream::url("root/userfiles/media"), 0777, true);
        touch(vfsStream::url("root/userfiles/media/goldberg.mp3"));
        touch(vfsStream::url("root/userfiles/media/goldberg.ogg"));
        mkdir(vfsStream::url("root/content"));
        file_put_contents(vfsStream::url("root/content/audio.csv"), "goldberg,Goldberg Variations,\"$description\"");
        $sut = new AudioController(
            vfsStream::url("root/userfiles/media/"),
            new MetaRepo(vfsStream::url("root/content/")),
            new View("./views/", XH_includeVar("./languages/en.php", "plugin_tx")["audio"])
        );
        Approvals::verifyHtml($sut->defaultAction("goldberg", false, false));
    }
}
