<?php

use App\Model\Config as conf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Config;

function authUser($gaurds = "web")
{
    return Auth::user($gaurds);
}


function getCmsConfig($label)
{
    $value = '';
    $data = conf::where('label', $label)->first()?->value;
    $value = $data;

    return $value;
}

function configTypes()
{
    return ['file', 'text', 'textarea', 'number'];
}

function paginate()
{
    return Config::get('constants.PAGINATE');
}

function pageIndex($items)
{
    $sn = 0;
    if (method_exists($items, 'perPage') && method_exists($items, 'currentPage')) {
        $sn = $items->perPage() * ($items->currentPage() - 1);
    }

    return $sn;
}

function SN($sn, $key)
{
    return $sn += $key + 1;
}

function getSystemPrefix()
{
    return config('constants.PREFIX');
}

function listFormatting($optionKey)
{
    return $optionKey . ') ';
}
