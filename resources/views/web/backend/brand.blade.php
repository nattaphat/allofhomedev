@extends('layouts.main_backend')

@section('jsbody')
    <script type="text/javascript">
        $(document).ready(function(){
            var table = $('#dt-users').DataTable({
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
                        //"order": [[1,'desc']],
                        "columns": [
                            {name: 'no', orderable: false, searchable: false},
                            {name: 'tagmain', orderable: true, searchable: true},
                            {name: 'pic', orderable: false, searchable: false},
                            {name: 'operation', orderable: false, searchable: false}
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
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">แบรนด์</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ URL::to('backend/brand_new') }}">
                        <i class="fa fa-plus-square"></i> เพิ่มแบรนด์
                    </a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">

                        @if ( Session::has('flash_message') )
                            <div class="alert {{ Session::get('flash_type') }}">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <h4>{{ Session::get('flash_message') }}</h4>
                            </div>
                        @endif

                        <table id="dt-users" class="table table-hover table-condensed">
                            <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>แบรนด์</th>
                                <th>โลโก้</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($brands as $item)
                                <tr>
                                    <td class="text-center" style="vertical-align: middle;"></td>
                                    <td  style="vertical-align: middle;">
                                        @if($item->suggest)
                                            <span class="label label-success">สำคัญ</span>
                                        @endif
                                            {{ $item->brand_name }}

                                    </td>
                                    <td>
                                        <?php
                                        if($item->attachment_id != null)
                                        {
                                            $attachment = App\Models\Attachment::find($item->attachment_id);
                                        ?>
                                        <div class="thumbnail" style="width: 85px; margin: 0px;">
                                            <img src="{{ $attachment->path }}" alt="{{ $attachment->filename }}"
                                                 width="80px" height="auto" />
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center"  style="vertical-align: middle;">
                                        <a href="{{ URL::to('backend/brand_edit') }}/{{ $item->id }}"
                                           data-toggle="tooltip" title="แก้ไข">
                                            <i class="fa fa-edit fa-fw"></i></a>
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
@stop