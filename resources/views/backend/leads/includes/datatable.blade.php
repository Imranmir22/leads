<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table id="dtb-customers" class="table table-hover table-striped">
                <thead>
                <tr>
                    <th> # </th>
                    <th>{{ __('Select') }}</th>
                    <th>{{ __('Name') }}</th>
                    {{-- <th>{{ __('Email') }}</th> --}}
                    <th>{{ __('Phone') }}</th>
                    {{-- <th>{{ __('Status') }}</th> --}}
                    <th>{{ __('Category') }}</th>
                    <th>{{ __('Created On') }}</th>
                    <th>{{ __('Plans') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
               </thead>
            </table>
        </div>
    </div>
</div>

@push('head.start')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@push('body.end')
    <!-- DataTables -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Export -->
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>



    <script type="text/javascript">

        $(function () {



          var table = $('.data-table').DataTable({

              processing: true,

              serverSide: true,

              ajax: "{{ route('admin.customers.json') }}",

              columns: [

                  {data: 'id', name: 'id'},

                  {data: 'name', name: 'name'},

                  {data: 'email', name: 'email'},

                  {data: 'action', name: 'action', orderable: false, searchable: false},

              ]

          });



        });

      </script>


@endpush
