<?php

namespace App\Http\Controllers;

use App\Models\Process;
use App\Models\ProcessStep;
use App\Models\Section;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function index()
    {
        $processes = Process::all();
        $steps = ProcessStep::all();
        return view('admin_panel.components.processes.index', compact('processes', 'steps'));
    }

    public function steps($processId)
    {
        $process = Process::find($processId);
        $steps = ProcessStep::with('process')
                            ->where('process_id', $processId)
                            ->orderBy('id')
                            ->get();
        return view('admin_panel.components.steps.index', compact('process', 'steps'));
    }
}
