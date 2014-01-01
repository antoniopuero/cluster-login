<?php
    function delete_logic_path ($path) {
        $path = explode("./", $path);
        if (isset($path[1])) {
            return $path[1];
        } else {
            return $path[0];
        }
    }