<?php

function getRootDir(){
    if(getenv("DOCKER_ENV")){
        return '/usr/data/fs/';
    }
    else{
        return '../data/fs/';
    }
}