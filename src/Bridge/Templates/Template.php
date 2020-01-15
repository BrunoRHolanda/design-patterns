<?php

namespace Pattern\Bridge\Templates;

interface Template
{
    public function make(array $data): string;
}