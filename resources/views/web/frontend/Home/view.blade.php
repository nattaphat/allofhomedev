@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('jshome')
    {!! $map['js'] !!}
@stop

@section('content')

    <div class="container">
        <div class="row">
            @include('layouts._partials.articleSlide')
        </div>


        <div class="row">
            <div class="col-md-3"></div>
            {{--#### Content ####--}}
            <div class="col-md-6">
                {{--#### Google Map ####--}}
                <div class="row">
                    <div class="panel panel-success">
                        <div class="panel-body">
                            Google Map:
                            {!! $map['html'] !!}
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="panel panel-success">
                        <div class="panel-body">

                            <!-- Blog post -->
                            <div class="row blog-post">
                                <div class="col-md-12">
                                    <div class="media-body">
                                        <div class="sections"><span class="type">โครงการบ้านใหม่</span> / <a href="#" class="tag">พฤกษา</a></div>
                                        <h3 class="title media-heading">
                                            ประกาศขายบ้านใหม่ โครงการพฤกษา รามอินทรา กม.8
                                        </h3>
                                        <div class="sections">
                                            <ul class="list-inline">
                                                <li>
                                                    ลงประกาศโดย:
                                                </li>
                                                <li>
                                                    <i class="fa fa-user"></i> Thitima Admin
                                                </li>
                                                <li>
                                                    <i class="fa fa-calendar"></i> 02/08/2558
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Meta details mobile -->
                                        <ul class="list-inline meta text-muted">
                                            <li><i class="fa fa-calendar"></i> Mon 7th Jan 2013</li>
                                            <li><i class="fa fa-user"></i> <a href="#">Erin</a></li>
                                        </ul>

                                        <!--Main content of post-->
                                        <div class="blog-content">
                                            <div class="blog-media">
                                                <img src="../img/cat_home/picture1.jpg" alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                                            </div>
                                            <p class="lead">At brevitas eum humo jugis obruo pneum qui vereor ymo. Diam distineo eligo elit in iusto nibh quae ulciscor validus.</p>

                                            <p>Illum tamen validus. Brevitas commodo jugis. Abico feugiat patria similis. Eros hos iriure mauris neque nutus. Melior populus roto usitas valetudo. Camur incassum iusto quia quidne refoveo. Camur esse facilisis mos quidne. At magna mos olim si tamen te volutpat.</p>
                                            <p>Et humo illum te vindico zelus. Abluo cogo importunus iriure te. Ad consectetuer consequat laoreet luctus sit vero. Abdo at autem eum olim os saepius secundum suscipit. Abbas aliquam dolore enim ludus qui secundum tation.</p>

                                            <!--Used to highlight key points of post-->
                                            <div class="focus-box pull-right">
                                                <h5>
                                                    ส่วนลด โปรโมชั่น
                                                </h5>
                                                <ul class="fa-ul list-lg">
                                                    <li><i class="fa-li fa fa-check primary-colour"></i> แถมเฟอร์นิเจอร์</li>
                                                    <li><i class="fa-li fa fa-check primary-colour"></i> ฟรีผ้าม้านทั้งหลัง</li>
                                                    <li><i class="fa-li fa fa-check primary-colour"></i> ฟรีแอร์ทั้งหลัง</li>
                                                    <li><i class="fa-li fa fa-check primary-colour"></i> ส่วนลดเงินสด</li>
                                                    <li><i class="fa-li fa fa-check primary-colour"></i> ฟรีค่าใช้จ่ายวันโอน</li>
                                                    <p>ราคาเริ่มต้น 100,000 บาท</p>
                                                    <p>เบอร์ติดต่อ 084-011-2093</p>
                                                </ul>
                                            </div>

                                            <p>Dolus fere gemino hendrerit magna neque patria ratis. Acsi aliquam ibidem imputo jugis proprius refoveo sagaciter. Luptatum macto magna. Dolore et facilisi in interdico ludus minim olim sit. Commoveo cui sagaciter saluto tego. Ea ex lenis odio sit. Autem comis gilvus jumentum ludus modo praesent quibus.</p>
                                            <p>Adipiscing commodo consectetuer eum facilisis iustum luctus nibh. Acsi eros pecus pneum ulciscor. Dolore esse nulla quae volutpat. Commodo olim si suscipit. Huic immitto iusto praemitto singularis ut utinam valde.</p>
                                            <p>Ex hendrerit ibidem iustum mauris meus oppeto qui singularis volutpat. Cogo iriure torqueo. Adipiscing brevitas caecus feugiat iriure natu probo quia verto. Distineo occuro pneum sit vero. Amet at caecus facilisi illum jumentum ludus nisl patria. Accumsan augue camur facilisi interdico nimis nisl refero vulputate. Abico commoveo hendrerit oppeto roto utrum zelus.</p>
                                            <p>Amet esca quis utinam. Hos melior natu ullamcorper. Amet consectetuer elit ideo immitto interdico letalis refoveo roto suscipere. Aliquip ibidem minim rusticus scisco tamen. Antehabeo brevitas meus populus refoveo. Eros gilvus neque nobis ratis refoveo vero.</p>
                                            <p>Capto genitus iustum. Dolor mos nimis obruo quidem quis te. Camur jugis jumentum jus molior refero suscipit validus. Abluo adipiscing commoveo enim euismod imputo nunc verto. Distineo dolus hos lucidus oppeto praemitto saluto singularis tation. Importunus luptatum macto qui refero veniam vero.</p>
                                            <p>Appellatio modo validus. Bene decet et illum incassum loquor nisl sed ullamcorper vindico. Tamen vel vulputate. Abbas ibidem lenis mos nibh scisco sit usitas. Adipiscing autem damnum diam ea genitus inhibeo macto saepius. Erat et iustum mauris sagaciter tamen. Aliquip causa commodo esse ludus neque nutus. Augue damnum feugiat gilvus lenis mos obruo pala velit.</p>
                                        </div>

                                        <!-- Post Tags -->
                                        <div class="tag-cloud post-tag-cloud">
                                            <h4>
                                                Tags
                                            </h4>
                                            <a href="#" class="tag">พฤกษา</a>
                                            <a href="#" class="tag">โครงการบ้านใหม่</a>
                                            <a href="#" class="tag">รามอินทรา</a>
                                            <a href="#" class="tag">แถมเฟอร์นิเจอร์</a>
                                            <a href="#" class="tag">ฟรีผ้าม้านทั้งหลัง</a>
                                            <a href="#" class="tag">ส่วนลดเงินสด</a>
                                            <a href="#" class="tag">ฟรีค่าใช้จ่ายวันโอน</a>
                                        </div><br>

                                        <!-- #### Share Widget -->
                                        <div class="row">
                                            <div class="col-md-3 pull-left">
                                                <h4 class="text-light">
                                                    Favourite:
                                                </h4>
                                                <a href="#">
                                                    <button type="button" class="btn btn-success btn-sm">
                                                        <i class="fa fa-heart-o fa-lg"></i> &nbsp;&nbsp;
                                                        เพิ่มเป็นรายการโปรด</button>
                                                </a>
                                            </div>
                                            <div class="col-md-3 pull-right">
                                                <h4 class="text-light">
                                                    Share it:
                                                </h4>
                                                <a href="#" class="social-link branding-twitter">
                                                    <i class="fa fa-twitter-square fa-3x"></i></a>
                                                <a href="#" class="social-link branding-facebook">
                                                    <i class="fa fa-facebook-square fa-3x"></i></a>
                                                <a href="#" class="social-link branding-line">
                                                    <img src="../img/icon/icon-line.jpeg" alt="Line"
                                                         style="max-width: 35px;" />
                                                </a>
                                            </div>
                                        </div>

                                        <div class="block block-callout post-block">
                                            <!-- About The Author -->
                                            <div class="post-author">
                                                <h4>
                                                    ข้อมูลการติดต่อ:
                                                </h4>
                                                <div style="padding-left: 20px;">
                                                    <p>
                                                        <strong>ชื่อบริษัท:</strong> &nbsp;&nbsp; Company Name Co., Ltd.
                                                    </p>
                                                    <p>
                                                        <strong>
                                                            เบอร์โทรศัพท์:</strong> &nbsp;&nbsp; 02-3911820
                                                    </p>
                                                    <p>
                                                        <strong>
                                                            ที่อยู่:</strong> &nbsp;&nbsp; Sunshine House, Sunville. SUN12 8LU.
                                                    </p>
                                                    <p>
                                                        <strong>
                                                            อีเมล์:</strong> &nbsp;&nbsp; info@allofhome.com
                                                    </p>
                                                    <p>
                                                        <strong>
                                                            เว็บไซต์:</strong> &nbsp;&nbsp; www.allofhome.com
                                                    </p>
                                                    <p>
                                                        <strong>
                                                            LINE ID:</strong> &nbsp;&nbsp; allofhome
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--#### ข้อมูลผู้ติดต่อ ####--}}
                <div class="row">
                    <div class="panel panel-success">
                        <div class="panel-body">

                            <!--Comments-->
                            <div class="comment" id="comments">
                                <h5>ความคิดเห็นทั้งหมด (10)</h5><br/>
                                <div class="row">
                                    <div class="block block-callout post-block" style="margin: 0em 10px 0em 10px;">
                                        <div class="post-author">
                                            @for($i=0; $i<10; $i++)
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img src="http://i.ytimg.com/vi/RscymgpZEGQ/hqdefault.jpg"
                                                             alt="User" class="img-responsive" />
                                                    </div>
                                                    <div class="col-md-9">
                                                        <ul class="list-inline meta text-muted">
                                                            <li><i class="fa fa-user"></i> Thitima Admin</li>
                                                            <li><i class="fa fa-calendar"></i> 02/07/2558</li>
                                                        </ul>
                                                        <p>a nec in sed hac ultrices cursusa nec in sed hac ultrices cursusa nec in sed hac ultrices cursusa nec in sed hac ultrices cursus</p>
                                                    </div>
                                                </div>
                                                @if($i != 9)
                                                    <hr>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                <form id="comment-form" class="comment-form" role="form"
                                      action="#" method="get">
                                    <h5>แสดงความคิดเห็น</h5>
                                    <div class="form-group">
                                        <label class="sr-only" for="comment-name">Name</label>
                                        <input type="text" class="form-control" id="comment-name" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="comment-name">Email</label>
                                        <input type="email" class="form-control" id="comment-email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="comment-comment">Comment</label>
                                        <textarea rows="8" class="form-control" id="comment-comment" placeholder="Comment"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </div>


                        </div>
                    </div>
                </div>

            </div>

            {{--#### Banner ####--}}
            <div class="col-md-3">
                <div>
                    <a href="#">
                        <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                             alt="Banner 1" class="img-responsive" />
                    </a>
                </div>
                <div style="padding-top: 20px;">
                    <a href="#">
                        <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                             alt="Banner 2" class="img-responsive" />
                    </a>
                </div>
                <div style="padding-top: 20px;">
                    <a href="#">
                        <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                             alt="Banner 1" class="img-responsive" />
                    </a>
                </div>
                <div style="padding-top: 20px;">
                    <a href="#">
                        <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                             alt="Banner 2" class="img-responsive" />
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop