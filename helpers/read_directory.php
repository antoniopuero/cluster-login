<?php
function files_in_directory ($dir) {
    return array_diff(scandir($dir), array('..', '.'));
}
?>