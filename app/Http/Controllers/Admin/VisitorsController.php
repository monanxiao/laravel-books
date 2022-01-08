<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Visitors;

class VisitorsController extends Controller
{
    /**
     * 来访者记录
     *
     *
     */
    public function index(Visitors $visitors)
    {
        $result = $visitors->all();

        return view('admin.statics.visitor', compact('result'));
    }

}
