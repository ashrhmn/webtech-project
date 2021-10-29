<?php

function getRootDir(){
    if(getenv("DOCKER_ENV")){
        return '/usr/data/fs/';
    }
    else{
        return '../data/fs/';
    }
}


// function getFileSystemDir(){
//     return getRootDir().'';
// }

// echo __DIR__;

// echo dirname(__FILE__);