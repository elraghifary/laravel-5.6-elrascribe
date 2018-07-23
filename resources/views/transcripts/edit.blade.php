@extends('layouts.master')

@section('title')
    <title>EDIT TRANSCRIPT - Elrascribe</title>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Transcript</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('transcript.index') }}">Transcript</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @card
                        @slot('title')
                            Please fill the required fields
                        @endslot
                        
                        @if (session('success'))
                            @alert(['type' => 'success'])
                                {!! session('success') !!}
                            @endalert
                        @endif
                        
                        <form action="{{ route('transcript.update', $transcripts->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="">Project Name</label>
                                <input type="text" name="project" required readonly value="{{ $transcripts->project }}" class="form-control {{ $errors->has('project') ? 'is-invalid':'' }}">
                                <p class="text-danger">{{ $errors->first('project') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">IDI</label>
                                <input type="number" name="idi" required value="{{ $transcripts->idi }}" 
                                    class="form-control {{ $errors->has('idi') ? 'is-invalid':'' }}">
                                <p class="text-danger">{{ $errors->first('idi') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="text" name="date" required value="{{ $transcripts->date }}" class="form-control {{ $errors->has('date') ? 'is-invalid':'' }}">
                                <p class="text-danger">{{ $errors->first('date') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Day</label>
                                <input type="text" name="day" required value="{{ $transcripts->day }}" class="form-control {{ $errors->has('day') ? 'is-invalid':'' }}">
                                <p class="text-danger">{{ $errors->first('day') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Time</label>
                                <input type="text" name="time" required value="{{ $transcripts->time }}"class="form-control {{ $errors->has('time') ? 'is-invalid':'' }}">
                                <p class="text-danger">{{ $errors->first('time') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Moderator</label>
                                <input type="text" name="moderator" required value="{{ $transcripts->moderator }}" class="form-control {{ $errors->has('moderator') ? 'is-invalid':'' }}">
                                <p class="text-danger">{{ $errors->first('moderator') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Criteria</label>
                                <input type="text" name="criteria" required value="{{ $transcripts->criteria }}" class="form-control {{ $errors->has('criteria') ? 'is-invalid':'' }}">
                                <p class="text-danger">{{ $errors->first('criteria') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Body</label>
                                <textarea name="body" id="body" 
                                    cols="5" rows="5" 
                                    class="form-control {{ $errors->has('body') ? 'is-invalid':'' }}">{{ $transcripts->body }}</textarea>
                                <p class="text-danger">{{ $errors->first('body') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">User</label>
                                <select name="user_id" id="user_id" required class="form-control {{ $errors->has('user_id') ? 'is-invalid':'' }}">
                                    <option value="">Select</option>
                                    @foreach ($users as $row)
                                        <option value="{{ $row->id }}" {{ $row->id == $transcripts->user_id ? 'selected' : '' }}>{{ ucfirst($row->name) }}</option>
                                    @endforeach
                                </select>
                                <p class="text-danger">{{ $errors->first('user_id') }}</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-send"></i> Update
                                </button>
                            </div>
                        </form>
                        @slot('footer')
​
                        @endslot
                    @endcard
                </div>
            </div>
        </div>
    </div>
@endsection