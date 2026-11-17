<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort');
        if ($sort != 'asc' && $sort != 'desc') {
            $sort = 'desc';
        }

        $status = $request->input('status');
        $validate = $request->validate([
            'status' => 'exists:statuses,id',
        ]);
        if ($validate) {
            $reports = Report::where('status_id', $status)
                ->where('user_id', Auth::user()->id)
                ->orderBy('created_at', $sort)
                ->paginate(3);
        } else {
            $reports = Report::where('user_id', Auth::user()->id)->orderBy('created_at', $sort)->paginate(3);
        }

        $statuses = Status::all();
        $icons = (new MainController())->products;

        return view('report.index', compact('reports', 'statuses', 'sort', 'status', 'icons'));
    }

    public function create()
    {
        $icons = (new MainController())->products;

        return view('report.create', compact('icons'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'string',
            'description' => 'string',
        ]);

        $data['user_id'] = Auth::user()->id;
        $data['status_id'] = 1;

        Report::create($data);

        return redirect()->route('reports.index')->with('success', 'Заявление успешно отправлено!');
    }

    public function edit(Report $report)
    {
        if ($report->user_id == Auth::user()->id) {
            $icons = (new MainController())->products;

            return view('report.edit', compact('report', 'icons'));
        } else {
            abort(403, 'у вас нет прав на редактирование этой заявки');
        }
    }

    public function update(Request $request, Report $report)
    {
        if ($report->user_id != Auth::user()->id) {
            abort(403, 'у вас нет прав на редактирование этой заявки');
        }
        $data = $request->validate([
            'number' => 'string',
            'description' => 'string',
        ]);

        $report->update($data);

        return redirect()->route('reports.index');
    }

    public function destroy(Report $report)
    {
        if ($report->user_id != Auth::user()->id) {
            abort(403, 'у вас нет прав на удаление этой заявки');
        }

        $report->delete();

        return redirect()->back();
    }

    public function updateStatus(Request $request, Report $report)
    {
        if ($report->status_id != 1) {
            abort(403, 'Статус этой заявки уже изменен и не подлежит редактированию');
        }

        $request->validate([
            'status_id' => 'required|exists:statuses,id',
        ]);

        $report->update($request->only('status_id'));

        return redirect()->back();
    }
}
