@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- フラッシュメッセージを表示 --}}
        @if (session('error'))
            <div class="alert alert-success" style="color: red;">   
                {{ session('error') }}
            </div>
        @endif
        <h2 class="text-center mb-5">タスクを編集</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="description" name="description">{{ $task->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="status" name="status">
                                <option {{ $task->status == 'todo' ? 'selected' : '' }}>todo</option>
                                <option {{ $task->status == 'doing' ? 'selected' : '' }}>doing</option>
                                <option {{ $task->status == 'done' ? 'selected' : '' }}>done</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deadline" class="col-sm-3 col-form-label">Deadline</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="deadline" name="deadline" value="{{ $task->deadline }}" required>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">タスクを更新</button>
                        {{-- 戻るボタンを追加 --}}
                        <a href="javascript:history.back()" class="btn btn-secondary ml-3">back</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
