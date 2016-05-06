<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;


class DomTeste extends Controller
{
    public function teste()
    {
    	$dom = \Embed\Embed::create('http://google.com');
    	dd($dom);
    }
}
