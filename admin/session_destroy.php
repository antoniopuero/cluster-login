<?php
/**
 * Created by JetBrains PhpStorm.
 * User: a.savchenko
 * Date: 12/31/13
 * Time: 4:23 PM
 * To change this template use File | Settings | File Templates.
 */
session_start();
session_destroy();
header('Location: ./');