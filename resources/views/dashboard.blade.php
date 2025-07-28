@extends('layouts.app-admin')
@section('title', 'Admin Dashboard')
@section('content')
    <a href="{{ route('iqa.create') }}" class="btn btn-primary mb-5">Add New</a>
    <div class="row">
        @foreach ($addCources as $name => $cource)
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('notes', $name) }}">
                    <div class="card card-default bg-secondary">
                        <div class="d-flex p-5 justify-content-between">
                            <div class="icon-md bg-white rounded-circle mr-3">
                                @if ($name == 'laravel')
                                    <i class="mdi mdi-laravel text-secondary"></i>
                                @elseif($name == 'html')
                                    <i class="mdi mdi-language-html5 text-secondary"></i>
                                @elseif($name == 'react Js')
                                    <i class="mdi mdi-react text-secondary"></i>
                                @elseif($name == 'css')
                                    <i class="mdi mdi-language-css3 text-secondary"></i>
                                @elseif($name == 'php')
                                    <i class="mdi mdi-language-php text-secondary"></i>
                                @elseif($name == 'java')
                                    <i class="mdi mdi-language-java text-secondary"></i>
                                @elseif($name == 'java Script')
                                    <i class="mdi mdi-language-javascript text-secondary"></i>
                                @endif
                            </div>
                            <div class="text-right">
                                <span class="h2 d-block text-white">{{ ucfirst($name) }}</span>
                                <p class="text-white">{{ count($cource) }}</p>
                            </div>

                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection










































































{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout> --}}
