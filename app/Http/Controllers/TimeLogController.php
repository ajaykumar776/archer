<?php
namespace App\Http\Controllers;

use App\Models\TimeLog;
use Illuminate\Http\Request;

class TimeLogController extends Controller
{
        public function create()
        {
            return view('time-log.create');
        }

        public function edit($id)
    {
        return view('time-log.edit', compact('id'));
    }

    public function list()
    {
        return view('time-log.list');
    }
}
