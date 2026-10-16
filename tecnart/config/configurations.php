<?php
if (!isset($_SESSION)) {
  session_start();
}

define('MAX_FILE_SIZE', 5);
define('MAX_FILES_TOTAL', 20);
