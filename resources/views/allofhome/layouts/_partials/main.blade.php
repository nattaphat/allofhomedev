<div class="row">
    <div class="col-md-3">
        <div class="widget">
            @include('fitness.widget_fitness')
        </div>

        <!-- document download -->
        <div class="widget">
            @include('document.widget_document')
        </div>
        <!-- END document download -->
    </div>
    <div class="col-md-6">
        <!-- content -->
        <div class="widget">
            <div class="widget-title">
                <h4><i class="fa fa-pencil-square-o"></i> Contents</h4>
            </div>
            <div class="widget-body">
                <div class="media">
                    <a class="pull-left" href="{{ URL::to('myadmin/hr_competency') }}" title="ระบบ Competency Online">
                        <img class="media-object"src="{{ URL::to('img/icon/hr_evaluation.png') }}">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">เปิดใช้งานระบบ Competency Online</h4>
                        เรียนเชิญเจ้าหน้าที่ฝ่ายวิจัยและพัฒนาทำการประเมินสมรรถนะบุคคลในระบบ Competency Online ระหว่างวันที่ 4-18 กรกฎาคม
                        วัตถุประสงค์เพื่อทดสอบความพร้อมของระบบก่อนใช้งานจริง [<a href="{{ URL::to('myadmin/hr_competency') }}" title="ระบบ Competency Online">เข้าสู่ระบบประเมิน</a>] 
                    </div>
                </div>
            </div>
        </div>
        <!-- END content -->
    </div>
    <div class="col-md-3">
        <!-- Meeting Room -->
        <div class="widget-title">
            <h4><i class="fa fa-group"></i> จองห้องประชุม</h4>
        </div>
        <div class="widget-body">
            <ul class="item-list padding">
                <li>
                    <strong>ชั้น 8 - &nbsp;&nbsp;</strong>
                    <a href="https://www.haii.or.th/intranet/modules/webcalendar/login.php?flag=m2" data-toggle="tooltip" title="จองห้องประชุมชั้น8 (เล็ก)" target="_blank">เล็ก</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="https://www.haii.or.th/intranet/modules/webcalendar/login.php?flag=meeting8" data-toggle="tooltip" title="จองห้องประชุมชั้น8 (ใหญ่)" target="_blank">ใหญ่</a> 
                </li>
                <li>
                    <strong>ชั้น 14 - &nbsp;&nbsp;</strong>
                    <a href="https://www.haii.or.th/intranet/modules/webcalendar/login.php?flag=meeting14_3" data-toggle="tooltip" title="จองห้องประชุม14 ห้อง 3" target="_blank">เล็ก</a> 
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="https://www.haii.or.th/intranet/modules/webcalendar/login.php?flag=meeting14_1" data-toggle="tooltip" title="จองห้องประชุมชั้น 14 ห้อง 1 (ใหญ่)" target="_blank">ใหญ่</a>
                </li>
            </ul>
        </div>
        <!-- END Meeting Room -->

        <!-- Car -->
        <div class="widget-title">
            <h4><i class="fa fa-car"></i> จองรถ</h4>
        </div>
        <div class="widget-body">
            <ul class="item-list">
                <li>
                    <a href="https://www.haii.or.th/intranet/modules/webcalendar/login.php?flag=van3" data-toggle="tooltip" title="รถตู้ ฮธ 2231" target="_blank">รถตู้ ฮธ 2231</a> 
                </li>
                <li>
                    <a href="https://www.haii.or.th/intranet/modules/webcalendar/login.php?flag=van7" data-toggle="tooltip" title="รถตู้ ฮค 3302 (มูลนิธิฯ)" target="_blank">รถตู้ ฮค 3302 (มูลนิธิฯ)</a> 
                </li>
                <li>
                    <a href="https://www.haii.or.th/intranet/modules/webcalendar/login.php?flag=van4" data-toggle="tooltip" title="รถตู้ ชธ 5876" target="_blank">รถตู้ ชธ 5876</a> 
                </li>

                <li>
                    <a href="https://www.haii.or.th/intranet/modules/webcalendar/login.php?flag=car_f1" data-toggle="tooltip" title="Ford 3กฌ 5551" target="_blank">Ford 3กฌ 5551</a>
                </li>
                <li>
                    <a href="https://www.haii.or.th/intranet/modules/webcalendar/login.php?flag=car_f2" data-toggle="tooltip" title="Ford 3กฌ 5552" target="_blank">Ford 3กฌ 5552</a><br><span class="small italic text-info">(พขร. คุณขจรศักดิ์ 082 883 9335)</span></a>
                </li>
                <li>
                    <a href="https://www.haii.or.th/intranet/modules/webcalendar/login.php?flag=car_f3" data-toggle="tooltip" title="Ford 3กฌ 5553" target="_blank">Ford 3กฌ 5553</a><br><span class="small italic text-info">(พขร. คุณสมชาย 081 918 1030)</span></a>
                </li>
                <li>
                    <a href="https://www.haii.or.th/intranet/modules/webcalendar/login.php?flag=car_f4" data-toggle="tooltip" title="Ford 3กฌ 5554" target="_blank">Ford 3กฌ 5554</a><br><span class="small italic text-info">(ติดอุปกรณ์สำรวจ IMU)</span></a>
                </li>

                <li>
                    <a href="https://www.haii.or.th/intranet/modules/webcalendar/login.php?flag=van8" data-toggle="tooltip" title="Fortuner 3กร 4249" target="_blank">Fortuner 3กร 4249</a><br><span class="small italic text-info">(ติดต่องานเลขาก่อนจอง)</span></a> 
                </li>
            </ul>
        </div>
        <!-- END Car -->
    </div>
