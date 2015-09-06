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

        $('#btn_read_more_shop').click(function(e)
        {
            var pg = $('#cat_main_current_page').val();
            var vip_home_string = $('#vip_home_string').val();
            var vip_construct_string = $('#vip_construct_string').val();

            $.ajax({
                url: '{{ url('index/ajax/home') }}',
                data: {
                    page: (parseInt(pg) + 1),
                    vip_home_string : vip_home_string,
                    vip_construct_string : vip_construct_string
                },
                sending: function(file, xhr, formData) {
                    formData.append("_token", $('[name=_token]').val());
                },
                success: function(data) {
                    $('#ul_home li').last().after(data);

                    $('#cat_main_current_page').val((parseInt(pg) + 1));
                    if($('#cat_main_current_page').val() == $('#cat_main_last_page').val())
                    {
                        $('#btn_read_more_shop').attr('style', 'display:none;');
                    }
                }
            });

            e.preventDefault();
        });

        $('#btn_read_more_article').click(function(e)
        {
            debugger;

            var pg = $('#cat_article_current_page').val();
            var vip_article_string = $('#vip_article_string').val();

            $.ajax({
                url: '{{ url('index/ajax/article') }}',
                data: {
                    page: (parseInt(pg) + 1),
                    vip_article_string : vip_article_string
                },
                sending: function(file, xhr, formData) {
                    formData.append("_token", $('[name=_token]').val());
                },
                success: function(data) {
                    debugger;
                    $('#ul_article li').last().after(data);

                    $('#cat_article_current_page').val((parseInt(pg) + 1));
                    if($('#cat_article_current_page').val() == $('#cat_article_last_page').val())
                    {
                        $('#btn_read_more_article').attr('style', 'display:none;');
                    }
                }
            });

            e.preventDefault();
        });


    });
</script>
@stop

