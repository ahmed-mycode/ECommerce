<?php

use Illuminate\Support\Facades\Storage;


function get_folder(){
    return app()->getLocale() === 'ar' ? 'css-rtl' : 'css';
}

function saveFile($folder, $image){
    $image->store('/', $folder);
    $imageName = $image->hashName();
    return $imageName;
}

