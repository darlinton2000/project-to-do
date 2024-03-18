<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->date) {
            $filteredDate = $request->date;
        } else {
            $filteredDate = date('Y-m-d');
        }

        $carbonDate = Carbon::createFromDate($filteredDate);

        $data['data_as_string'] = $carbonDate->translatedFormat('d') . ' de ' . ucfirst($carbonDate->translatedFormat('M'));
        $data['data_prev_button'] = $carbonDate->addDay(-1)->format('Y-m-d');
        $data['data_next_button'] = $carbonDate->addDay(2)->format('Y-m-d');
        $data['tasks'] = Task::whereDate('due_date', $filteredDate)->get();
        $data['authUser'] = Auth::user();
        $data['tasks_count'] = $data['tasks']->count();
        $data['undone_tasks_count'] = $data['tasks']->where('is_done', false)->count();
        $data['done_tasks_count'] = $data['tasks']->where('is_done', true)->count();

        return view('home', $data);
    }
}
