<audio controls="controls" title="<?=$this->esc($displayname)?>" <?=$this->esc($autoplay)?> <?=$this->esc($loop)?>>
    <source src="<?=$this->esc($filename)?>.ogg" type="audio/ogg">
    <source src="<?=$this->esc($filename)?>.mp3" type="audio/mpeg">
    <a href="<?=$this->esc($filename)?>.mp3"><?=$this->esc($displayname)?></a>
</audio>
