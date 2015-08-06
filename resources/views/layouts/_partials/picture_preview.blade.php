<div class="boxreview">

    @if( strpos(URL::current(),"constructor") != false)
        <h2>ผู้รับเหมาก่อสร้าง</h2>
        <h2 class="lineColor"></h2>
        <div class="clear"></div>
        <span class="lineDescription">ข้อมูลบริษัทผู้รับเหมาก่อสร้างชั้นนำ</span>
    @elseif( strpos(URL::current(),"enlarge") != false)
        <h2>ค้นหาช่างซ่อม / ต่อเติม</h2>
        <h2 class="lineColor"></h2>
        <div class="clear"></div>
        <span class="lineDescription">ค้นหาข้อมูล ซ่อมบ้าน ต่อเติมบ้าน</span>
    @elseif( strpos(URL::current(),"construct") != false)
        <h2>รับสร้างบ้าน</h2>
        <h2 class="lineColor"></h2>
        <div class="clear"></div>
        <span class="lineDescription">รับสร้างบ้านโดยบริษัทชั้นนำมืออาชีพ</span>
    @endif

    <div class="pic-project">
        @if($pic != null && count($pic) > 0)
        <div class="preview">
            <div id="slider" class="flexslider" style="margin: 0 0 0 0px;
            /*background: #5fc4c2; */
            /*border: 2px solid #5fc4c2;*/
            border: none;
            box-shadow: none;
            ">
                <ul class="slides">
                    <?php $k = 0; ?>
                    @foreach($pic as $p)
                        <li style="height: 402px;">
                            <table style="height:100%;
                               width: 100%;
                               margin: 0;
                               padding: 0;
                               border: none;">
                                <tr>
                                    <td style="vertical-align: middle;
                                       text-align: center;">
                                        <img data-src="{{ $p->file_path }}" alt="{{ $p->file_name }}" />
                                    </td>
                                </tr>
                            </table>
                        </li>
                        <?php $k++; if($k == 8){ break; } ?>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="list-preview">
            <ul class="list-preview-ul">
                <?php $k = 0; ?>
                @foreach($pic as $p)
                    <li>
                        <img data-src="{{ $p->file_path }}" alt="{{ $p->file_name }}" width="106" height="93" />
                    </li>
                    <?php $k++; if($k == 8){ break; } ?>
                @endforeach
            </ul>
        </div>
        <div class="clear"></div>
        @endif
        <div class="text-preview" style="margin-top: 20px;">
            @if(isset($catHome) && $catHome != null)
                <h3 style="line-height: 28px; letter-spacing: 1.25px;">{{ $catHome->title }}</h3>
                <p style="
                    line-height: 23px;
                    text-indent: 30px;
                    text-align: justify;
                    letter-spacing: 0.8px;
                    margin-top: 10px;
                    ">{{ $catHome->subtitle }}</p>
            @endif
            @if(isset($catConstruct) && $catConstruct != null)
                <h3 style="line-height: 28px; letter-spacing: 1.25px;">{{ $catConstruct->title }}</h3>
                <p style="
                    line-height: 23px;
                    text-indent: 30px;
                    text-align: justify;
                    letter-spacing: 0.8px;
                    margin-top: 10px;
                    ">{{ $catConstruct->subtitle }}</p>
            @endif
        </div>
    </div>
</div>
