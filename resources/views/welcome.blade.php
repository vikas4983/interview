@extends('layouts.app-frontend')
@section('titile', ' Home')
@section('content')
    @include('alerts.alert')
    <div class="row">
        @if (count($iqa) > 0)
            @foreach ($iqa as $data)
                <div class="col-xl-6">
                    <div class="card mb-3">
                        <div class="col-md-12">
                            <div class="card-body">
                                @php
                                    $id = $data->uuid;

                                @endphp
                                <h1>{{ $data->question }} {{ $data->id }}</h1>
                                <p class="card-text mb-6">{{ Str::limit($data->answer, 100) }}
                                    <a href="{{ route('guast.notes', $id) }}" class="btn-sm  btn-outline-info">Read
                                        more</a>
                                </p>
                            </div>
                        </div>
                        <div>
                            @php
                                $userAction = $data->likes->where('ip', request()->ip());

                            @endphp
                            @if ($userAction->isEmpty())
                                <span> {{ $data->like != 0 ? $data->like : '' }} <a href="{{ route('like', $data->uuid) }}">
                                        <i class="mdi mdi-thumb-up mr-5" title="Like" style="color: green"></i></a></span>
                                <span>{{ $data->dislike != 0 ? $data->dislike : '' }} <a href="{{ route('dislike', $data->uuid) }}"><i class="mdi mdi-thumb-down mr-5"
                                            title="Dislike" style="color: rgb(225, 11, 11)"></i></a></span>
                            @elseif($userAction->where('action', 'like')->where('question_answer_id', $data->id)->isNotEmpty())
                                <span> {{ $data->like != 0 ? $data->like : '' }} <a
                                        href="{{ route('like', $data->uuid) }}"><i class="mdi mdi-thumb-up mr-5"
                                            title="Like" style="color: green"></i></a></span>
                            @elseif($userAction->where('action', 'dislike')->where('question_answer_id', $data->id)->isNotEmpty())
                                <span>{{ $data->dislike != 0 ? $data->dislike : '' }} <a
                                        href="{{ route('like', $data->uuid) }}"><i class="mdi mdi-thumb-down mr-5"
                                            title="Like" style="color: rgb(245, 5, 5)"></i></a></span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach


            <div class="flex justify-center mt-4">
                {{ $iqa->links() }}
            </div>
        @else
            <div class="d-flex justify-content-center">
                <h1 style="color:red">No record found</h1>
            </div>

        @endif

    </div>

@endsection
