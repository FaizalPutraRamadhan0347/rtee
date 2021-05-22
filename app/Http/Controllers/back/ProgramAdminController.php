<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DonationConfirmation;
use App\Program;
use App\Category;
use App\User;
use App\Development;
use App\Report;
use App\GlobalSetting;

class ProgramAdminController extends Controller
{
    public $program_status = [
        'active' => 'Active',
        'pause' => 'Paused',
        'stop' => 'Stopped',
    ];

    public function index(){
        $programs = Program::with('report')->get();
        $program_status = $this->program_status;
        return view('back.program', compact('programs','program_status'));
    }

    public function updateStatus($id, $status)
    {
        $program_status = array_keys($this->program_status);

        if (in_array($status, $program_status)){
            $program = Program::find($id);
            $program->update(['status' => $status]);

            return redirect()->back();
        } else {
            return redirect()->with(['error' => 'Invalid status'])->back();
        }
    }
}