<?php

function getCategory()
{
    $cat = \App\JenisProduk::all();
    return $cat;
}