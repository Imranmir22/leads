@extends('layouts.app')

@section('title', 'Leads')

@section('content')
    <div class="container mt-5">

        <h2 class="mb-4">Leads</h2>
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 text-right">
                            <a
                                href="{{ route('admin.leads.create') }}"
                                class="btn bg-gradient-success float-right">
                                Create Lead
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <table id="myTable" class="table table-bordered w-100">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <!-- Modal -->

    </div>
@endsection

@push('body.head')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@push('js')
<script>
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#myTable').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.leads.json') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action'},
            ]
        });
    });
</script>
@endpush
