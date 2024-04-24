<?php

namespace App\Http\Controllers;

use App\Services\StatService;
use Illuminate\Http\Request;

class StatController extends Controller
{
    protected $statService;
    public function __construct()
    {
        $this->statService = new StatService();
    }
    public function index()
    {
        return $this->statService->getStat();
    }
}
