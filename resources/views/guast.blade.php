@extends('layouts.app-frontend')
@section('title', 'Gaust Notes')
@section('content')
@include('alerts.alert')
    @foreach ($data as $item)
        <div class="col-xl-12">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-lg-12">
                        <div class="card-body">
                            <h1>{{ $item->question }} ? </h1>
                            <p class="card-text mb-6">{{ $item->answer }}</p>
                        </div>
                    </div>
                </div>
                <div>
                    @if (!empty($item) && $item->ip == request()->ip() && $item->action == 'like')
                        <span>1 <a href="{{ route('like', $item->uuid) }}"><i class="mdi mdi-thumb-up mr-5"
                                    style="color: green" title="You liked"></i></a></span>
                    @elseif(!empty($item) && $item->ip == request()->ip() && $item->action == 'dislike')
                        <span>2 <a href="{{ route('dislike', $item->uuid) }}"><i class="mdi mdi-thumb-down"
                                    style="color: red"></i></a> </span>
                    @else
                        <span>1 <a href="{{ route('like', $item->uuid) }}"><i class="mdi mdi-thumb-up mr-5"
                                    style="color: green"></i></a></span>
                        <span>2 <a href="{{ route('dislike', $item->uuid) }}"><i class="mdi mdi-thumb-down"
                                    style="color: red"></i></a> </span>
                    @endif
                </div>
            </div>

        </div>
    @endforeach
    <div class="flex justify-center mt-4">
        {{ $data->links() }}
    </div>
@endsection
