<?php
$timberContext = $_GLOBALS['timberContext'];
$timberContext['content'] = ob_get_contents();
ob_end_clean();