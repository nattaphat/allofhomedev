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
                        "order": [[1,'asc']],
                        "columns": [
                            {name: 'no', orderable: false, searchable: false},
                            {name: 'firstname', orderable: true, searchable: true},
                            {name: 'lastname', orderable: true, searchable: true},
                            {name: 'username', orderable: true, searchable: true},
                            {name: 'email', orderable: true, searchable: true},
                            {name: 'role', orderable: true, searchable: true},
                            {name: 'status', orderable: true, searchable: true},
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
            <h3 class="page-header">ผู้ใช้งานระบบ</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ตารางผู้ใช้งานระบบ
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
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>Username</th>
                                <th>อีเมล์</th>
                                <th>กลุ่มผู้ใช้งาน</th>
                                <th>สถานะ</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>{{ $user->firstname }}</td>
                                        <td>{{ $user->lastname }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->role == 1)
                                                ผู้ดูแลระบบสูงสุด (superadmin)
                                            @elseif($user->role == 2)
                                                ผู้ดูแลระบบ (admin)
                                            @elseif($user->role == 3)
                                                สมาชิกทั่วไป (member)
                                            @elseif($user->role == 4)
                                                สมาชิก VIP (VIP member)
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($user->status)
                                                <span class="label label-success">ใช้งาน</span>
                                            @else
                                                <span class="label label-danger">ไม่ใช้งาน</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ URL::to('backend/user_editUser') }}/{{ $user->id }}"
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