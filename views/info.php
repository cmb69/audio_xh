<h1>Audio <?=$this->esc($version)?></h1>
<h2><?=$this->text("syscheck_title")?></h2>
<?foreach ($checks as $check):?>
<p class="<?=$this->esc($check->class)?>"><?=$this->esc($check->message)?></p>
<?endforeach?>
