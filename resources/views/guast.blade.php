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
                            <h1>{{ $item->question }}</h1>
                            <p class="card-text mb-6">{{ $item->answer }}</p>
                        </div>
                    </div>
                </div>
                <div>

                    @if (isset($item) && isset($item->likes) && $item->likes->count() > 0)
                        @foreach ($item->likes as $like)
                            @if ($like->ip == request()->ip() && $like->action == 'like')
                                <span>{{ $item->like ? $item->like : '' }} <a href="{{ route('like', $item->uuid) }}"><i
                                            class="mdi mdi-thumb-up mr-5" title="Cancel like"
                                            style="color: green"></i></a></span>
                            @elseif ($like->action == 'dislike' && $like->ip == request()->ip())
                                <span>{{ $item->dislike ? $item->dislike : '' }} <a
                                        href="{{ route('dislike', $item->uuid) }}"><i class="mdi mdi-thumb-down mr-5"
                                            title="Cancel dislike" style="color: rgb(255, 0, 0)"></i></a></span>
                            @elseif(!$item->likes->contains('ip', request()->ip()))
                                <span>{{ $item->like ? $item->like : '' }} <a href="{{ route('like', $item->uuid) }}"><i
                                            class="mdi mdi-thumb-up mr-5" title="Like"
                                            style="color: green"></i></a></span>
                                <span>{{ $like->dislike ? $item->dislike : '' }} <a
                                        href="{{ route('dislike', $item->uuid) }}"><i class="mdi mdi-thumb-down mr-5"
                                            title="Dislike" style="color: rgb(225, 11, 11)"></i></a></span>
                            @endif
                        @endforeach
                    @else
                     <span>{{ $item->like ? '0' : '' }} <a href="{{ route('like', $item->uuid) }}"><i
                                            class="mdi mdi-thumb-up mr-5" title="Like"
                                            style="color: green"></i></a></span>
                                <span>{{ $item->dislike ? '0' : '' }} <a href="{{ route('dislike', $item->uuid) }}"><i
                                            class="mdi mdi-thumb-down mr-5" title="Dislike"
                                            style="color: rgb(225, 11, 11)"></i></a></span>
                    @endif
                   
                </div>
            </div>

        </div>
    @endforeach
    <div class="flex justify-center mt-4">
        {{ $data->links() }}
    </div>
@endsection
