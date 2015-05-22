@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('jshome')
    <!-- DataTables CSS -->
    <link href="{{ asset('js/lib/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('js/lib/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
@stop

@section('jsbody')
    <!-- DataTables JavaScript -->
    <script src="{{ asset('js/lib/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/lib/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            var table = $('#dt-projects').DataTable({
                        //stateSave: true,
                        responsive: true,
                        "language": {
                            "emptyTable":     "ไม่มีข้อมูล",
                            "info":           "แสดงข้อมูล จาก _START_ ถึง _END_ รายการ",
                            "infoEmpty":      "แสดงข้อมูล จาก 0 ถึง 0 รายการ",
                            "infoFiltered":   "", //"(จากทั้งหมด _MAX_ บรรทัด)",
                            "infoPostFix":    "",
                            "thousands":      ",",
                            "lengthMenu":     "แสดง _MENU_ รายการ",
                            "loadingRecords": "Loading...",
                            "processing":     "ประมวลผล...",
                            "search":         "ค้นหา:",
                            "zeroRecords":    "ไม่พบข้อมูล",
                            "paginate": {
                                "first":      "หน้าแรก",
                                "last":       "สุดท้าย",
                                "next":       "ถัดไป",
                                "previous":   "ก่อน"
                            },
                            "aria": {
                                "sortAscending":  ": activate to sort column ascending",
                                "sortDescending": ": activate to sort column descending"
                            }
                        },
                        "order": [[1,'asc']],
                        "columns": [
                            {name: 'no', orderable: false, searchable: false},
                            {name: 'project_name',orderable: true, searchable: true},
                            {name: 'project_company_owner',orderable: true, searchable: true},
                            {name: 'location',orderable: true, searchable: true},
                            {name: 'operate', orderable: false, searchable: false}
                        ],
                        "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                            var index = iDisplayIndex +1;
                            $('td:eq(0)',nRow).html(index);
                            return nRow;
                        }
                    }
            );
        });
    </script>
@stop

@section('content')

    <div class="container">
        <div class="row">
            {{--Left Menu--}}
            <div class="col-md-3">
                @include('layouts._partials.left_menu')
            </div>
            {{--Content--}}
            <div class="col-md-9">
                <div class="pricing-stack">
                    <div class="well">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="block features">
                                    <h2 class="title-divider" >
                                        <span style="color: #55a79a;">โครงการทั้งหมด</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-top: 0px; padding-bottom: 30px;">
                                <a href="{{ URL::to("project/create") }}"><i class="fa fa-plus-square"></i>
                                    เพิ่มโครงการ</a>
                            </div>
                            <div class="col-md-12">
                                @if ( Session::has('flash_message') )
                                    <div class="alert {{ Session::get('flash_type') }}">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <h4>{{ Session::get('flash_message') }}</h4>
                                    </div>
                                @endif
                                <div class="dataTable_wrapper">
                                    <table id="dt-projects" class="table table-hover table-condensed">
                                        <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อโครงการ</th>
                                            <th>บริษัทเจ้าของโครงการ</th>
                                            <th>ที่ตั้งโครงการ</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($projects as $project)
                                            <tr>
                                                <td class="text-center"></td>
                                                <td>{{ $project->project_name }}</td>
                                                <td>{{ $project->project_company_owner }}</td>
                                                <td>{{ $project->getPrjAddress($project->id) }}</td>
                                                <td>
                                                    <a href="{{ url('project/view/').'/'.$project->id }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop