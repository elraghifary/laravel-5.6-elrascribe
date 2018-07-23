@extends('layouts.master')

@section('title')
    <title>TRANSCRIPTS - Elrascribe</title>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Transcript Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transcript</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    @card
                        @slot('title')
                            <a href="{{ route('transcript.create') }}" 
                                class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i> Add Transcript
                            </a>
                        @endslot
                        
                        @if (session('success'))
                            @alert(['type' => 'success'])
                                {!! session('success') !!}
                            @endalert
                        @endif
                        
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Project</td>
                                        <td>IDI</td>
                                        <td>Date</td>
                                        <td>Day / Time</td>
                                        <td>User</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transcripts as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->project }}</td>
                                        <td>{{ $row->idi }}</td>
                                        <td>{{ $row->date }}</td>
                                        <td>{{ $row->day }} / {{ $row->time }}</td>
                                        <td>{{ $row->user->name }}</td>
                                        <td>
                                            <form action="{{ route('transcript.destroy', $row->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <a href="{{ route('transcript.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No records found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="float-right">
                                {!! $transcripts->links() !!}
                            </div>
                        </div>
                        @slot('footer')
​
                        @endslot
                    @endcard
                </div>
            </div>
        </div>
    </div>
@endsection