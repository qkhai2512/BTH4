<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputerController extends Controller
{
    // Hiển thị danh sách máy tính
    public function index()
    {
        $computers = Computer::paginate(10); // Phân trang danh sách máy tính
        return view('computers.index', compact('computers'));
    }

    // Hiển thị form thêm mới máy tính
    public function create()
    {
        return view('computers.create');
    }

    // Lưu thông tin máy tính mới
    public function store(Request $request)
    {
        $request->validate([
            'computer_name' => 'required|string|max:50',
            'model' => 'required|string|max:100',
            'operating_system' => 'required|string|max:50',
            'processor' => 'required|string|max:50',
            'memory' => 'required|integer|min:1',
            'available' => 'required|boolean',
        ]);

        Computer::create($request->all());
        return redirect()->route('computers.index')->with('success', 'Thêm máy tính thành công!');
    }

    // Hiển thị form chỉnh sửa máy tính
    public function edit($id)
    {
        $computer = Computer::findOrFail($id);
        return view('computers.edit', compact('computer'));
    }

    // Cập nhật thông tin máy tính
    public function update(Request $request, $id)
    {
        $request->validate([
            'computer_name' => 'required|string|max:50',
            'model' => 'required|string|max:100',
            'operating_system' => 'required|string|max:50',
            'processor' => 'required|string|max:50',
            'memory' => 'required|integer|min:1',
            'available' => 'required|boolean',
        ]);

        $computer = Computer::findOrFail($id);
        $computer->update($request->all());
        return redirect()->route('computers.index')->with('success', 'Cập nhật máy tính thành công!');
    }

    // Xóa một máy tính
    public function destroy($id)
    {
        $computer = Computer::findOrFail($id);
        $computer->delete();
        return redirect()->route('computers.index')->with('success', 'Xóa máy tính thành công!');
    }
}
