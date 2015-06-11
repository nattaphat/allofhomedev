@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('jshome')
    {!! $map['js'] !!}
@stop

@section('jsbody')
    <style>
        .divTable {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 250px;;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .divTableCell {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .titleTableCell {
            font-size: 18px;

        }
    </style>
@stop

@section('content')

    <div class="container">

        <div class="row">
            <div class="row">
                @include('layouts._partials.articleSlide')
            </div>

            <div class="row" style="margin-top:30px;">
                <div class="panel panel-default" >
                    <div class="panel-body">
                        <div class="row">
                            {{--####Banner--}}
                            <div class="col-md-3">
                                <div class="row" style="padding-top: 20px; padding-left:10px; padding-right:10px;">
                                    <a href="#">
                                        <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                                             alt="Feature 1" class="img-responsive" />
                                    </a>
                                </div>
                                <div class="row" style="padding-top: 20px;  padding-left:10px; padding-right:10px;">
                                    <a href="#">
                                        <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                                             alt="Feature 1" class="img-responsive" />
                                    </a>
                                </div>
                            </div>
                            {{--####Detail--}}
                            <div class="col-md-9" >
                                <div class="block features">
                                    <h2 class="title-divider" >
                                        <span style="color: #55a79a;">แสดง ร้านค้า/โครงการ ตามแบรนด์</span>
                                    </h2>
                                    <div class="row">
                                        <div class="col-md-12 block features">
                                            <ul class="row list-unstyled block customers">
                                                <li class="customer type-design" data-quicksand-id="id-1" data-quicksand-tid="type-design">
                                                    <a href="#">
                                                    <span class="inner-wrapper">
                                                        <span class="img-wrapper">
                                                            <img src="http://upload.wikimedia.org/wikipedia/commons/1/17/Logo_pruksa-thai_cs2.png"
                                                                 alt="Customer 1" class="img-responsive" />
                                                        </span>
                                                        <span class="title text-center">
                                                            <small>หมู่บ้านพฤกษา</small>
                                                        </span>
                                                    </span>
                                                    </a>
                                                </li>
                                                <li class="customer type-design" data-quicksand-id="id-2" data-quicksand-tid="type-design">
                                                    <a href="#">
                                                    <span class="inner-wrapper">
                                                        <span class="img-wrapper">
                                                            <img src="data:image/jpeg;base64,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AowoAHQDAgHqAIAgEQCYBrXVOqcdm6r11IWz8RKTUn7rsdIOC95XMPYXXnqfuj80plq9Xp3L5qXS/PsOwuvPU/dH5oy1er07jNS6X59h2F156n7o/NGWr1encZqXS/PsOwuvPU/dH5oy1er07jNS6X59iOwuvPU/dH5oy1er07jNS6X59iewuvPU/dH5oy1er07jNS6X59h2F156n7o/NGWr1encZqXS/PsR2F156n7o/NGWr1encZqXS/PsOwuvPU/dH5oy1er07jNS6X59h2F156n7o/NGWr1encZqXS/PsOwuvPU/dH5oy1er07jNS6X59h2F156n7o/NGWr1encZqXS/PsOwuvPU/dH5oy1er07jNS6X59h2F156n7o/NGWr1encZqXS/PsOwuvPU/dH5oy1er07jNS6X59h2F156n7o/NGWr1encZqXS/PsOwuvPU/dH5oy1er07jNS6X59h2F156n7o/NGWr1encZqXS/PsOwuvPU/dH5oy1er07jNS6X59h2F156n7o/NGWr1encZqXS/PsOwuvPU/dH5oy1er07jNS6X59h2F156n7o/NGWr1encZqXS/PsbVslQD6xlY9VUj9TOkVJL2mcpuLfsqxmliogCARAEAguAQCRk8B1xx/ORdbE2e5DVVBCk7zwHWG1ewytq57kkCAY0rK2QCDjce498hSTJcWtzwLumTjWPjj28JXPG9rlvDla9jItZSxUEZHEcxLZlexVxaVxTqq2dJBwcHHIwmnsHFrc81rlE8pgJEpqO5MYSlsj32gyBkbxkDqJN0RZguAQM7zwHXHGLizJZgBknHeZLdiErgsAMnhxi4sYqN1Tc4Vwd2fSOolVOL2ZeVOUd0eXvaSnBcA5xjfx6SHUitLhU5NXSMtKqrjKnI4Zlk09iri1oyFrKWKAjI4jpGZXsMrtcntV1aMjOM454jMr2GV2uRTrK2dLA43HuMhST2JcWtzybhMFtQwDgnkDwjOrXGSV7WPZqLkDIyeA646e0SboizDVVBCkjJ4DrF1ewUW1c8VLhFOCwz03k/CQ5pbkqEnseqNVXGpSCOokqSauiJRcXZnuSQIAgCQQTJJKnbFt2tWioYqwWoyup3qwKe3jM1aGaUV8/0NVCpkhJ7rT9TXtrtnr0adVcVU1Bhjcw0t469x3e2UjNyqRUt0dJ01GnKUfddvvsXVYsB4oBPQma5XtoYo2vqe1zjfxkohnO19QTaGjOe036eOnsk1YxzxmYZXy1bc/0R6EbZqV+X6stKlOibf7OjRkEYwO8GaGoOn8DKnNVPjcrKoqJRt7kbqhSnSckb2FTSuT3gkH1TO8yhGpx0T+uhpjllUnT/t1a+mpeWtutNQqjvJ6k8SZshFRVkYpzcndldtSmab/SUAbChKlM4OUJGCOhGJwqpxlnX1RootSj4b05P4mDartrSvSz9VSFbSPtISdQx/LmUrN3U48Ff6HSgllcJcXb68PUdv2lxQrhvEJakg5HOklvXgeyM2apGfDYZctKUHvuzb20GcLQUElskgEDCgEg5/mCzpXvJZFx/wA+5yw9otzfD/PsZNm3HaUN/lLlGHRhy9mD65alPNDX5Fa0MlTTZ6lPsMajZ61C6aBKMCPrNygj45x/aZaGrhfTTT4mvE6KpZ3u9fhub+3aa/UHSu+5pZOBv+sWdsQl7P5l90cMNJ+1+V/ZlsiBdwAHPcMTSklsZW29yrtsfTK/9NPyWcI/jS+Rpn+BH5s9N++j/Tj/AHPH/P8AT9yP+v8A+v2MF1U+j12IG6smBgfxgRj2gsfVKzfh1PzfcvCPi0/y/Y9bWoCnZumBwye9i2WPtJitHLRaIoTzV0xtW27WpbrqKsEqMrqcFWHZ4MVoZ5RXwf6ChUyRm91dfqYre7Z69CnVGKqFtQxuYaG8de47vbKxm5VIxluv2ZedNRpylD3Xb7rQ2NikFq4bHaCqdWeOnA0+rH6y9Czcr73OeITSjba3+zZ2VXDoxCBQKjLgdQd5nSlLMtFbU51ouMkm76I3J1OIgCAJBAkkmN7dCwcjxhuB6Z4/kJVxTdyym0rLYlqKlg5A1DcG5gScqvcjM0rcDJJIIMA1rG17PWScs7l26cAAB6gJzpwy3b4nSpUzWS2SsPoFLOdA645Z6x4UeQ8WfMy17dKg0uoIyDg9RvBlpRUlZlYzlF3RkAliphqWlNm1suTw9PSUcIt3ZdVJJWTPX0dNRfSMkaSfw9JOVXuRndrHl7OmQoKDCnKj7p7pDpxdlbYlVJJt33PfYrq7THjY057uknKr3IzO2XgeEtaa6yFA172/EcY3+qFCKvbiS6kna72PP0ClpVNAAU5UD7J7pXwo2StsT4s7t33Mle3R9OtQdJDDPJhvBlpQUtysZyjsZZYqatSwpMxcoCxGC3MgcpzdKDd2joqs0rJ6GQWqaxU0jUF0hvw9JbJG+biRnlly30PdSkrY1AHB1DPI4Iz8TJaT3KqTWx5uKC1FKOuQeIPORKKkrMmM3B3iQbZCVYrvUYU9AcZ/IeyMiunyGeVmuZ6NFSwcqNQ4NzGZOVXuRmdrcDFXsaVQ6mUZxjVzxKypxk7tF41ZxVk9DJb0EprpRQB0HWTGKirIrKTk7sySxUQBAEggmSSIAgCAIAgCAIAgCAIAgCAIAgCAIAgCARAEAQBAEAQBAEAQBAEAmAIAgCAIAgCAIAgCAIAgCAIAgCAIAgEQBAEAQBAEAQBAEAQBAJgCAIAgCAIAgCAIAgCAIAgCAIAgCAIBEAQBAEAQBAEAQCYBEggmSSIAgCAIAgCAIAgCAIAgCAIAgCAIAgCARAEAQBAEAQBAEAQBIIEkkmAIAgCAIAgCAIAgCAIAgCAIAgCAIAgEQBAEAQBAEAQBAEASCCZJIgCAIAgCAIAgCAIAgCAIAgCAIAgCAIBEAQBAEAQCYBEAQCYB/9k="
                                                                 alt="Customer 2" class="img-responsive" />
                                                        </span>
                                                        <span class="title text-center">
                                                            <small>NUSA SIRI</small>
                                                        </span>
                                                    </span>
                                                    </a>
                                                </li>
                                                <li class="customer type-design" data-quicksand-id="id-1" data-quicksand-tid="type-design">
                                                    <a href="#">
                                                    <span class="inner-wrapper">
                                                        <span class="img-wrapper">
                                                            <img src="http://www.sansiri.com/singlehouse/habitia_bond/th/images/logo-sansiri.gif"
                                                                 alt="Customer 3" class="img-responsive" />
                                                        </span>
                                                        <span class="title text-center">
                                                            <small>โครงการแสนสิริ</small>
                                                        </span>
                                                    </span>
                                                    </a>
                                                </li>
                                                <li class="customer type-design" data-quicksand-id="id-2" data-quicksand-tid="type-design">
                                                    <a href="#">
                                                    <span class="inner-wrapper">
                                                        <span class="img-wrapper">
                                                            <img src="data:image/png;base64,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"
                                                                 alt="Customer 4" class="img-responsive" />
                                                        </span>
                                                        <span class="title text-center">
                                                            <small>ไลฟ์คอนโด</small>
                                                        </span>
                                                    </span>
                                                    </a>
                                                </li>
                                                <li class="customer type-design" data-quicksand-id="id-1" data-quicksand-tid="type-design">
                                                    <a href="#">
                                                    <span class="inner-wrapper">
                                                        <span class="img-wrapper">
                                                            <img src="http://upload.wikimedia.org/wikipedia/commons/1/17/Logo_pruksa-thai_cs2.png"
                                                                 alt="Customer 1" class="img-responsive" />
                                                        </span>
                                                        <span class="title text-center">
                                                            <small>หมู่บ้านพฤกษา</small>
                                                        </span>
                                                    </span>
                                                    </a>
                                                </li>
                                                <li class="customer type-design" data-quicksand-id="id-2" data-quicksand-tid="type-design">
                                                    <a href="#">
                                                    <span class="inner-wrapper">
                                                        <span class="img-wrapper">
                                                            <img src="data:image/jpeg;base64,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AowoAHQDAgHqAIAgEQCYBrXVOqcdm6r11IWz8RKTUn7rsdIOC95XMPYXXnqfuj80plq9Xp3L5qXS/PsOwuvPU/dH5oy1er07jNS6X59h2F156n7o/NGWr1encZqXS/PsOwuvPU/dH5oy1er07jNS6X59iOwuvPU/dH5oy1er07jNS6X59iewuvPU/dH5oy1er07jNS6X59h2F156n7o/NGWr1encZqXS/PsR2F156n7o/NGWr1encZqXS/PsOwuvPU/dH5oy1er07jNS6X59h2F156n7o/NGWr1encZqXS/PsOwuvPU/dH5oy1er07jNS6X59h2F156n7o/NGWr1encZqXS/PsOwuvPU/dH5oy1er07jNS6X59h2F156n7o/NGWr1encZqXS/PsOwuvPU/dH5oy1er07jNS6X59h2F156n7o/NGWr1encZqXS/PsOwuvPU/dH5oy1er07jNS6X59h2F156n7o/NGWr1encZqXS/PsOwuvPU/dH5oy1er07jNS6X59h2F156n7o/NGWr1encZqXS/PsOwuvPU/dH5oy1er07jNS6X59h2F156n7o/NGWr1encZqXS/PsbVslQD6xlY9VUj9TOkVJL2mcpuLfsqxmliogCARAEAguAQCRk8B1xx/ORdbE2e5DVVBCk7zwHWG1ewytq57kkCAY0rK2QCDjce498hSTJcWtzwLumTjWPjj28JXPG9rlvDla9jItZSxUEZHEcxLZlexVxaVxTqq2dJBwcHHIwmnsHFrc81rlE8pgJEpqO5MYSlsj32gyBkbxkDqJN0RZguAQM7zwHXHGLizJZgBknHeZLdiErgsAMnhxi4sYqN1Tc4Vwd2fSOolVOL2ZeVOUd0eXvaSnBcA5xjfx6SHUitLhU5NXSMtKqrjKnI4Zlk09iri1oyFrKWKAjI4jpGZXsMrtcntV1aMjOM454jMr2GV2uRTrK2dLA43HuMhST2JcWtzybhMFtQwDgnkDwjOrXGSV7WPZqLkDIyeA646e0SboizDVVBCkjJ4DrF1ewUW1c8VLhFOCwz03k/CQ5pbkqEnseqNVXGpSCOokqSauiJRcXZnuSQIAgCQQTJJKnbFt2tWioYqwWoyup3qwKe3jM1aGaUV8/0NVCpkhJ7rT9TXtrtnr0adVcVU1Bhjcw0t469x3e2UjNyqRUt0dJ01GnKUfddvvsXVYsB4oBPQma5XtoYo2vqe1zjfxkohnO19QTaGjOe036eOnsk1YxzxmYZXy1bc/0R6EbZqV+X6stKlOibf7OjRkEYwO8GaGoOn8DKnNVPjcrKoqJRt7kbqhSnSckb2FTSuT3gkH1TO8yhGpx0T+uhpjllUnT/t1a+mpeWtutNQqjvJ6k8SZshFRVkYpzcndldtSmab/SUAbChKlM4OUJGCOhGJwqpxlnX1RootSj4b05P4mDartrSvSz9VSFbSPtISdQx/LmUrN3U48Ff6HSgllcJcXb68PUdv2lxQrhvEJakg5HOklvXgeyM2apGfDYZctKUHvuzb20GcLQUElskgEDCgEg5/mCzpXvJZFx/wA+5yw9otzfD/PsZNm3HaUN/lLlGHRhy9mD65alPNDX5Fa0MlTTZ6lPsMajZ61C6aBKMCPrNygj45x/aZaGrhfTTT4mvE6KpZ3u9fhub+3aa/UHSu+5pZOBv+sWdsQl7P5l90cMNJ+1+V/ZlsiBdwAHPcMTSklsZW29yrtsfTK/9NPyWcI/jS+Rpn+BH5s9N++j/Tj/AHPH/P8AT9yP+v8A+v2MF1U+j12IG6smBgfxgRj2gsfVKzfh1PzfcvCPi0/y/Y9bWoCnZumBwye9i2WPtJitHLRaIoTzV0xtW27WpbrqKsEqMrqcFWHZ4MVoZ5RXwf6ChUyRm91dfqYre7Z69CnVGKqFtQxuYaG8de47vbKxm5VIxluv2ZedNRpylD3Xb7rQ2NikFq4bHaCqdWeOnA0+rH6y9Czcr73OeITSjba3+zZ2VXDoxCBQKjLgdQd5nSlLMtFbU51ouMkm76I3J1OIgCAJBAkkmN7dCwcjxhuB6Z4/kJVxTdyym0rLYlqKlg5A1DcG5gScqvcjM0rcDJJIIMA1rG17PWScs7l26cAAB6gJzpwy3b4nSpUzWS2SsPoFLOdA645Z6x4UeQ8WfMy17dKg0uoIyDg9RvBlpRUlZlYzlF3RkAliphqWlNm1suTw9PSUcIt3ZdVJJWTPX0dNRfSMkaSfw9JOVXuRndrHl7OmQoKDCnKj7p7pDpxdlbYlVJJt33PfYrq7THjY057uknKr3IzO2XgeEtaa6yFA172/EcY3+qFCKvbiS6kna72PP0ClpVNAAU5UD7J7pXwo2StsT4s7t33Mle3R9OtQdJDDPJhvBlpQUtysZyjsZZYqatSwpMxcoCxGC3MgcpzdKDd2joqs0rJ6GQWqaxU0jUF0hvw9JbJG+biRnlly30PdSkrY1AHB1DPI4Iz8TJaT3KqTWx5uKC1FKOuQeIPORKKkrMmM3B3iQbZCVYrvUYU9AcZ/IeyMiunyGeVmuZ6NFSwcqNQ4NzGZOVXuRmdrcDFXsaVQ6mUZxjVzxKypxk7tF41ZxVk9DJb0EprpRQB0HWTGKirIrKTk7sySxUQBAEggmSSIAgCAIAgCAIAgCAIAgCAIAgCAIAgCARAEAQBAEAQBAEAQBAEAmAIAgCAIAgCAIAgCAIAgCAIAgCAIAgEQBAEAQBAEAQBAEAQBAJgCAIAgCAIAgCAIAgCAIAgCAIAgCAIBEAQBAEAQBAEAQCYBEggmSSIAgCAIAgCAIAgCAIAgCAIAgCAIAgCARAEAQBAEAQBAEAQBIIEkkmAIAgCAIAgCAIAgCAIAgCAIAgCAIAgEQBAEAQBAEAQBAEASCCZJIgCAIAgCAIAgCAIAgCAIAgCAIAgCAIBEAQBAEAQCYBEAQCYB/9k="
                                                                 alt="Customer 2" class="img-responsive" />
                                                        </span>
                                                        <span class="title text-center">
                                                            <small>NUSA SIRI</small>
                                                        </span>
                                                    </span>
                                                    </a>
                                                </li>
                                                <li class="customer type-design" data-quicksand-id="id-1" data-quicksand-tid="type-design">
                                                    <a href="#">
                                                    <span class="inner-wrapper">
                                                        <span class="img-wrapper">
                                                            <img src="http://www.sansiri.com/singlehouse/habitia_bond/th/images/logo-sansiri.gif"
                                                                 alt="Customer 3" class="img-responsive" />
                                                        </span>
                                                        <span class="title text-center">
                                                            <small>โครงการแสนสิริ</small>
                                                        </span>
                                                    </span>
                                                    </a>
                                                </li>
                                                <li class="customer type-design" data-quicksand-id="id-2" data-quicksand-tid="type-design">
                                                    <a href="#">
                                                    <span class="inner-wrapper">
                                                        <span class="img-wrapper">
                                                            <img src="data:image/png;base64,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"
                                                                 alt="Customer 4" class="img-responsive" />
                                                        </span>
                                                        <span class="title text-center">
                                                            <small>ไลฟ์คอนโด</small>
                                                        </span>
                                                    </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--####Google Map--}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                {{--####Map--}}
                                {!! $map['html'] !!}
                            </div>
                        </div>
                    </div>
                </div><br>
                {{--####ค้นหาโครงการ--}}
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control"
                                   placeholder="ค้นหาประกาศหมวดหมู่ทาวน์โฮม">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">ค้นหา</button>
                    </span>
                        </div>
                    </div>
                </div><br>

                {{--####รายการประกาศหมวดหมู่บ้าน--}}
                <div class="row">
                    <div class="pricing-stack">
                        {{--####VIP Post--}}
                        @foreach($catHomeVip as $item)
                            <div class="well active">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="blog-media" style="padding-top: 30px;">
                                            <a href="{{ URL::route("townhome_view", ["id" => $item->id]) }}">
                                                <?php
                                                $pic = $item->picture()->get();
                                                if($pic != null && count($pic) > 0)
                                                {
                                                    echo '
                                                    <img src="'.$pic[0]->file_path.'"
                                                 alt="'.$pic[0]->file_name.'" class="img-responsive" />';
                                                }
                                                ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="block block-callout post-block" style="margin-top: 0px;">
                                                <div clas="row" style="padding: 0px 10px 0px 10px;">
                                                    <div class="post-author">
                                                        <h4>
                                                            <a href="{{ URL::route("townhome_view", ["id" => $item->id]) }}">เรื่อง : {{ $item->title }}</a>
                                                        </h4>
                                                        <ul class="list-inline">
                                                            <li>
                                                                <i class="fa fa-calendar"></i> &nbsp; {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-comments"></i> &nbsp; {{ $item->num_comment }} Comments
                                                            </li>
                                                            @if($item->num_comment = 0)
                                                                <li>
                                                                    <i class="fa fa-star"></i> No rating
                                                                </li>
                                                            @endif
                                                        </ul>
                                                        @if($item->num_comment > 0)
                                                            <ul class="list-inline">
                                                                <li>
                                                                    <span class="label label-default">Rating</span>
                                                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                                                </li>
                                                                <li>
                                                                    <span class="label label-default">Score</span>
                                                                    {{ $item->avg_rating }} / 5
                                                                </li>
                                                                <li>
                                                                    <span class="label label-default">Rating by</span>
                                                                    {{ $item->num_rating }} users
                                                                </li>
                                                            </ul>
                                                        @endif
                                                        <div class="row">
                                                            <p style="text-indent: 30px;">{{ $item->subtitle }}</p>
                                                            <ul class="list-inline links" style="text-align: right">
                                                                <li>
                                                                    <a href="{{ URL::route("townhome_view", ["id" => $item->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                                                                </li>
                                                                {{--<li>--}}
                                                                {{--<a href="{{ URL::route("townhome_view", ["id" => $item->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-comments"></i> 76 Comments</a>--}}
                                                                {{--</li>--}}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="well active">
                                            <h3 class="title">
                                                <span class="em">ราคา</span> เริ่มต้น
                                            </h3>
                                            <p class="price">
                                                <span class="digits">{{ $item->sell_price }}</span>
                                                <span class="term"> บาท</span>
                                            </p>
                                            <div style="text-align: center;">
                                                <address>
                                                    <strong>ติดต่อ:</strong> {{ $item->project_owner }}<br>
                                                    <strong>เบอร์โทรศัพท์:</strong> {{ $item->telephone }}
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                                    <!-- Post ทั่วไป -->
                            @foreach($catHome as $item)
                                <div class="well">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="blog-media" style="padding-top: 30px;">
                                                <a href="{{ URL::route("townhome_view", ["id" => $item->id]) }}">
                                                    <?php
                                                    $pic = $item->picture()->get();
                                                    if($pic != null && count($pic) > 0)
                                                    {
                                                        echo '
                                                <img src="'.$pic[0]->file_path.'"
                                             alt="'.$pic[0]->file_name.'" class="img-responsive" />';
                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="block block-callout post-block" style="margin-top: 0px;">
                                                    <div clas="row" style="padding: 0px 10px 0px 10px;">
                                                        <div class="post-author">
                                                            <h4>
                                                                <a href="{{ URL::route("townhome_view", ["id" => $item->id]) }}">เรื่อง : {{ $item->title }}</a>
                                                            </h4>
                                                            <ul class="list-inline">
                                                                <li>
                                                                    <i class="fa fa-calendar"></i> &nbsp; {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-comments"></i> &nbsp; {{ $item->num_comment }} Comments
                                                                </li>
                                                                @if($item->num_comment = 0)
                                                                    <li>
                                                                        <i class="fa fa-star"></i> No rating
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                            @if($item->num_comment > 0)
                                                                <ul class="list-inline">
                                                                    <li>
                                                                        <span class="label label-default">Rating</span>
                                                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                                                    </li>
                                                                    <li>
                                                                        <span class="label label-default">Score</span>
                                                                        {{ $item->avg_rating }} / 5
                                                                    </li>
                                                                    <li>
                                                                        <span class="label label-default">Rating by</span>
                                                                        {{ $item->num_rating }} users
                                                                    </li>
                                                                </ul>
                                                            @endif
                                                            <div class="row">
                                                                <p style="text-indent: 30px;">{{ $item->subtitle }}</p>
                                                                <ul class="list-inline links" style="text-align: right">
                                                                    <li>
                                                                        <a href="{{ URL::route("townhome_view", ["id" => $item->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                                                                    </li>
                                                                    {{--<li>--}}
                                                                    {{--<a href="{{ URL::route("townhome_view", ["id" => $item->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-comments"></i> 76 Comments</a>--}}
                                                                    {{--</li>--}}
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="well">
                                                <h3 class="title">
                                                    <span class="em">ราคา</span> เริ่มต้น
                                                </h3>
                                                <p class="price">
                                                    <span class="digits">{{ $item->sell_price }}</span>
                                                    <span class="term"> บาท</span>
                                                </p>
                                                <div style="text-align: center;">
                                                    <address>
                                                        <strong>ติดต่อ:</strong> {{ $item->project_owner }}<br>
                                                        <strong>เบอร์โทรศัพท์:</strong> {{ $item->telephone }}
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @if(($catHomeVip == null || count($catHomeVip) == 0) &&
                                ($catHome == null || count($catHome) == 0))
                                <div class="well">
                                    <div class="divTable">
                                        <div class="divTableCell">
                                            <div class="titleTableCell">ไม่มีข้อมูล</div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {!! str_replace('/?', '?', $catHome->render()) !!}

                    </div>
                </div>
            </div>
        </div>

    </div>




@stop