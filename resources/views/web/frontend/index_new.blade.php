@extends('layouts.main_v2')

@section('jshome')

@stop

@section('jsbody')
<script type="text/javascript">
    $(function() {
        // 1.
        function getPaginationSelectedPage(url) {
            var chunks = url.split('?');
            var baseUrl = chunks[0];
            var querystr = chunks[1].split('&');
            var pg = 1;
            for (i in querystr) {
                var qs = querystr[i].split('=');
                if (qs[0] == 'page') {
                    pg = qs[1];
                    break;
                }
            }
            return pg;
        }

        // 2.
        $('#first').on('click', '.pager a', function(e) {
            debugger;
            e.preventDefault();
            var pg = getPaginationSelectedPage($(this).attr('href'));

            $.ajax({
                url: '{{ url('index/ajax/home') }}',
                data: { page: pg },
                success: function(data) {
                    debugger;
                    $('#first').html(data);
                }
            });
        });

        $('#second').on('click', '.pagination a', function(e) {
            debugger;
            e.preventDefault();
            var pg = getPaginationSelectedPage($(this).attr('href'));

            $.ajax({
                url: '{{ url('index/ajax/article') }}',
                data: { page: pg },
                success: function(data) {
                    debugger;
                    $('#second').html(data);
                }
            });
        });

        $('#third').on('click', '.pagination a', function(e) {
            debugger;
            e.preventDefault();
            var pg = getPaginationSelectedPage($(this).attr('href'));

            $.ajax({
                url: '{{ url('index/ajax/idea') }}',
                data: { page: pg },
                success: function(data) {
                    debugger;
                    $('#third').html(data);
                }
            });
        });

        // 3.
        $('#first').load('{{ url("index/ajax/") }}/home?page=1');
        $('#second').load('{{ url("index/ajax/") }}/article?page=1');
        $('#third').load('{{ url("index/ajax/") }}/idea?page=1');

    });
</script>
@stop