</div>

<!-- second block -->
<div class="row">
    <div class="col-md-6">
        <!-- new employee -->
        <div class="widget">
            <div class="widget-title">
                <h4><i class="fa fa-user"></i> New Employee</h4>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class=" col-md-6 col-sm-6">
                        <div class="media">
                            <a class="pull-left colorbox" rel="employee" href="{{ Image::resize('/uploads/images/employees/narinrat.jpg', 600, 600) }}" title="นลินรัตน์  กะลำพะบุตร">
                                <img class="media-object" src="{{ Image::resize('/uploads/images/employees/narinrat.jpg', 64, 64) }}">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">นลินรัตน์  กะลำพะบุตร</h4>
                                เจ้าหน้าที่บริหารงานโครงการ<br>
                                ประสานงานและบริหารโครงการ<br>
                                <span class="text-info">เริ่มงาน : 1 ตุลาคม 2556</span>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-6 col-sm-6">
                        <div class="media ">
                            <a class="pull-left colorbox" rel="employee" href="{{ Image::resize('/uploads/images/employees/pakawat.jpg', 600, 600) }}" title="ภควัต  บุญห่อ">
                                <img class="media-object" src="{{ Image::resize('/uploads/images/employees/pakawat.jpg', 64, 64) }}">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">ภควัต  บุญห่อ</h4>
                                เจ้าหน้าที่บริหารงานสื่อสารองค์กร<br>
                                สื่อสารองค์กร<br>
                                <span class="text-info">เริ่มงาน : 1 ตุลาคม 2556</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row padding-top">
                    <div class=" col-md-6 col-sm-6">
                        <div class="media">
                            <a class="pull-left colorbox" rel="employee" href="{{ Image::resize('/uploads/images/employees/worachat1.jpg', 600, 600) }}" title="วรชาติ วรรณวงษ์">
                                <img class="media-object" src="{{ Image::resize('/uploads/images/employees/worachat1.jpg', 64, 64) }}">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">วรชาติ วรรณวงษ์</h4>
                                นักวิจัย<br>
                                งาน แบบจำลอง<br>
                                <span class="text-info">เริ่มงาน : 3 มิถุนายน 2556</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END new employee -->
    </div>

    <div class="col-md-6">
        <!-- gallery -->
        <div class="widget">
            <div class="widget-title">
                <h4><i class="fa fa-picture-o"></i> Gallery</h4>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <a href="{{ URL::to('myadmin/gallery/HAII.KPI.2014') }}" class="thumbnail">
                            <img src="{{ Image::resize('/uploads/images/gallery/HAII.KPI.2014/20140301-_49A2119.jpg', 95) }}"> 
                        </a>
                        <p class="text-center">สัมมนา KPI<br>ก.พ 2014</p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <a href="{{ URL::to('myadmin/gallery/rd_meeting_jan_2014') }}" class="thumbnail">
                            <img src="{{ Image::resize('/uploads/images/gallery/rd_meeting_jan_2014/20140110-_49A6718.jpg', 95) }}"> 
                        </a>
                        <p class="text-center">งานเลี้ยง R&D<br>ม.ค 2014</p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <a href="{{ URL::to('myadmin/gallery/newyear_2014') }}" class="thumbnail">
                            <img src="{{ Image::resize('/uploads/images/gallery/newyear_2014/20131226-_49A6003.jpg', 95) }}"> 
                        </a>
                        <p class="text-center">ปีใหม่ 2014<br>&nbsp;</p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <a href="{{ URL::to('myadmin/gallery/newyear_2013') }}" class="thumbnail">
                            <img src="{{ Image::resize('/uploads/images/gallery/tn/newyear_2013.jpg', 95) }}"> 
                        </a>
                        <p class="text-center">ปีใหม่ 2013<br>&nbsp;</p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <a href="{{ URL::to('myadmin/gallery/newyear_2012') }}" class="thumbnail">
                            <img src="{{ Image::resize('/uploads/images/gallery/tn/newyear_2012.jpg', 95) }}">  
                        </a>
                        <p class="text-center">ปีใหม่ 2012<br>&nbsp;</p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <a href="{{ URL::to('myadmin/gallery/haii_seminar_2012') }}" class="thumbnail">
                            <img src="{{ Image::resize('/uploads/images/gallery/tn/haii_seminar_2012.jpg', 95) }}">
                        </a>
                        <p class="text-center">สัมนาสถาบัน 2012<br>&nbsp;</p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <a href="{{ URL::to('myadmin/gallery/royal_visit') }}" class="thumbnail">
                            <img src="{{ Image::resize('/uploads/images/gallery/tn/royal_visit.jpg', 95) }}">
                        </a>
                        <p class="text-center">องค์ภาเยี่ยมชมสถาบัน<br>&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END gallery -->
    </div>
</div>
<!-- END second block -->