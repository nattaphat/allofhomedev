@extends('layouts.main_backend')

@section('jsbody')
    <script type="text/javascript">
        $(document).ready(function(){
            var table = $('#dt-users').DataTable({
                        //stateSave: true,
                        responsive: true,
                        "pageLength": 25,
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
                            {name: 'title', orderable: true, searchable: true},
                            {name: 'for', orderable: true, searchable: true},
                            {name: 'display', orderable: true, searchable: true},
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
            <h3 class="page-header">บทความและข่าวสาร</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ URL::to('backend/article_new') }}">
                        <i class="fa fa-plus-square"></i> เพิ่มบทความและข่าวสาร
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
                                <th>หัวข้อ</th>
                                <th>หมวดหมู่</th>
                                <th>สถานะ</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($articles as $item)
                                <tr>
                                    <td class="text-center" style="vertical-align: middle;"></td>
                                    <td  style="vertical-align: middle;">
                                        @if($item->suggest)
                                            <span class="label label-success">แนะนำ</span>
                                        @endif
                                            {{ $item->title }}

                                    </td>
                                    <td>
                                        <?php
                                        $forcat = unserialize($item->for_cat);
                                        foreach($forcat as $c)
                                        {
                                            if($c == "1")
                                                echo \App\Models\AllFunction::getArticleForType(1)."&nbsp;&nbsp;";
                                            else if($c == "2")
                                                echo \App\Models\AllFunction::getArticleForType(2)."&nbsp;&nbsp;";
                                            else if($c == "3")
                                                echo \App\Models\AllFunction::getArticleForType(3)."&nbsp;&nbsp;";
                                            else if($c == "4")
                                                echo \App\Models\AllFunction::getArticleForType(4)."&nbsp;&nbsp;";
                                            else if($c == "5")
                                                echo \App\Models\AllFunction::getArticleForType(5)."&nbsp;&nbsp;";
                                            else if($c == "6")
                                                echo \App\Models\AllFunction::getArticleForType(6)."&nbsp;&nbsp;";
                                            else if($c == "7")
                                                echo \App\Models\AllFunction::getArticleForType(7)."&nbsp;&nbsp;";
                                            else if($c == "8")
                                                echo \App\Models\AllFunction::getArticleForType(8)."&nbsp;&nbsp;";
                                            else if($c == "9")
                                                echo \App\Models\AllFunction::getArticleForType(9)."&nbsp;&nbsp;";
                                            else if($c == "10")
                                                echo \App\Models\AllFunction::getArticleForType(10)."&nbsp;&nbsp;";
                                            else if($c == "11")
                                                echo \App\Models\AllFunction::getArticleForType(11)."&nbsp;&nbsp;";
                                            else if($c == "12")
                                                echo \App\Models\AllFunction::getArticleForType(12)."&nbsp;&nbsp;";
                                            else if($c == "13")
                                                echo \App\Models\AllFunction::getArticleForType(13)."&nbsp;&nbsp;";
                                            else if($c == "14")
                                                echo \App\Models\AllFunction::getArticleForType(14)."&nbsp;&nbsp;";
                                            else if($c == "15")
                                                echo \App\Models\AllFunction::getArticleForType(15)."&nbsp;&nbsp;";
                                            else if($c == "16")
                                                echo \App\Models\AllFunction::getArticleForType(16)."&nbsp;&nbsp;";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        {{ $item->visible == 1? "แสดงบนเว็บไซต์" : "ซ่อน" }}
                                    </td>
                                    <td class="text-center"  style="vertical-align: middle;">
                                        <a href="{{ URL::to('backend/article_edit') }}/{{ $item->id }}"
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