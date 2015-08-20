@if(isset($pagination) && $pagination != null)
    @foreach($pagination as $item)
        {{ $item->title }}
        <br>
    @endforeach
    {!! $pagination->render() !!}
@endif