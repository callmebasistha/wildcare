<?php

function getExtension($file)
{
    $fileInfo = $file->getClientOriginalName();
    $explode = explode('.', $fileInfo);
    return end($explode);
}
