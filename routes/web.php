<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ComputerController;

// Hiển thị danh sách vấn đề (trang chủ)
Route::get('/', [IssueController::class, 'index'])->name('issues.index');

// Hiển thị danh sách máy tính
Route::get('/computers', [ComputerController::class, 'index'])->name('computers.index');

// Đường dẫn để tạo mới một vấn đề (hiển thị form thêm mới)
Route::get('/issues/create', [IssueController::class, 'create'])->name('issues.create');

// Đường dẫn để lưu dữ liệu vấn đề mới (thực hiện thêm mới)
Route::post('/issues', [IssueController::class, 'store'])->name('issues.store');

// Đường dẫn để hiển thị chi tiết một vấn đề cụ thể (tùy chọn)
Route::get('/issues/{id}', [IssueController::class, 'show'])->name('issues.show');

// Đường dẫn để chỉnh sửa thông tin vấn đề (hiển thị form chỉnh sửa)
Route::get('/issues/{id}/edit', [IssueController::class, 'edit'])->name('issues.edit');

// Đường dẫn để cập nhật thông tin vấn đề (thực hiện cập nhật)
Route::put('/issues/{id}', [IssueController::class, 'update'])->name('issues.update');

// Đường dẫn để xóa vấn đề (thực hiện xóa sau khi có xác nhận)
Route::delete('/issues/{id}', [IssueController::class, 'destroy'])->name('issues.destroy');

// Đường dẫn để tạo mới một máy tính (hiển thị form thêm mới)
Route::get('/computers/create', [ComputerController::class, 'create'])->name('computers.create');

// Đường dẫn để lưu dữ liệu máy tính mới (thực hiện thêm mới)
Route::post('/computers', [ComputerController::class, 'store'])->name('computers.store');

// Đường dẫn để chỉnh sửa thông tin máy tính (hiển thị form chỉnh sửa)
Route::get('/computers/{id}/edit', [ComputerController::class, 'edit'])->name('computers.edit');

// Đường dẫn để cập nhật thông tin máy tính (thực hiện cập nhật)
Route::put('/computers/{id}', [ComputerController::class, 'update'])->name('computers.update');

// Đường dẫn để xóa máy tính (thực hiện xóa sau khi có xác nhận)
Route::delete('/computers/{id}', [ComputerController::class, 'destroy'])->name('computers.destroy');
