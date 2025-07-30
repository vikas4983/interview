<div>
   @props(['data'])
    @if (!empty($data) && $data->ip == request()->ip() && $data->action == 'like')
        <span>1 <a href="{{ route('like', $data->uuid) }}"><i class="mdi mdi-thumb-up mr-5" style="color: green"
                    title="You liked"></i></a></span>
    @elseif(!empty($data) && $data->ip == request()->ip() && $data->action == 'dislike')
        <span>2 <a href="{{ route('dislike', $data->uuid) }}"><i class="mdi mdi-thumb-down" style="color: red"></i></a> </span>
    @else
    
        <span>1 <a href="{{ route('like', $data->uuid) }}"><i class="mdi mdi-thumb-up mr-5" style="color: green"></i></a></span> 
        <span>2 <a href="{{ route('dislike', $data->uuid) }}"><i class="mdi mdi-thumb-down" style="color: red"></i></a> </span>
    @endif
</div>
