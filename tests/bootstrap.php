<?php

require_once "./vendor/autoload.php";

require_once "../../cmsimple/functions.php";

require_once "../plib/classes/Response.php";
require_once "../plib/classes/SystemChecker.php";
require_once "../plib/classes/View.php";
require_once "../plib/classes/FakeSystemChecker.php";

require_once "./classes/model/AudioRepo.php";
require_once "./classes/model/Meta.php";
require_once "./classes/model/MetaRepo.php";
require_once "./classes/AudioController.php";
require_once "./classes/Dic.php";
require_once "./classes/InfoController.php";

const CMSIMPLE_XH_VERSION = "CMSimple_XH 1.7.6";
const AUDIO_VERSION = "1.0";
