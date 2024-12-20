@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Danh sách vấn đề</h1>
    <a href="{{ route('issues.create') }}" class="btn btn-primary mb-3">Thêm vấn đề mới</a>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Tên máy tính</th>
                <th>Phiên bản</th>
                <th>Người báo cáo</th>
                <th>Thời gian báo cáo</th>
                <th>Mức độ</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($issues as $issue)
            <tr>
                <td>{{ $issue->id }}</td>
                <td>{{ $issue->computer->computer_name }}</td>
                <td>{{ $issue->computer->model }}</td>
                <td>{{ $issue->reported_by }}</td>
                <td>{{ $issue->reported_date }}</td>
                <td>{{ $issue->urgency }}</td>
                <td>{{ $issue->status }}</td>
                <td>
                    <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('issues.destroy', $issue->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Hiển thị phân trang -->
    <div class="d-flex justify-content-center">
        {{ $issues->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
