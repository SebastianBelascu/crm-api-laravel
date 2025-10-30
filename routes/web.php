<?php

use Binaryk\LaravelRestify\MCP\RestifyServer;
use Illuminate\Support\Facades\Route;
use Laravel\Mcp\Facades\Mcp;

Mcp::web('restify', RestifyServer::class)->name('mcp.restify');


Route::get('/', function () {
    return view('welcome');
});
