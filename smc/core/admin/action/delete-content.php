<?php
/**
 * SimpleMC - http://github.com/leveille/simple-mc/tree/master
 * Copyright (C) Blue Atlas Interactive
 *
 * == BEGIN LICENSE ==
 *
 * Licensed under the terms of any of the following licenses at your
 * choice:
 *
 *  - GNU Lesser General Public License Version 2.1 or later (the "LGPL")
 *    http://www.gnu.org/licenses/lgpl.html
 *
 * == END LICENSE ==
 */
    include_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/config/config.ini.php');	
    include_once('verify.php');
    
    $block  = new Block();
    
    if(isset($_POST['cId'])) {
        try {
            $block->blockDelete((int)$_POST['cId']);
            echo "{success : true}" ;
        } catch (Exception $e) {
            echo "{success : false}" ;
        }
    } else {
        echo "{success : false, msg : 'A valid content block must be selected.'}" ;
    }