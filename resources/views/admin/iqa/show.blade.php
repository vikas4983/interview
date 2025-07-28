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
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-3" style="width: 100%">
                    <div class="row no-gutters">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h1>{{ $data->question }} ? </h1>
                                <p class="card-text mb-6">{{ $data->answer }}</p>

                                <div class="text-center">
                                    <div class="btn-group mr-3 mb-4" role="group" aria-label="Basic example">
                                        <a class="btn btn-outline-primary"
                                            href="{{ route('iqa.edit', $data->uuid) }}">Edit</a>
                                        <a class="btn btn-outline-primary"
                                            onclick=" return confirm('Are you sure you want to delete this item ?')"
                                            href="{{ route('iqa.destroy', $data->uuid) }}">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
