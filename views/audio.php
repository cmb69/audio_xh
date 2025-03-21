<?php

use Plib\View;

if (!defined("CMSIMPLE_XH_VERSION")) {http_response_code(403); exit;}

/**
 * @var View $this
 * @var string $filename
 * @var string $displayname
 * @var string $autoplay
 * @var string $loop
 */
?>

<audio controls="controls" title="<?=$this->esc($displayname)?>" <?=$this->esc($autoplay)?> <?=$this->esc($loop)?>>
  <source src="<?=$this->esc($filename)?>.ogg" type="audio/ogg">
  <source src="<?=$this->esc($filename)?>.mp3" type="audio/mpeg">
  <a href="<?=$this->esc($filename)?>.mp3"><?=$this->esc($displayname)?></a>
</audio>
