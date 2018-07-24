@extends('layouts.master')

@section('title')
    <title>TRANSCRIPTS - Elrascribe</title>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.2/b-html5-1.5.2/b-print-1.5.2/r-2.2.2/datatables.min.css"/>
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
                            <table id="transcripts" class="table table-striped table-bordered" style="width:100%">
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
                                    @foreach ($transcripts as $row)
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
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <div class="float-right">
                                {!! $transcripts->links() !!}
                            </div> --}}
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

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.2/b-html5-1.5.2/b-print-1.5.2/r-2.2.2/datatables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#transcripts').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "responsive": true,
                "autoWidth": true,
                "pageLength": 10,
                "dom": '<"rowBfr>tlip',
                "order": [[ 3, "desc" ]],
                "buttons": [
                    'colvis',
                    {
                        extend: 'excelHtml5',
                        title: 'Transcripts',
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Transcripts',
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Transcripts',
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5]
                        }
                    }
                ],
            });
        });
    </script>
@endsection