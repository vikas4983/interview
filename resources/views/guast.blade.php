@extends('layouts.app-frontend')
@section('title', 'Gaust Notes')
@section('content')
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
            </div>
        </div>
    @endforeach
    <div class="flex justify-center mt-4">
        {{ $data->links() }}
    </div>
@endsection
