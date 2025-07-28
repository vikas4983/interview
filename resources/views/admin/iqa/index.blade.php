@extends('layouts.app-admin')
@section('titile', ' Create IQA')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-primary">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> IQA</li>
        </ol>
    </nav>
    <a href="{{ route('iqa.create') }}" class="btn btn-info mb-3">Add New</a>
    <br>
    @include('alerts.alert')
    <div class="row">
        @if (count($iqa) > 0)
            @foreach ($iqa as $data)
                <div class="col-xl-6">
                    <div class="card mb-3" style="width: 100%">
                        <div class="row no-gutters">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h1>{{ $data->question }} ?</h1>
                                    <p class="card-text mb-6">{{ Str::limit($data->answer, 300) }}
                                        <a href="{{ route('iqa.show', $data->uuid) }}" class="btn-sm  btn-outline-info">Read
                                            more</a>
                                    </p>

                                    <div class="text-center">
                                        <div class="btn-group mr-3 mb-4" role="group" aria-label="Basic example">
                                            <a class="btn btn-outline-primary"
                                                href="{{ route('iqa.show', $data->uuid) }}">Show</a>
                                            <a class="btn btn-outline-primary"
                                                href="{{ route('iqa.edit', $data->uuid) }}">Edit</a>
                                            <form action="{{ route('iqa.destroy', $data->uuid) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure want to delete')"
                                                    class="btn btn-outline-primary">Delete</button>
                                            </form>

                                        </div>
                                    </div>
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
