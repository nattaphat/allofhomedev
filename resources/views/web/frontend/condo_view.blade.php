@extends('layouts.main_view')

@section('jshome')

@stop

@section('jsbody')

@stop

@section('content')

    <div class="boxreview">
        <h2 class="h-review-inner">รีวิวโครงการ</h2>
        <div class="pic-project">
            <div class="preview">
                <a href="#" class="prev"></a>
                <a href="#" class="next"></a>
                <div class="tag-day">
                    <p>02</p>
                    <p>มีค 2558</p>
                </div>
                <img src="{{ asset('images/test/pic-18.jpg') }}" alt="" />
            </div>
            <div class="list-preview">
                <ul>
                    <li><a href="#"><img src="{{ asset('images/test/pic-19.jpg') }}" alt="" /></a></li>
                    <li><a href="#"><img src="{{ asset('images/test/pic-20.jpg') }}" alt="" /></a></li>
                    <li><a href="#"><img src="{{ asset('images/test/pic-21.jpg') }}" alt="" /></a></li>
                    <li><a href="#"><img src="{{ asset('images/test/pic-22.jpg') }}" alt="" /></a></li>
                    <li><a href="#"><img src="{{ asset('images/test/pic-19.jpg') }}" alt="" /></a></li>
                    <li><a href="#"><img src="{{ asset('images/test/pic-20.jpg') }}" alt="" /></a></li>
                    <li><a href="#"><img src="{{ asset('images/test/pic-21.jpg') }}" alt="" /></a></li>
                    <li><a href="#"><img src="{{ asset('images/test/pic-22.jpg') }}" alt="" /></a></li>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="text-preview">
                <h3>The Niche Pride Thonglor - Petchaburi (เดอะ นิช ไพร์ด ทองหล่อ - เพชรบุรี)</h3>
                <p>โปรโมชั่น 6 - 7 มิ.ย. 58 นี้รับเครื่องใช้ไฟฟ้าฟรี Condo low rise 8 ชั้น จำนวน 3 อาคาร ใกล้รถไฟฟ้าสายสีชมพูสถานีเศรษฐบุตร</p>
            </div>
        </div>
    </div>

    <div class="boxMember">
        <div class="left">
            <div class="profile">
                <h2>ID Post</h2>
                <div class="detail">
                    <div class="pic-profile">
                        <p><img src="{{ asset('images/test/pic-23.jpg') }}" alt="" /></p>
                        <p class="name">อุเทน สุขรำมิ</p>
                    </div>
                    <div class="info-profile">
                        <ul>
                            <li>
                                <h3>เบอร์โทรศัพท์</h3>
                                <p>099 254 1569</p>
                            </li>
                            <li>
                                <h3>อีเมลล์</h3>
                                <p>uthen@gmail.com</p>
                            </li>
                            <li>
                                <h3>line ID</h3>
                                <p>imhound</p>
                            </li>
                        </ul>

                    </div>
                    <div class="clear"></div>
                </div>
                <a href="#" class="btn-addfriend"></a>
            </div>

        </div>
        <div class="right">
            <h2>ติดต่อเจ้าของประกาศ</h2>
            <div class="form">
                <input type="text" value="หัวข้อ" />
                <textarea>ข้อความ</textarea>
                <input type="tel" value="เบอร์ติดต่อกลับ*" />
            </div>
            <input type="submit" value="" class="btn-submit" />
            <input type="button" value="" class="btn-cancel" />
        </div>
        <div class="clear"></div>
        <div class="button">
            <a href="#" class="btn-likepage"></a>
            <a href="#" class="btn-share"></a>
            <a href="#" class="btn-favorite">เพิ่มเป็นรายการโปรด</a>
        </div>

    </div>

    <div class="boxMap">
        <h2>พิกัดที่ตั้งโครงการ :</h2>
        <div class="map-google"><img src="{{ asset('images/test/map.jpg') }}" alt="" /></div>
        <a href="#" class="btn-searchggm">ค้าหาเส้นทางจาก Google Map</a>
    </div>

    <div class="boxVdoReview">
        <h2>วิีดิโอรีวิว :</h2>
        <div class="vdo-review"><img src="{{ asset('images/test/vdo.jpg') }}" alt="" /></div>
        <div class="contact-detail">
            <div class="left">
                <h3>ข้อมูลติดต่อร้านค้า :</h3>
                <ul>
                    <li>
                        <span class="title">ชื่อบริษัท่ :</span>
                        <span class="info"></span>
                    </li>
                    <li>
                        <span class="title">ชื่อร้านค้า :</span>
                        <span class="info"></span>
                    </li>
                    <li>
                        <span class="title">ที่อยู่ :</span>
                        <span class="info"></span>
                    </li>
                    <li>
                        <span class="title">เบอร์โทรศัพท์ :</span>
                        <span class="info"></span>
                    </li>
                    <li>
                        <span class="title">เบอร์มือถือ :</span>
                        <span class="info"></span>
                    </li>
                    <li>
                        <span class="title">เบอร์แฟกซ์ :</span>
                        <span class="info"></span>
                    </li>
                    <li>
                        <span class="title">เว็บไซต์ :</span>
                        <span class="info"></span>
                    </li>
                    <li>
                        <span class="title">FB Fanpage :</span>
                        <span class="info">วันเปิดนริการ :</span>
                    </li>
                    <li>
                        <span class="title">ราคาเริ่มต้น :</span>
                        <span class="info">เวลาเปิดบริการ :</span>
                    </li>
                    <li>
                        <span class="title">รับบัตรเครดิต :</span>
                        <span class="info">ร้านค้ามีที่จอดรถ :</span>
                    </li>

                </ul>
            </div>
            <div class="right">
                <div class="rating">
                    <span><img src="{{ asset('images/blulet/bstar-y.png') }}" alt="" /></span>
                    <span><img src="{{ asset('images/blulet/bstar-y.png') }}" alt="" /></span>
                    <span><img src="{{ asset('images/blulet/bstar-y.png') }}" alt="" /></span>
                    <span><img src="{{ asset('images/blulet/bstar-y.png') }}" alt="" /></span>
                    <span><img src="{{ asset('images/blulet/bstar-g.png') }}" alt="" /></span>
                </div>
                <p class="text">คะแนนกำหนดจากให้ดาวจากผู้ใช้งานจริง</p>
                <div class="scoll">
                    <h3>โครงสร้างคะแนน</h3>
                    <ul>
                        <li>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                        </li>
                        <li>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                        </li>
                        <li>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                        </li>
                        <li>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                        </li>
                        <li>
                            <span><img src="{{ asset('images/blulet/star.png') }}" alt="" /></span>
                        </li>
                    </ul>
                </div>
                <div class="branch">
                    <h3>สาขาอื่นๆ</h3>
                    <ul>
                        <li><a href="#">สาขาอื่นๆ</a></li>
                        <li><a href="#">สาขาอื่นๆ</a></li>
                        <li><a href="#">สาขาอื่นๆ</a></li>
                        <li><a href="#">สาขาอื่นๆ</a></li>
                        <li><a href="#">สาขาอื่นๆ</a></li>
                        <li><a href="#">สาขาอื่นๆ</a></li>
                        <li><a href="#">สาขาอื่นๆ</a></li>
                        <li><a href="#">สาขาอื่นๆ</a></li>

                    </ul>
                </div>

            </div>
            <div class="clear"></div>

        </div>
        <div class="other-detail">
            <h3>รายละเอียดอื่นๆ :</h3>
            <ul>
                <li>
                    <span class="title">ประเภทที่อยู่ :</span>
                    <span class="info">คอนโด</span>
                </li>
                <li>
                    <span class="title">สถานที่ตั้ง :</span>
                    <span class="info">ถนนเพชรบุรี แขวง บางกะปิ เขต ห้วยขวาง กรุงเทพฯ 10310 (เยื้องกับ รพ. กรุงเทพ)
                        ห่างจากปากซอยทองหล่อประมาณ 280 เมตร</span>
                </li>
                <li>
                    <span class="title">ลักษณะอาคาร :</span>
                    <span class="info">คอนโดมิเนียม 33 ชั้น จำนวน 1 อาคาร ที่จอดรถชั้นที่ 1 ถึง 4</span>
                </li>
                <li>
                    <span class="title">จำนวนยูนิต :</span>
                    <span class="info">667 ยูนิต</span>
                </li>
                <li>
                    <span class="title">ขนาดที่ดิน :</span>
                    <span class="info">3 – 2 - 71 ไร่</span>
                </li>
                <li>
                    <span class="title">รูปแบบที่พักอาศัย :</span>
                    <span class="info">1 bedroom ขนาด 30.4, 30.9, 34.8, 33.75 และ 44.4 ตรม.
                        2 bedroom ขนาด 59 ตร.ม.</span>
                </li>
                <li>
                    <span class="title">จำนวนที่จอดรถ :</span>
                    <span class="info">42% โดยประมาณ</span>
                </li>
                <li>
                    <span class="title">พื้นที่ :</span>
                    <span class="info">30.4 – 59 ตร.ม.</span>
                </li>
                <li>
                    <span class="title">ราคาเฉลี่ย / ตร.ม. :</span>
                    <span class="info">เริ่ม 90,000 บาท บาท</span>
                </li>
                <li>
                    <span class="title">สิ่งอำนวยความสะดวก :</span>
                    <span class="info">สระว่ายน้ำระบบเกลือยาวประมาณ 35 เมตร พร้อมด้วยจากุซซี่, สระว่ายน้ำเด็ก, สวนสวย
                        และศาลาสำหรับพักผ่อน, ห้องออกกำลังกาย, ห้องสมุด, ห้องเซาว์น่า, CCTV,
                        ระบบ Key card เข้าตัวอาคารและชั้นจอดรถ, 24 Hrs. security guard และ Shuttle Van
                        บริการรับ – ส่ง MRT, Airport Link บนถนนอโศก</span>
                </li>
                <li>
                    <span class="title">เว็ปไซต์ :</span>
                    <span class="info">www.sena.co.th</span>
                </li>
                <li>
                    <span class="title">จ้าของโครงการ :</span>
                    <span class="info">บริษัท เสนาดีเวลลอปเม้นท์ จำกัด (มหาชน)</span>
                </li>
                <li>
                    <span class="title">โทร :</span>
                    <span class="info">095-484-7070</span>
                </li>
            </ul>
        </div>
        <div class="location">
            <h3>ทำเลและการเดินทาง :</h3>
            <p class="description">ในที่สุดทางเสนาก็ปล่อยคอนโดใหม่ล่าสุดระดับ Premium นั้นก็คือ The Niche Pride บนทำเลติดถนนใหญ่เพชรบุรี ใกล้ทองหล่อ (สุขุมวิท 55) ได้ยินมาว่าราคาเริ่มต้น/ตร.ม. ประมาณ 90,000 บาท สำหรับทำเลที่ตั้งของโครงการนี้ถือว่าอยู่ใกล้กับแหล่งสำคัญๆหลายแห่ง ถึงแม้จะไม่ได้ใกล้สักทีเดียว
                แต่การเดินทางไปยังจุดหมายต่างๆก็ถือว่าสะดวก และรวดเร็วขึ้น เพราะทำเลของโครงการนี้จะอยู่บนถนนเพชรบุรี ใกล้กับทองหล่อ ซึ่งถนนเพชรบุรีจะเป็นถนนที่ขนาดกับถนนสุขุมวิท</p>
            <ul>
                <li>
                    <span class="title">Zone :</span>
                    <span class="info">เพชรบุรีตัดใหม่ พัฒนาการ คลองตัน</span>
                </li>
                <li>
                    <span class="title">รถไฟฟ้าใกล้เคียง :</span>
                    <span class="info">1. MRT สายสีน้ำเงิน สถานีเพชรบุรี 2. BTS สายสีเขียวเส้นสุขุมวิท สถานีทองหล่อ (E6)</span>
                </li>
                <li>
                    <span class="title">จุดขึ้นลงทางด่วน :</span>
                    <span class="info">ทางด่วน พระราม9 ศรีรัช (รัชดาภิเษก)</span>
                </li>
                <li>
                    <span class="title">สถานที่ใกล้เคียง :</span>
                    <span class="info">ห้างสรรพสินค้าThe Emporium, Em Quartier, Terminal 21, J-Avenue, Central Plaza Rama 9 สถาบันการศึกษา และหน่วยงานราชการ ม.ศรีนครินทรวิโรฒ ประสานมิตร, ร.ร.สาธิต มศว.ประสานมิตร, ร.ร.วัฒนา วิทยาลัย, ร.ร.เซนต์
                        ดอมินิค, ร.ร.นานาชาติอเมริกันสถานพยาบาล ร.พ.กรุงเทพ, ร.พ.ปิยะเวท, ร.พ.สมิติเวช สุขุมวิท, ร.พ. คามิลเลี่ยน
                        Airport Link มักกะสัน, รามคำแหง MRT สถานีเพชรบุรี BTS สถานีทองหล่อ</span>
                </li>
            </ul>
        </div>

        <div class="data-project">
            <ul>
                <li>
                    <a href="#" class="head-data" id="active">ข้อมูลที่ 1</a>
                    <div class="detail active">
                        ห้างสรรพสินค้าThe Emporium, Em Quartier, Terminal 21, J-Avenue, Central Plaza Rama 9 สถาบันการศึกษา และหน่วยงานราชการ ม.ศรีนครินทรวิโรฒ ประสานมิตร, ร.ร.สาธิต มศว.ประสานมิตร, ร.ร.วัฒนา วิทยาลัย, ร.ร.เซนต์ ดอมินิค, ร.ร.นานาชาติอเมริกันสถานพยาบาล
                        ร.พ.กรุงเทพ, ร.พ.ปิยะเวท, ร.พ.สมิติเวช สุขุมวิท, ร.พ. คามิลเลี่ยน Airport Link มักกะสัน, รามคำแหง MRT สถานีเพชรบุรี BTS สถานีทองหล่อ
                        J-Avenue, Central Plaza Rama 9 สถาบันการศึกษา และหน่วยงานราชการ J-Avenue,
                    </div>
                </li>
                <li>
                    <a href="#" class="head-data">ข้อมูลที่ 2</a>
                    <div class="detail">
                        ห้างสรรพสินค้าThe Emporium, Em Quartier, Terminal 21, J-Avenue, Central Plaza Rama 9 สถาบันการศึกษา และหน่วยงานราชการ ม.ศรีนครินทรวิโรฒ ประสานมิตร, ร.ร.สาธิต มศว.ประสานมิตร, ร.ร.วัฒนา วิทยาลัย, ร.ร.เซนต์ ดอมินิค, ร.ร.นานาชาติอเมริกันสถานพยาบาล
                        ร.พ.กรุงเทพ, ร.พ.ปิยะเวท, ร.พ.สมิติเวช สุขุมวิท, ร.พ. คามิลเลี่ยน Airport Link มักกะสัน, รามคำแหง MRT สถานีเพชรบุรี BTS สถานีทองหล่อ
                        J-Avenue, Central Plaza Rama 9 สถาบันการศึกษา และหน่วยงานราชการ J-Avenue,
                    </div>
                </li>
                <li>
                    <a href="#" class="head-data">ข้อมูลที่ 3</a>
                    <div class="detail">
                        ห้างสรรพสินค้าThe Emporium, Em Quartier, Terminal 21, J-Avenue, Central Plaza Rama 9 สถาบันการศึกษา และหน่วยงานราชการ ม.ศรีนครินทรวิโรฒ ประสานมิตร, ร.ร.สาธิต มศว.ประสานมิตร, ร.ร.วัฒนา วิทยาลัย, ร.ร.เซนต์ ดอมินิค, ร.ร.นานาชาติอเมริกันสถานพยาบาล
                        ร.พ.กรุงเทพ, ร.พ.ปิยะเวท, ร.พ.สมิติเวช สุขุมวิท, ร.พ. คามิลเลี่ยน Airport Link มักกะสัน, รามคำแหง MRT สถานีเพชรบุรี BTS สถานีทองหล่อ
                        J-Avenue, Central Plaza Rama 9 สถาบันการศึกษา และหน่วยงานราชการ J-Avenue,
                    </div>
                </li>
                <li>
                    <a href="#" class="head-data">ข้อมูลที่ 4</a>
                    <div class="detail">
                        ห้างสรรพสินค้าThe Emporium, Em Quartier, Terminal 21, J-Avenue, Central Plaza Rama 9 สถาบันการศึกษา และหน่วยงานราชการ ม.ศรีนครินทรวิโรฒ ประสานมิตร, ร.ร.สาธิต มศว.ประสานมิตร, ร.ร.วัฒนา วิทยาลัย, ร.ร.เซนต์ ดอมินิค, ร.ร.นานาชาติอเมริกันสถานพยาบาล
                        ร.พ.กรุงเทพ, ร.พ.ปิยะเวท, ร.พ.สมิติเวช สุขุมวิท, ร.พ. คามิลเลี่ยน Airport Link มักกะสัน, รามคำแหง MRT สถานีเพชรบุรี BTS สถานีทองหล่อ
                        J-Avenue, Central Plaza Rama 9 สถาบันการศึกษา และหน่วยงานราชการ J-Avenue,
                    </div>
                </li>
                <li>
                    <a href="#" class="head-data">ข้อมูลที่ 5</a>
                    <div class="detail">
                        ห้างสรรพสินค้าThe Emporium, Em Quartier, Terminal 21, J-Avenue, Central Plaza Rama 9 สถาบันการศึกษา และหน่วยงานราชการ ม.ศรีนครินทรวิโรฒ ประสานมิตร, ร.ร.สาธิต มศว.ประสานมิตร, ร.ร.วัฒนา วิทยาลัย, ร.ร.เซนต์ ดอมินิค, ร.ร.นานาชาติอเมริกันสถานพยาบาล
                        ร.พ.กรุงเทพ, ร.พ.ปิยะเวท, ร.พ.สมิติเวช สุขุมวิท, ร.พ. คามิลเลี่ยน Airport Link มักกะสัน, รามคำแหง MRT สถานีเพชรบุรี BTS สถานีทองหล่อ
                        J-Avenue, Central Plaza Rama 9 สถาบันการศึกษา และหน่วยงานราชการ J-Avenue,
                    </div>
                </li>
            </ul>
            <p class="remark">* ข้อมูล และภาพถ่ายต่างๆ อาจมีการเปลี่ยนแปลง โดยทางเราไม่จำเป็นต้องแจ้งให้ทราบล่วงหน้า</p>
        </div>
    </div>

    <div class="boxContactProject">
        <h2>ติดต่อโครงการ</h2>
        <div class="call">
            <p>ติดต่อ : General Member</p>
            <p class="number">02 102 2800</p>
        </div>
    </div>

    <div class="boxTag">
        <h2>Tags : </h2>
        <div class="tags">
            <a href="#">homezoomer</a>
            <a href="#">โฮมซูมเมอร์</a>
            <a href="#">homezoomer.com</a>
            <a href="#">คอนโด condo</a>
            <a href="#">คอนโดมิเนียม</a>
            <a href="#">condominium</a>
            <a href="#">ครงการใหม</a>
            <a href="#">สังหาริมทรัพย์</a>
            <a href="#">คอนโดใกล้รถไฟฟ้า</a>
            <a href="#">อสังหา</a>
            <a href="#">บ้าน</a>
            <a href="#">house</a>
            <a href="#">คอนโดใหม</a>
            <a href="#">ขายคอนโด</a>
        </div>
        <div class="buttonfb">
            <div><img src="{{ asset('images/test/fb.jpg') }}" /></div>
            <p class="text">ฝากกด like และ share เพื่อเป็นกำลังใจเจ้าของกระทู้ด้วยนะคะ</p>
        </div>
        <div class="comment-fb"><img src="{{ asset('images/test/commentfb.jpg') }}" /></div>
    </div>

    <div class="boxFinan">
        <h2>ข้อมูลไฟแนนซ์</h2>
        <div class="form-finan">
            <div class="left">
                <h3>คำนวนค่างวดผ่อนบ้าน</h3>
                <ul>
                    <li>
                        <span class="title">ราคาบ้าน</span>
                        <input type="text" class="enter-data" />
                        <span>บาท</span>
                    </li>
                    <li>
                        <span class="title">จอง</span>
                        <input type="text" class="enter-data" />
                        <span></span>
                    </li>
                    <li>
                        <span class="title">ดาวน์</span>
                        <input type="text" class="enter-data-2" />
                        <span>บาท</span>
                        <span>หรือ</span>
                        <input type="text" class="enter-data-3" />
                        <span>%</span>
                    </li>
                    <li>
                        <span class="title">โอน</span>
                        <input type="text" class="enter-data" />
                        <span></span>
                    </li>
                    <li>
                        <span class="title">ระยะเวลาผ่อนชำระ</span>
                        <input type="text" class="enter-data" />
                        <span></span>
                    </li>
                    <li>
                        <span class="title orange">อัตราดอกเบี้ยต่อปี</span>
                        <input type="text" class="enter-data" />
                        <span>%</span>
                    </li>
                </ul>
                <div class="button">
                    <input type="submit" value="" class="btn-calculate" />
                    <input type="button" class="btn-cancel" />
                </div>
            </div>
            <div class="right">
                <h3>ติดต่อธนาคารเพื่อรับสินเชื่อ</h3>
                <ul>
                    <li><a href="#"><img src="{{ asset('images/logo/tmb.jpg') }}" alt="" /></a></li>
                    <li><a href="#"><img src="{{ asset('images/logo/ktb.jpg') }}" alt="" /></a></li>
                    <li><a href="#"><img src="{{ asset('images/logo/krungsri.png') }}" alt="" /></a></li>
                    <li><a href="#"><img src="{{ asset('images/logo/kasikorn.jpg') }}" alt="" /></a></li>

                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <div class="boxShowBrand">
        <h2>แสดงโครงการตามแบรนด์</h2>
        <ul>
            <li><a href="#"><img src="{{ asset('images/logo/sansiri.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/ap.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/gusto.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/prinsiri.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/lpn.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/perfect.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/noble.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/pruksa.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/casa.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/udelight.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/ucampus.jpg') }}" alt="" /></a></li>
            <li><a href="#"><img src="{{ asset('images/logo/scasset.jpg') }}" alt="" /></a></li>
        </ul>
        <div class="clear"></div>
    </div>

@stop