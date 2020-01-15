<?php

namespace Pattern\ObjectPool;


interface Pool 
{
    public function acquire();
    public function release($t);
}