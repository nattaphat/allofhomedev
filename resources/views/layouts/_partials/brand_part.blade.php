<?php
    $temp_brand_part = \DB::table('cat_construct')
        ->select('brand_id')
        ->distinct()
        ->where('status', '=', '1')
        ->get();

    $brand_part = null;
    if($temp_brand_part != null && count($temp_brand_part) > 0)
    {
        $brand_id = null;
        foreach($temp_brand_part as $item)
        {
            $brand_id[] = $item->brand_id;
        }

        $brand_part = \App\Models\Brand::whereIn('id', $brand_id)
                ->orderByRaw('random()')->take(12)->get();
    }
?>

@if($brand_part != null && count($brand_part) > 0)
    <div class="boxShowBrand">
        <h2>แสดงร้านค้าตามแบรนด์</h2>
        <ul>
            @foreach($brand_part as $item)
                <li><a href="{{ url('shop_list')."/".$item->id }}" target="_blank">
                    <img src="{{ \App\Models\Brand::getPathLogo($item->id) }}" alt=""
                            style="max-width: 110px; max-height: 80px;"/>
                </a></li>
            @endforeach
        </ul>
        <div class="clear"></div>
    </div>
@endif