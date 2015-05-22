<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-11">
        <div class="focus-box pull-right text-right"
             style="max-height:180px; max-width: 180px;">
            <img src="{{ \App\Models\Attachment::find($project->attachment_id)->path }}"
                 alt="Project Company Owner"
                 style="max-height:150px; max-width: 150px;">
        </div>
        <strong>รายละเอียดโครงการ:</strong>
        <div style="padding-left: 20px;">
            <ul class="list-inline" style="padding-top: 10px;">
                <li>ชื่อโครงการ:</li>
                <li>{{ $project->project_name }}</li>
            </ul>
            <ul class="list-inline">
                <li>บริษัทเจ้าของโครงการ:</li>
                <li>{{ $project->project_company_owner }}</li>
            </ul>
            <ul class="list-inline">
                <li>ที่ตั้งโครงการ:</li>
                <li>{{ $project->getFullPrjAddress($project->id) }}</li>
            </ul>
            <ul class="list-inline">
                <li>ทำเล/ย่าน:</li>
                <li>{{ ($project->subarea_id == null)? "-" :
                \App\Models\SubArea::find($project->subarea_id)->subarea_name  }}</li>
            </ul>
            <ul class="list-inline">
                <li>เว็บไซต์โครงการ:</li>
                <li>{{ $project->website }}</li>
            </ul>
            <ul class="list-inline">
                <li>Facebook:</li>
                <li>{{ $project->facebook }}</li>
            </ul>
        </div>
        <ul class="list-inline" style="padding-top: 30px;">
            <li><strong>สิ่งอำนวยความสะดวก:</strong></li>
        </ul>
        <div class="row" style="padding-left: 30px;  padding-bottom: 10px;">
            @foreach($facility as $fac)
                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp;
                    {{ \App\Models\Facility::getFacilityName($fac->facility_id) }} </div>
            @endforeach
        </div>
        <div class="row" style="padding-left: 30px;">
            <em>อื่นๆ: </em> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $project->facility_str }}
        </div>
        <ul class="list-inline" style="padding-top: 30px;">
            <li><strong>สถานที่ใกล้เคียง:</strong></li>
        </ul>
        <div class="row" style="padding-left: 30px;">
            <em>สถานี BTS</em>
        </div>
        <div class="row" style="padding-left: 30px; padding-bottom: 10px;">
            @foreach($bts as $item)
                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp;
                    {{ \App\Models\Bts::getBtsName($item->bts_id) }} </div>
            @endforeach
        </div>
        <div class="row" style="padding-left: 30px;">
            <em>สถานี MRT</em>
        </div>
        <div class="row" style="padding-left: 30px; padding-bottom: 10px;">
            @foreach($mrt as $item)
                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp;
                    {{ \App\Models\Mrt::getMrtName($item->mrt_id) }} </div>
            @endforeach
        </div>
        <div class="row" style="padding-left: 30px;">
            <em>Airport Rail Link</em>
        </div>
        <div class="row" style="padding-left: 30px; padding-bottom: 10px;">
            @foreach($apl as $item)
                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp;
                    {{ \App\Models\AirportRailLink::getAplinkName($item->apl_id) }} </div>
            @endforeach
        </div>
        <div class="row" style="padding-left: 30px;">
            <em>อื่นๆ: </em> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $project->nearby_str }}
        </div>
        <ul class="list-inline" style="padding-top: 30px;">
            <li>Latitude:</li>
            <li>{{ $project->lat }}</li>
            <li>Longitude:</li>
            <li>{{ $project->long }}</li>
        </ul>
        <ul class="list-inline">
            <li>ลิงค์แผนที่:</li>
            <li><a href="{{ $project->map_url }}" target="_blank">{{ $project->map_url }}</a></li>
        </ul>
    </div>
</div>