@section('content')

    <!-- Home, Townhome, Condo -->
    <div class="boxreview">
        <h2>รีวิวโครงการ</h2>
        <div id="first" class="list-review"></div>
    </div>

    <!-- Compare -->
    <div class="boxCompare">
        <h2>เปรียบเทียบบ้านใหม่</h2>
        <div class="submenu">
            <a href="#" class="active">บ้านทุกประเภท</a>
            <a href="#">บ้านเดี่ยว</a>
            <a href="#">ทาวน์โฮม/โฮมออฟฟิต</a>
            <a href="#">คอนโดมิเนี่ยม</a>
            <div class="clear"></div>
        </div>
        <div class="list-select">
            <ul>
                <li>
                    <p><a href="#"><img data-src="images/test/pic-11.jpg" alt="" /></a></p>
                    <p class="title">Casa Ville รามอินทรา-หทัยราษฎร์</p>
                    <p class="project-price">ราคาเริ่มเต้น <span>2,500,000</span> บาท</p>
                    <div class="select-project">
                        <select>
                            <option>บมจ.พฤกษา</option>
                        </select>
                        <select>
                            <option>ดูทุกโครงการ</option>
                        </select>
                    </div>
                    <a href="#" class="btn-view">ดูรายละเอียดและโปรโมชั่น</a>
                    <a href="#" class="btn-view">ดูโครงการทั้งหมดของ Casa Ville</a>
                </li>
                <li>
                    <p><a href="#"><img data-src="images/test/pic-12.jpg" alt="" /></a></p>
                    <p class="title">Casa Ville รามอินทรา-หทัยราษฎร์</p>
                    <p class="project-price">ราคาเริ่มเต้น <span>2,500,000</span> บาท</p>
                    <div class="select-project">
                        <select>
                            <option>บมจ.พฤกษา</option>
                        </select>
                        <select>
                            <option>ดูทุกโครงการ</option>
                        </select>
                    </div>
                    <a href="#" class="btn-view">ดูรายละเอียดและโปรโมชั่น</a>
                    <a href="#" class="btn-view">ดูโครงการทั้งหมดของ Casa Ville</a>
                </li>
                <li>
                    <p><a href="#"><img data-src="images/test/pic-13.jpg" alt="" /></a></p>
                    <p class="title">Casa Ville รามอินทรา-หทัยราษฎร์</p>
                    <p class="project-price">ราคาเริ่มเต้น <span>2,500,000</span> บาท</p>
                    <div class="select-project">
                        <select>
                            <option>บมจ.พฤกษา</option>
                        </select>
                        <select>
                            <option>ดูทุกโครงการ</option>
                        </select>
                    </div>
                    <a href="#" class="btn-view">ดูรายละเอียดและโปรโมชั่น</a>
                    <a href="#" class="btn-view">ดูโครงการทั้งหมดของ Casa Ville</a>
                </li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>

    <!-- Article -->
    <div class="boxArticle">
        <h2>บทความและสาระน่ารู้</h2>
        <div id="second" class="list-article"></div>
    </div>

    <!-- Idea -->
    <div class="boxDiy">
        <h2>ไอเดียตกแต่งบ้าน</h2>
        <div id="third" class="list-diy"></div>
    </div>

    <!-- Buy Sell Rent -->
    <div class="boxConversation">
        <h2>สนทนา เเนะนำ ซื้อขายบ้าน</h2>
        <div class="head">
            <span class="topic">กระทู้ Hot</span>
            <span class="read">ผู้อ่าน</span>
            <span class="comment">ความเห็น</span>
            <span class="datetime">วันเวลา</span>
        </div>
        <div class="list-conver">
            <ul>
                <li>
                    <a class="topic">คอนโดมิเนียมที่เป็นอาคารสูง กับคอนโด 8 ชั้น อย่างไหนดีกว่ากัน?</a>
                    <span class="read">200</span>
                    <span class="comment">50</span>
                    <span class="datetime">2014/10/02 08:24:54</span>
                </li>
                <li>
                    <a class="topic">คอนโดมิเนียมที่เป็นอาคารสูง กับคอนโด 8 ชั้น อย่างไหนดีกว่ากัน?</a>
                    <span class="read">200</span>
                    <span class="comment">50</span>
                    <span class="datetime">2014/10/02 08:24:54</span>
                </li>
                <li>
                    <a class="topic">คอนโดมิเนียมที่เป็นอาคารสูง กับคอนโด 8 ชั้น อย่างไหนดีกว่ากัน?</a>
                    <span class="read">200</span>
                    <span class="comment">50</span>
                    <span class="datetime">2014/10/02 08:24:54</span>
                </li>
                <li>
                    <a class="topic">คอนโดมิเนียมที่เป็นอาคารสูง กับคอนโด 8 ชั้น อย่างไหนดีกว่ากัน?</a>
                    <span class="read">200</span>
                    <span class="comment">50</span>
                    <span class="datetime">2014/10/02 08:24:54</span>
                </li>
                <li>
                    <a class="topic">คอนโดมิเนียมที่เป็นอาคารสูง กับคอนโด 8 ชั้น อย่างไหนดีกว่ากัน?</a>
                    <span class="read">200</span>
                    <span class="comment">50</span>
                    <span class="datetime">2014/10/02 08:24:54</span>
                </li>
                <li>
                    <a class="topic">คอนโดมิเนียมที่เป็นอาคารสูง กับคอนโด 8 ชั้น อย่างไหนดีกว่ากัน?</a>
                    <span class="read">200</span>
                    <span class="comment">50</span>
                    <span class="datetime">2014/10/02 08:24:54</span>
                </li>
                <li>
                    <a class="topic">คอนโดมิเนียมที่เป็นอาคารสูง กับคอนโด 8 ชั้น อย่างไหนดีกว่ากัน?</a>
                    <span class="read">200</span>
                    <span class="comment">50</span>
                    <span class="datetime">2014/10/02 08:24:54</span>
                </li>
            </ul>
        </div>
        <a class="btn-viewmore" href="#">ดูเพิ่มเติม</a>

    </div>

    <!-- Job Post -->
    <div class="boxJob">
        <h2>ประกาศรับสมัครงาน</h2>
        <div class="list-job">
            <ul>
                <li>
                    <div class="info">
                        <div class="date">
                            <p>06</p>
                            <p>มีค 2558</p>
                        </div>
                        <div class="text">
                            <h3><a href="#">เจ้าหน้าที่ประจำเซลล์ออฟฟิต</a></h3>
                            <p><a href="#">มาร์เก็ตติ้งติดต่อลูกค้า ต้องโทรหาบอกข้อมูล</a></p>
                        </div>
                    </div>
                    <div class="info">
                        <div class="date">
                            <p>06</p>
                            <p>มีค 2558</p>
                        </div>
                        <div class="text">
                            <h3><a href="#">เจ้าหน้าที่ประจำเซลล์ออฟฟิต</a></h3>
                            <p><a href="#">มาร์เก็ตติ้งติดต่อลูกค้า ต้องโทรหาบอกข้อมูล</a></p>
                        </div>
                    </div>
                    <div class="clear"></div>
                </li>
                <li>
                    <div class="info">
                        <div class="date">
                            <p>06</p>
                            <p>มีค 2558</p>
                        </div>
                        <div class="text">
                            <h3><a href="#">เจ้าหน้าที่ประจำเซลล์ออฟฟิต</a></h3>
                            <p><a href="#">มาร์เก็ตติ้งติดต่อลูกค้า ต้องโทรหาบอกข้อมูล</a></p>
                        </div>
                    </div>
                    <div class="info">
                        <div class="date">
                            <p>06</p>
                            <p>มีค 2558</p>
                        </div>
                        <div class="text">
                            <h3><a href="#">เจ้าหน้าที่ประจำเซลล์ออฟฟิต</a></h3>
                            <p><a href="#">มาร์เก็ตติ้งติดต่อลูกค้า ต้องโทรหาบอกข้อมูล</a></p>
                        </div>
                    </div>
                    <div class="clear"></div>
                </li>
            </ul>

        </div>
    </div>

@stop