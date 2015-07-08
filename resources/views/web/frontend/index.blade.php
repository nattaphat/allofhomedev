@extends('layouts.main_v2')

@section('jshome')

@stop

@section('jsbody')

@stop

@section('content')

    <!-- Home, Townhome, Condo -->
    <div class="boxreview">
        <h2>รีวิวโครงการ</h2>
        <div class="list-review">
            <ul>
                @if($catHome != null)
                @foreach($catHome as $item)
                <li>
                    @if($item->vip)
                    <p class="tag-vip"><img src="images/blulet/vip.png" alt="" /></p>
                    @endif
                    <div class="left">
                        <div class="showpic">
                            <?php
                                if($item->id == null)
                                {
                                    $pics = \App\Models\Picture::where('pictureable_id', '=', $item->pictureable_id)
                                            ->where('pictureable_type', '=', 'App\\Models\\CatHome')
                                            ->get();
                                }
                                else
                                {
                                    $pics = \App\Models\Picture::where('pictureable_id', '=', $item->id)
                                    ->where('pictureable_type', '=', 'App\\Models\\CatHome')
                                    ->get();
                                }
                            ?>
                            @if(count($pics) >= 5)
                                <p class="pic-hilight">
                                    <a href="@if($item->review_status == 0) {{ url("preview/")."/".$item->id }} @else {{ url("review/")."/".$item->id }} @endif">
                                        <img src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                             style="width: 256px; height: 156px;" />
                                    </a>
                                </p>
                                <div class="other">
                                    <img src="{{ $pics[1]->file_path }}" alt="{{ $pics[1]->file_name }}"
                                         style="width: 80px; height: 70px;" />
                                    <img src="{{ $pics[2]->file_path }}" alt="{{ $pics[2]->file_name }}"
                                         style="width: 80px; height: 70px;" />
                                    <img src="{{ $pics[3]->file_path }}" alt="{{ $pics[3]->file_name }}"
                                         style="width: 80px; height: 70px;" />
                                    <img src="{{ $pics[4]->file_path }}" alt="{{ $pics[4]->file_name }}"
                                         style="width: 80px; height: 70px;" />
                                </div>
                            @else
                                <p class="pic-hilight">
                                    <a href="@if($item->review_status == 0) {{ url("preview/")."/".$item->id }} @else {{ url("review/")."/".$item->id }} @endif">
                                        <img src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                             style="width: 256px; height: 156px;" />
                                    </a>
                                    <div class="other">
                                        <?php $count = count($pics); ?>
                                        @for($i=1; $i<$count; $i++)
                                        <img src="{{ $pics[$i]->file_path }}" alt="{{ $pics[$i]->file_name }}"
                                             style="width: 80px; height: 70px;" />
                                        @endfor
                                    </div>
                                </p>
                            @endif
                            <div class="clear"></div>
                        </div>
                        <a href="@if($item->review_status == 0) {{ url("preview/")."/".$item->id }} @else {{ url("review/")."/".$item->id }} @endif"><h3>{{ $item->title }}</h3></a>
                        <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}</p>
                        <p>{{ $item->subtitle }}</p>
                    </div>
                    <div class="right">
                        <p class="text-price">ราคาเริ่มต้น</p>
                        <p class="price">&nbsp;&nbsp;{{ $item->sell_price }}</p>
                        <div class="rating">
                            @if($item->avg_rating != null)
                                &nbsp;&nbsp;<span class="label-success"> {{ $item->avg_rating }} คะแนน</span>
                                <!--<img src="images/test/rating.jpg" alt="" />-->
                            @else
                                &nbsp;&nbsp;<span class="label-success">ยังไม่มีการให้คะแนน</span>
                            @endif
                        </div>
                        <div class="call">
                            <?php $brand = \App\Models\Brand::find($item->brand_id) ?>
                            <p>ติดต่อ : {{ $brand->brand_name }}</p>
                            <p class="number">{{ $brand->telephone }}</p>
                        </div>
                    </div>
                    <div class="clear"></div>
                </li>
                @endforeach
                @endif
            </ul>
            <a href="{{ url('review') }}" class="btn-viewmore">ดูเพิ่มเติม</a>
        </div>
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
                    <p><a href="#"><img src="images/test/pic-11.jpg" alt="" /></a></p>
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
                    <p><a href="#"><img src="images/test/pic-12.jpg" alt="" /></a></p>
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
                    <p><a href="#"><img src="images/test/pic-13.jpg" alt="" /></a></p>
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
                @if($catArticle != null)
                @foreach($catArticle as $item)
                <li>
                    <?php
                    if($item->id == null)
                    {
                        $pics = \App\Models\Picture::where('pictureable_id', '=', $item->pictureable_id)
                                ->where('pictureable_type', '=', 'App\\Models\\CatArticle')
                                ->get();
                    }
                    else
                    {
                        $pics = \App\Models\Picture::where('pictureable_id', '=', $item->id)
                                ->where('pictureable_type', '=', 'App\\Models\\CatArticle')
                                ->get();
                    }
                    ?>
                    <p class="pic">
                        <img src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                             style="width: 250px; height: 150px;" />
                    </p>
                    <div class="text">
                        <h3><a href="#">{{ $item->title }}</a></h3>
                        <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}</p>
                        <p>{{ $item->subtitle }}</p>
                    </div>
                    <div class="clear"></div>
                </li>
                @endforeach
                @endif
            </ul>
            <a class="btn-viewmore" href="#">ดูเพิ่มเติม</a>
        </div>
    </div>

    <!-- Idea -->
    <div class="boxDiy">
        <h2>ไอเดียตกแต่งบ้าน</h2>
        <div class="list-diy">
            <ul>
                @if($catIdea != null)
                @foreach($catIdea as $item)
                <li>
                    <?php
                        if($item->id == null)
                        {
                            $pics = \App\Models\Picture::where('pictureable_id', '=', $item->pictureable_id)
                                    ->where('pictureable_type', '=', 'App\\Models\\CatIdea')
                                    ->get();
                        }
                        else
                        {
                            $pics = \App\Models\Picture::where('pictureable_id', '=', $item->id)
                                    ->where('pictureable_type', '=', 'App\\Models\\CatIdea')
                                    ->get();
                        }
                    ?>
                    <p class="pic">
                        <img src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                             style="width: 250px; height: 150px;" />
                    </p>
                    <div class="text">
                        <h3><a href="#">{{ $item->title }}</a></h3>
                        <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}</p>
                        <p>{{ $item->subtitle }}</p>
                    </div>
                    <div class="clear"></div>
                </li>
                @endforeach
                @endif
            </ul>
            <a class="btn-viewmore" href="#">ดูเพิ่มเติม</a>
        </div>

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