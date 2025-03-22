<?php

use Audio\Model\Meta;
use Plib\View;

if (!defined("CMSIMPLE_XH_VERSION")) {http_response_code(403); exit;}

/**
 * @var View $this
 * @var array<string,string> $audios
 * @var string $download
 * @var string $displayname
 * @var string $autoplay
 * @var string $loop
 * @var ?Meta $meta
 */
?>

<figure itemscope itemtype="http://schema.org/AudioObject">
<?if ($meta):?>
  <meta itemprop="name" content="<?=$this->esc($meta->name())?>">
  <meta itemprop="description" content="<?=$this->esc($meta->description())?>">
  <figcaption><?=$this->esc($meta->name())?></figcaption>
<?endif?>
  <audio controls="controls" title="<?=$this->esc($displayname)?>" <?=$this->esc($autoplay)?> <?=$this->esc($loop)?>>
<?foreach ($audios as $mimetype => $filename):?>
    <source src="<?=$this->esc($filename)?>" type="<?=$this->esc($mimetype)?>">
<?endforeach?>
    <a href="<?=$this->esc($download)?>"><?=$this->esc($displayname)?></a>
  </audio>
</figure>
