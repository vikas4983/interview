@extends('layouts.app-admin')
@section('titile', ' Create IQA')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-primary">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('iqa.index') }}">IQA</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Show</li>
        </ol>
    </nav>
    <a href="{{ route('iqa.create') }}" class="btn btn-info mb-3">Add New</a>
    @include('alerts.alert')
    <div class="row">
        @foreach ($data as $item)
            <div class="col-xl-12">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-lg-12">
                            <div class="card-body">
                                <h1>{{ $item->question }} ? </h1>
                                <p class="card-text mb-6">{{ $item->answer }}</p>
                                <div class="text-center">
                                    <div class="btn-group mr-3 mb-4" role="group" aria-label="Basic example">
                                        <a class="btn btn-outline-primary"
                                            href="{{ route('iqa.edit', $item->uuid) }}">Edit</a>
                                        <a class="btn btn-outline-primary"
                                            onclick=" return confirm('Are you sure you want to delete this item ?')"
                                            href="{{ route('delete', $item->uuid) }}">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
    <div class="flex justify-center mt-4">
    {{ $data->links() }}
</div>
@endsection
