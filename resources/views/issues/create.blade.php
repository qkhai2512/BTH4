@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Thêm vấn đề mới</h1>
    <form action="{{ route('issues.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="computer_id" class="form-label">Máy tính</label>
            <select name="computer_id" id="computer_id" class="form-select" required>
                @foreach ($computers as $computer)
                <option value="{{ $computer->id }}">{{ $computer->computer_name }} ({{ $computer->model }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="reported_by" class="form-label">Người báo cáo</label>
            <input type="text" name="reported_by" id="reported_by" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="reported_date" class="form-label">Thời gian báo cáo</label>
            <input type="datetime-local" name="reported_date" id="reported_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="urgency" class="form-label">Mức độ sự cố</label>
            <select name="urgency" id="urgency" class="form-select" required>
                <option value="Low">Thấp</option>
                <option value="Medium">Trung bình</option>
                <option value="High">Cao</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái</label>
            <select name="status" id="status" class="form-select" required>
                <option value="Open">Mở</option>
                <option value="In Progress">Đang xử lý</option>
                <option value="Resolved">Đã giải quyết</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Thêm mới</button>
    </form>
</div>
@endsection
