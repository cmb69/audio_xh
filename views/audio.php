<audio controls="controls" title="<?=$this->displayname()?>" <?=$this->autoplay()?> <?=$this->loop()?>>
    <source src="<?=$this->filename()?>.ogg" type="audio/ogg">
    <source src="<?=$this->filename()?>.mp3" type="audio/mpeg">
    <a href="<?=$this->filename()?>.mp3"><?=$this->displayname()?></a>
</audio>
