@extends('layouts.main')

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
                        //"order": [[1,'asc']],
                        "columns": [
                            {name: 'no', orderable: false, searchable: false},
                            {name: 'title',orderable: true, searchable: true},
                            {name: 'category',orderable: true, searchable: true},
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

    <div class="container nomargin">
        <div class="row">
            <div class="col-md-3">
                @include('layouts._partials.left_menu')
            </div>

            {{--Content--}}
            <div class="col-md-9">

                <div class="row">
                    <div class="col-md-12">
                        <div class="block features">
                            <h2 class="title-divider" >
                                <span style="color: #55a79a;">ไอเดียทั้งหมด</span>
                                <small>Admin Control</small>
                            </h2>
                        </div>
                    </div>
                    <div class="col-md-12" style="padding-top: 0px; padding-bottom: 30px;">
                        <a href="{{ URL::to("project/create") }}"><i class="fa fa-plus-square"></i>
                            เพิ่มบทความและข่าวสาร</a>
                    </div>

                    @if ( Session::has('flash_message') )
                        <div class="alert {{ Session::get('flash_type') }}">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4>{{ Session::get('flash_message') }}</h4>
                        </div>
                    @endif

                </div>

                <div class="pricing-stack">
                    <div class="well">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="dataTable_wrapper">
                                    <table id="dt-projects" class="table table-hover table-condensed">
                                        <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>หัวข้อบทความ</th>
                                            <th>หมวดหมู่</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>

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