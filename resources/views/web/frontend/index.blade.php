@extends('layouts.main_v2')

@section('jshome')

@stop

@section('jsbody')
    <script type="text/javascript">
        $(function() {
            $('div.raty').raty({
                starHalf     : 'images/star-half.png',
                starOff      : 'images/star-off.png',
                starOn       : 'images/star-on.png',
                half         : true,
                starType     : 'img',
                readOnly     : true,
                space        : false,
                score: function() {
                    return $(this).attr('data-score');
                }
            });

            //hides the default paginator
            $('ul.pagination:visible:first').hide();

            //init jscroll and tell it a few key configuration details
            //nextSelector - this will look for the automatically created {{$cat->render()}}
            //contentSelector - this is the element wrapper which is cloned and appended with new paginated data
            $('div#cat_not_vip').jscroll({
                loadingHtml: '<div style=\'margin-top:20px; text-align:center;\'><img src="images/loading_50.gif" alt="Loading" /><br>กำลังโหลดข้อมูล...</div>',
                debug: false,
                autoTrigger: true,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div#cat_not_vip',
                callback: function() {

                    //again hide the paginator from view
                    $('ul.pagination:visible:first').hide();

                }
            });

        });
    </script>
@stop

@section('content')

    <!-- Home, Townhome, Condo -->
    <div class="boxreview">
        <h2>รีวิวโครงการ</h2>
        @include('layouts._partials.shopListIndex')
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
        <div class="list-article">
            <ul>
                @if($catArticleVip != null)
                    @foreach($catArticleVip as $item)
                        <li>
                            <?php
                            $pics = \App\Models\Picture::where('pictureable_id', '=', $item->id)
                                    ->where('pictureable_type', '=', 'App\\Models\\CatArticle')
                                    ->get();
                            ?>
                            <p class="pic">
                                @if(isset($pics) && count($pics) > 0)
                                    <a href="{{ url('article')."/".$item->id }}">
                                        <img data-src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                             style="width: 250px; height: 150px;" /></a>
                                @else
                                    &nbsp;
                                @endif
                            </p>
                            <div class="text">
                                <h3><a href="{{ url('article')."/".$item->id }}">{{ $item->title }}</a></h3>
                                <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}</p>
                                <p class="p-subtitle">{{ $item->subtitle }}</p>
                            </div>
                            <div class="clear"></div>
                        </li>
                    @endforeach
                @endif
                @if($catArticle != null)
                    @foreach($catArticle as $item)
                        <li>
                            <?php
                            $pics = \App\Models\Picture::where('pictureable_id', '=', $item->id)
                                    ->where('pictureable_type', '=', 'App\\Models\\CatArticle')
                                    ->get();
                            ?>
                            <p class="pic">
                                @if(isset($pics) && count($pics) > 0)
                                    <a href="{{ url('article')."/".$item->id }}">
                                        <img data-src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                             style="width: 250px; height: 150px;" /></a>
                                @else
                                    &nbsp;
                                @endif
                            </p>
                            <div class="text">
                                <h3><a href="{{ url('article')."/".$item->id }}">{{ $item->title }}</a></h3>
                                <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}</p>
                                <p class="p-subtitle">{{ $item->subtitle }}</p>
                            </div>
                            <div class="clear"></div>
                        </li>
                    @endforeach
                @endif
            </ul>
            <a class="btn-viewmore" href="#">ดูเพิ่มเติม</a>
            {!! str_replace('/?', '?', $catArticle->render()) !!}
        </div>
    </div>

    <!-- Idea -->
    <div class="boxDiy">
        <h2>ไอเดียตกแต่งบ้าน</h2>
        <div class="list-diy">
            <ul>
                @if($catIdeaVip != null)
                    @foreach($catIdeaVip as $item)
                        <li>
                            <?php
                            $pics = \App\Models\Picture::where('pictureable_id', '=', $item->id)
                                    ->where('pictureable_type', '=', 'App\\Models\\CatIdea')
                                    ->get();
                            ?>
                            <p class="pic">
                                @if(isset($pics) && count($pics) > 0)
                                    <a href="{{ url('idea')."/".$item->id }}">
                                        <img data-src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                             style="width: 250px; height: 150px;" /></a>
                                @else
                                    &nbsp;
                                @endif
                            </p>
                            <div class="text">
                                <h3><a href="{{ url('idea')."/".$item->id }}">{{ $item->title }}</a></h3>
                                <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}</p>
                                <p class="p-subtitle">{{ $item->subtitle }}</p>
                            </div>
                            <div class="clear"></div>
                        </li>
                    @endforeach
                @endif
                @if($catIdea != null)
                    @foreach($catIdea as $item)
                        <li>
                            <?php
                            $pics = \App\Models\Picture::where('pictureable_id', '=', $item->id)
                                    ->where('pictureable_type', '=', 'App\\Models\\CatIdea')
                                    ->get();
                            ?>
                            <p class="pic">
                                @if(isset($pics) && count($pics) > 0)
                                    <a href="{{ url('idea')."/".$item->id }}">
                                        <img data-src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                             style="width: 250px; height: 150px;" /></a>
                                @else
                                    &nbsp;
                                @endif
                            </p>
                            <div class="text">
                                <h3><a href="{{ url('idea')."/".$item->id }}">{{ $item->title }}</a></h3>
                                <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}</p>
                                <p class="p-subtitle">{{ $item->subtitle }}</p>
                            </div>
                            <div class="clear"></div>
                        </li>
                    @endforeach
                @endif
            </ul>
            <a class="btn-viewmore" href="#">ดูเพิ่มเติม</a>
            {!! str_replace('/?', '?', $catIdea->render()) !!}
        </div>
    </div>

    <!-- Buy Sell Rent
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
    -->

    <!-- Job Post
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
    -->

@stop