@section('content')

    {!! Form::hidden('_token', csrf_token(), ['id' => '_token']) !!}

    {!! Form::hidden('vip_home_string', $vip_home_string, ['id' => 'vip_home_string']) !!}
    {!! Form::hidden('vip_construct_string', $vip_construct_string, ['id' => 'vip_construct_string']) !!}
    {!! Form::hidden('cat_main_current_page', $catNotVip->currentPage(), ['id' => 'cat_main_current_page']) !!}
    {!! Form::hidden('cat_main_last_page', $catNotVip->lastPage(), ['id' => 'cat_main_last_page']) !!}

    {!! Form::hidden('vip_article_string', $vip_article_string, ['id' => 'vip_article_string']) !!}
    {!! Form::hidden('cat_article_current_page', $catArticle->currentPage(), ['id' => 'cat_article_current_page']) !!}
    {!! Form::hidden('cat_article_last_page', $catArticle->lastPage(), ['id' => 'cat_article_last_page']) !!}

    <!-- Home, Townhome, Condo -->
    <div class="boxreview">
        <h2>รีวิวโครงการ</h2>
        <div class="list-review">
            <ul id="ul_home">
                @if($catVip != null)
                    @foreach($catVip as $item)
                        @if(isset($item->for_cat) && isset($item->for_type))
                            @if($item->for_cat == "cat_home")
                                <?php $urlTo =  url("home/view/")."/"; ?>
                            @else
                                <?php $urlTo =  url("shop/")."/"; ?>
                            @endif
                        @endif
                        <li>
                            <p class="tag-vip"><img data-src="{{ asset('images/blulet/vip.png') }}" alt="" /></p>
                            <div class="left">
                                <div class="showpic">
                                    <?php
                                    $pics = \App\Models\Picture::where('pictureable_id', '=', $item->id)
                                            ->where('pictureable_type', '=', 'App\\Models\\CatConstruct')
                                            ->get();
                                    ?>
                                    @if(isset($pics) && count($pics) > 0)
                                        @if(count($pics) >= 5)
                                            <p class="pic-hilight">
                                                <a href="{{ $urlTo.$item->id }}">
                                                    <img data-src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                                         style="width: 256px; height: 156px;" />
                                                </a>
                                            </p>
                                            <div class="other">
                                                <img data-src="{{ $pics[1]->file_path }}" alt="{{ $pics[1]->file_name }}"
                                                     style="width: 80px; height: 70px;" />
                                                <img data-src="{{ $pics[2]->file_path }}" alt="{{ $pics[2]->file_name }}"
                                                     style="width: 80px; height: 70px;" />
                                                <img data-src="{{ $pics[3]->file_path }}" alt="{{ $pics[3]->file_name }}"
                                                     style="width: 80px; height: 70px;" />
                                                <img data-src="{{ $pics[4]->file_path }}" alt="{{ $pics[4]->file_name }}"
                                                     style="width: 80px; height: 70px;" />
                                            </div>
                                        @else
                                        <p class="pic-hilight">
                                            <a href="{{ $urlTo.$item->id }}">
                                                <img data-src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                                     style="width: 256px; height: 156px;" />
                                            </a>
                                            <div class="other">
                                                <?php $count = count($pics); ?>
                                                @for($i=1; $i<$count; $i++)
                                                    <img data-src="{{ $pics[$i]->file_path }}" alt="{{ $pics[$i]->file_name }}"
                                                         style="width: 80px; height: 70px;" />
                                                @endfor
                                            </div>
                                        </p>
                                        @endif
                                    @endif
                                    <div class="clear"></div>
                                </div>
                                <a href="{{ $urlTo.$item->id }}"><h3>{{ $item->title }}</h3></a>
                                <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}</p>
                                <?php
                                $subtitle = str_replace("<p class=\"p1\">","<p>",$item->subtitle);
                                $subtitle = str_replace("<p align=\"left\">","<p>",$subtitle);

                                if (preg_match_all('~<p>(?P<paragraphs>.*?)</p>~is', $subtitle, $matches))
                                {
                                    $str = "";
                                    for($i=0; $i< count($matches['paragraphs']); $i++)
                                    {
                                        $str = $str."<br>".$matches['paragraphs'][$i];
                                    }
                                    echo '<p class="p-subtitle">'.preg_replace('/^(?:<br\s*\/?>\s*)+/', '', $str).'</p>';
                                }
                                else
                                {
                                    echo '<p class="p-subtitle">'.$item->subtitle.'</p>';
                                }
                                ?>
                            </div>
                            <div class="right">
                                <p class="text-price">ราคาเริ่มต้น</p>
                                @if($item->sell_price == null || $item->sell_price == "")
                                    <p class="price" style="padding-top: 22px;
                            padding-left: 0;
                            font-size: 28px;
                            text-align: center;
                            ">
                                        &nbsp;&nbsp;ไม่ระบุราคา</p>
                                @else
                                    <p class="price">&nbsp;&nbsp;{{ $item->sell_price }}<span style="font-size: 28px;"> บาท</span></p>
                                @endif

                                <div class="rating">
                                    @if(isset($item->avg_rating) && $item->avg_rating != null && $item->avg_rating != 0)
                                        <!--<img data-src="images/test/rating.jpg" alt="" />-->
                                        <div class="raty" data-score="{{ $item->avg_rating }}" style="float:left;"></div>
                                        <span class="label-success" style="float:left; margin-left: 10px;   position: relative; top: 3px;"> {{ $item->avg_rating }} คะแนน</span>
                                        <div class="clear"></div>
                                    @else
                                        <span class="label-success">ยังไม่มีการให้คะแนน</span>
                                    @endif
                                </div>
                                <div class="call" style="margin: 20px 0 0;">
                                    <?php $brand = \App\Models\Brand::find($item->brand_id) ?>
                                    <p style="
                                        line-height: 23px;
                                        height: 46px;
                                        overflow: hidden;
                                        color: #646464;
                                    ">ติดต่อ : {{ $brand->brand_name }}</p>
                                    <p class="number">{{ $brand->telephone }}</p>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </li>
                    @endforeach
                @endif
                @if($catNotVip != null)
                    @foreach($catNotVip as $item)
                        @if(isset($item->for_cat) && isset($item->for_type))
                            @if($item->for_cat == "cat_home")
                                <?php $urlTo =  url("home/view/")."/"; ?>
                            @else
                                <?php $urlTo =  url("shop/")."/"; ?>
                            @endif
                        @endif
                        <li>
                            <div class="left">
                                <div class="showpic">
                                    <?php
                                    $pics = \App\Models\Picture::where('pictureable_id', '=', $item->id)
                                            ->where('pictureable_type', '=', 'App\\Models\\CatConstruct')
                                            ->get();
                                    ?>
                                    @if(isset($pics) && count($pics) > 0)
                                        @if(count($pics) >= 5)
                                            <p class="pic-hilight">
                                                <a href="{{ $urlTo.$item->id }}">
                                                    <img data-src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                                         style="width: 256px; height: 156px;" />
                                                </a>
                                            </p>
                                            <div class="other">
                                                <img data-src="{{ $pics[1]->file_path }}" alt="{{ $pics[1]->file_name }}"
                                                     style="width: 80px; height: 70px;" />
                                                <img data-src="{{ $pics[2]->file_path }}" alt="{{ $pics[2]->file_name }}"
                                                     style="width: 80px; height: 70px;" />
                                                <img data-src="{{ $pics[3]->file_path }}" alt="{{ $pics[3]->file_name }}"
                                                     style="width: 80px; height: 70px;" />
                                                <img data-src="{{ $pics[4]->file_path }}" alt="{{ $pics[4]->file_name }}"
                                                     style="width: 80px; height: 70px;" />
                                            </div>
                                        @else
                                            <p class="pic-hilight">
                                                <a href="{{ $urlTo.$item->id }}">
                                                    <img data-src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                                         style="width: 256px; height: 156px;" />
                                                </a>
                                            <div class="other">
                                                <?php $count = count($pics); ?>
                                                @for($i=1; $i<$count; $i++)
                                                    <img data-src="{{ $pics[$i]->file_path }}" alt="{{ $pics[$i]->file_name }}"
                                                         style="width: 80px; height: 70px;" />
                                                @endfor
                                            </div>
                                            </p>
                                        @endif
                                    @endif
                                    <div class="clear"></div>
                                </div>
                                <a href="{{ $urlTo.$item->id }}"><h3>{{ $item->title }}</h3></a>
                                <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}</p>
                                <?php
                                $subtitle = str_replace("<p class=\"p1\">","<p>",$item->subtitle);
                                $subtitle = str_replace("<p align=\"left\">","<p>",$subtitle);
                                if (preg_match_all('~<p>(?P<paragraphs>.*?)</p>~is', $subtitle, $matches))
                                {
                                    $str = "";
                                    for($i=0; $i< count($matches['paragraphs']); $i++)
                                    {
                                        $str = $str."<br>".$matches['paragraphs'][$i];
                                    }
                                    echo '<p class="p-subtitle">'.preg_replace('/^(?:<br\s*\/?>\s*)+/', '', $str).'</p>';
                                }
                                else
                                {
                                    echo '<p class="p-subtitle">'.$item->subtitle.'</p>';
                                }
                                ?>
                            </div>
                            <div class="right">
                                <p class="text-price">ราคาเริ่มต้น</p>
                                @if($item->sell_price == null || $item->sell_price == "")
                                    <p class="price" style="padding-top: 22px;
                        padding-left: 0;
                        font-size: 28px;
                        text-align: center;
                        ">
                                        &nbsp;&nbsp;ไม่ระบุราคา</p>
                                @else
                                    <p class="price">&nbsp;&nbsp;{{ $item->sell_price }}<span style="font-size: 28px;"> บาท</span></p>
                                @endif

                                <div class="rating">
                                    @if(isset($item->avg_rating) && $item->avg_rating != null && $item->avg_rating != 0)
                                        <!--<img data-src="images/test/rating.jpg" alt="" />-->
                                        <div class="raty" data-score="{{ $item->avg_rating }}" style="float:left;"></div>
                                        <span class="label-success" style="float:left; margin-left: 10px;   position: relative; top: 3px;"> {{ $item->avg_rating }} คะแนน</span>
                                        <div class="clear"></div>
                                    @else
                                        <span class="label-success">ยังไม่มีการให้คะแนน</span>
                                    @endif
                                </div>
                                <div class="call" style="margin: 20px 0 0;">
                                    <?php $brand = \App\Models\Brand::find($item->brand_id) ?>
                                    <p style="
                                    line-height: 23px;
                                    height: 46px;
                                    overflow: hidden;
                                    color: #646464;
                                ">ติดต่อ : {{ $brand->brand_name }}</p>
                                    <p class="number">{{ $brand->telephone }}</p>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </li>
                    @endforeach
                    @if($catNotVip->currentPage() != $catNotVip->lastPage())
                        <a id="btn_read_more_shop" href="#" class="btn-viewmore">ดูเพิ่มเติม</a>
                    @endif
                @endif
            </ul>
        </div>
    </div>

    <!-- Compare
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
    -->

    <!-- Article -->
    <div class="boxArticle">
        <h2>บทความและสาระน่ารู้</h2>
        <div class="list-article">
            <ul id="ul_article">
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
                                <?php
                                $subtitle = str_replace("<p class=\"p1\">","<p>",$item->subtitle);
                                $subtitle = str_replace("<p align=\"left\">","<p>",$subtitle);
                                if (preg_match_all('~<p>(?P<paragraphs>.*?)</p>~is', $subtitle, $matches))
                                {
                                    $str = "";
                                    for($i=0; $i< count($matches['paragraphs']); $i++)
                                    {
                                        $str = $str."<br>".$matches['paragraphs'][$i];
                                    }
                                    echo '<p class="p-subtitle">'.preg_replace('/^(?:<br\s*\/?>\s*)+/', '', $str).'</p>';
                                }
                                else
                                {
                                    echo '<p class="p-subtitle">'.$item->subtitle.'</p>';
                                }
                                ?>
                            </div>
                            <div class="clear"></div>
                        </li>
                    @endforeach
                @endif
                @if($catArticle != null)
                    @foreach($catArticle as $item)
                        <li>
                            <?php
                            $pics = \App\Models\Picture::where('pictureable_id', '=', $item['id'])
                                    ->where('pictureable_type', '=', 'App\\Models\\CatArticle')
                                    ->get();
                            ?>
                            <p class="pic">
                                @if(isset($pics) && count($pics) > 0)
                                    <a href="{{ url('article')."/".$item['id'] }}">
                                        <img data-src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                             style="width: 250px; height: 150px;" /></a>
                                @else
                                    &nbsp;
                                @endif
                            </p>
                            <div class="text">
                                <h3><a href="{{ url('article')."/".$item['id'] }}">{{ $item['title'] }}</a></h3>
                                <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($item['created_at']) }}</p>
                                <?php
                                $subtitle = str_replace("<p class=\"p1\">","<p>",$item['subtitle']);
                                $subtitle = str_replace("<p align=\"left\">","<p>",$subtitle);
                                if (preg_match_all('~<p>(?P<paragraphs>.*?)</p>~is', $subtitle, $matches))
                                {
                                    $str = "";
                                    for($i=0; $i< count($matches['paragraphs']); $i++)
                                    {
                                        $str = $str."<br>".$matches['paragraphs'][$i];
                                    }
                                    echo '<p class="p-subtitle">'.preg_replace('/^(?:<br\s*\/?>\s*)+/', '', $str).'</p>';
                                }
                                else
                                {
                                    echo '<p class="p-subtitle">'.$item['subtitle'].'</p>';
                                }
                                ?>
                            </div>
                            <div class="clear"></div>
                        </li>
                    @endforeach
                    @if($catArticle->currentPage() != $catArticle->lastPage())
                        <a id="btn_read_more_article" href="#" class="btn-viewmore">ดูเพิ่มเติม</a>
                    @endif
                @endif
            </ul>
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
                                <?php
                                $subtitle = str_replace("<p class=\"p1\">","<p>",$item->subtitle);
                                $subtitle = str_replace("<p align=\"left\">","<p>",$subtitle);
                                if (preg_match_all('~<p>(?P<paragraphs>.*?)</p>~is', $subtitle, $matches))
                                {
                                    $str = "";
                                    for($i=0; $i< count($matches['paragraphs']); $i++)
                                    {
                                        $str = $str."<br>".$matches['paragraphs'][$i];
                                    }
                                    echo '<p class="p-subtitle">'.preg_replace('/^(?:<br\s*\/?>\s*)+/', '', $str).'</p>';
                                }
                                else
                                {
                                    echo '<p class="p-subtitle">'.$item->subtitle.'</p>';
                                }
                                ?>
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
                                <?php
                                $subtitle = str_replace("<p class=\"p1\">","<p>",$item->subtitle);
                                $subtitle = str_replace("<p align=\"left\">","<p>",$subtitle);
                                if (preg_match_all('~<p>(?P<paragraphs>.*?)</p>~is', $subtitle, $matches))
                                {
                                    $str = "";
                                    for($i=0; $i< count($matches['paragraphs']); $i++)
                                    {
                                        $str = $str."<br>".$matches['paragraphs'][$i];
                                    }
                                    echo '<p class="p-subtitle">'.preg_replace('/^(?:<br\s*\/?>\s*)+/', '', $str).'</p>';
                                }
                                else
                                {
                                    echo '<p class="p-subtitle">'.$item->subtitle.'</p>';
                                }
                                ?>
                            </div>
                            <div class="clear"></div>
                        </li>
                    @endforeach
                @endif
            </ul>
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