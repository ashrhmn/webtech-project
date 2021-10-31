<?php

function getFsRootDir(){
    if(getenv("DOCKER_ENV")){
        return '/usr/data/fs/';
    }
    else{
        return __DIR__.'/../data/fs/';
    }
}


// function getFileSystemDir(){
//     return getRootDir().'';
// }

// echo __DIR__;

// echo dirname(__FILE__);