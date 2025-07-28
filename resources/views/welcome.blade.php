@extends('layouts.app-frontend')
@section('titile', ' Home')
@section('content')
    <div class="row">
        @if (count($iqa) > 0)
            @foreach ($iqa as $data)
                <div class="col-xl-6">
                    <div class="card mb-3" style="width: 100%">
                        <div class="row no-gutters">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h1>{{ $data->question }} ?</h1>
                                    <p class="card-text mb-6">{{ Str::limit($data->answer, 100) }}
                                        <a href="{{ route('guast.notes', $data->uuid) }}" class="btn-sm  btn-outline-info">Read
                                            more</a>
                                    </p>
                                </div>
                            </div>
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
