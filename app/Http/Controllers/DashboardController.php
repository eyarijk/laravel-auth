<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('dashboard.index');
    }
}
