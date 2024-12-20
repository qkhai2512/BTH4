<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Computer;

class IssueController extends Controller
{
    // Hiển thị danh sách vấn đề với phân trang
    public function index()
    {
        $issues = Issue::with('computer') // Eager loading để lấy thông tin máy tính
            ->paginate(10);

        return view('issues.index', compact('issues'));
    }

    // Hiển thị form thêm mới vấn đề
    public function create()
    {
        $computers = Computer::all(); // Lấy danh sách máy tính để hiển thị trong dropdown
        return view('issues.create', compact('computers'));
    }

    // Lưu vấn đề mới
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'nullable|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|string',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        Issue::create($request->all());
        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được thêm thành công!');
    }

    // Hiển thị chi tiết một vấn đề cụ thể
    public function show($id)
    {
        $issue = Issue::with('computer')->findOrFail($id); // Lấy thông tin vấn đề và máy tính liên quan
        return view('issues.show', compact('issue'));
    }

    // Hiển thị form chỉnh sửa vấn đề
    public function edit($id)
    {
        $issue = Issue::findOrFail($id);
        $computers = Computer::all();
        return view('issues.edit', compact('issue', 'computers'));
    }

    // Cập nhật thông tin vấn đề
    public function update(Request $request, $id)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'nullable|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|string',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        $issue = Issue::findOrFail($id);
        $issue->update($request->all());
        return redirect()->route('issues.index')->with('success', 'Cập nhật vấn đề thành công!');
    }

    // Xóa một vấn đề
    public function destroy($id)
    {
        $issue = Issue::findOrFail($id);
        $issue->delete();
        return redirect()->route('issues.index')->with('success', 'Xóa vấn đề thành công!');
    }
}
