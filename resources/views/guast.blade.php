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
                    @php
                        $userAction = $item->likes->where('ip', request()->ip());

                    @endphp
                    @if ($userAction->isEmpty())
                        <span>{{ $item->like != 0 ? $item->like : '' }}
                             <a href="{{ route('like', $item->uuid) }}"><i class="mdi mdi-thumb-up mr-5" title="Like"
                                    style="color: green"></i></a></span>
                        <span>{{ $item->dislike != 0 ? $item->dislike : '' }} 
                            <a href="{{ route('dislike', $item->uuid) }}"><i class="mdi mdi-thumb-down mr-5" title="Dislike"
                                    style="color: rgb(225, 11, 11)"></i></a></span>
                    @elseif($userAction->where('action', 'like')->where('question_answer_id', $item->id)->isNotEmpty())
                        <span>{{ $item->like != 0 ? $item->like : '' }} <a href="{{ route('like', $item->uuid) }}"><i
                                    class="mdi mdi-thumb-up mr-5" title="Like" style="color: green"></i></a></span>
                    @elseif($userAction->where('action', 'dislike')->where('question_answer_id', $item->id)->isNotEmpty())
                        <span> {{ $item->dislike != 0 ? $item->dislike : '' }} <a href="{{ route('like', $item->uuid) }}"><i
                                    class="mdi mdi-thumb-down mr-5" title="Like"
                                    style="color: rgb(245, 5, 5)"></i></a></span>
                    @endif

                </div>
            </div>

        </div>
    @endforeach
    <div class="flex justify-center mt-4">
        {{ $data->links() }}
    </div>
@endsection
