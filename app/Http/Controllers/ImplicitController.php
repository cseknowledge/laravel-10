<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImplicitController extends Controller
{
    private $myclass;

    public function __construct(\MyClass $myclass) {
        $this->myclass = $myclass;
    }
    public function index(Request $request) {

        $uri = $request->path();
        echo '<br>URI: '.$uri;

        $url = $request->url();
        echo '<br>';

        echo 'URL: '.$url;
        $method = $request->method();
        echo '<br>';

        echo 'Method: '.$method;
        echo '<br>';

        // Usage of is method
        $pattern = $request->is('foo/*');
        echo 'is Method: '.$pattern;
        echo '<br>';

        dd($this->myclass);
    }
}
