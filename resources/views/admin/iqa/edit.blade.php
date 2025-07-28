@extends('layouts.app-admin')
@section('titile', ' Create IQA')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-primary">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('iqa.index') }}">IQA</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Edit</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    @include('alerts.alert')
                    <div class="text-center mb-5">
                        <h3><u>Edit Question with Answer</u></h3>
                    </div>
                    <form action="{{ route('iqa.update', $data->uuid) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="language" class="font-weight-medium">Language Name</label>
                                <input type="text" class="form-control @error('language') is-invalid @enderror"
                                    id="language" style="width: 100%; height: 50px;" name="language"
                                    placeholder="Enter  Language Name" value="{{ old('language', $data->language ?? '') }}"
                                    required>

                                @error('language')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="subject" class="font-weight-medium">Subject</label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                    id="subject" style="width: 100%; height: 50px;" name="subject"
                                    placeholder="Enter  Subject" value="{{ old('subject', $data->subject ?? '') }}"
                                    required>

                                @error('subject')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="heading" class="font-weight-medium">Heading</label>
                                <input type="text" class="form-control @error('heading') is-invalid @enderror"
                                    id="heading" style="width: 100%; height: 50px;" name="heading"
                                    placeholder="Enter  Heading" value="{{ old('heading', $data->heading) }}" required>

                                @error('heading')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="code_block" class="font-weight-medium">Status</label>
                                <div class="row">
                                    <div class="row col-lg-12" style="margin-left: 7%;
    margin-top: 1rem;">
                                        <input class="form-check-input " type="radio" name="status" id="status"
                                            value="1">
                                        <label class="form-check-label " for="status">
                                            Active
                                        </label>
                                    </div>
                                    <div class="row  col-lg-12" style="    margin-left: 50%;
    margin-top: -1.3rem;">
                                        <input class="form-check-input" type="radio" name="status" id="status"
                                            value="0" checked>
                                        <label class="form-check-label " for="status">
                                            Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="question" class="font-weight-medium">Question</label>
                                <textarea class="form-control @error('question') is-invalid @enderror" id="question" style="width: 100%; height: 50px;"
                                    name="question" placeholder="Enter  Question" required> {{ old('question', $data->question ?? '') }}</textarea>
                                @error('question')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="quote" class="font-weight-medium">Quote</label>
                                <textarea class="form-control @error('quote') is-invalid @enderror" id="quote" style="width: 100%; height: 50px;"
                                    name="quote" placeholder="Enter Quote" required> {{ old('quote', $data->quote ?? '') }}</textarea>
                                @error('quote')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="answer" class="font-weight-medium">Answer</label>
                                <textarea class="form-control @error('answer') is-invalid @enderror" id="answer" style="width: 100%; height: 90px;"
                                    name="answer" placeholder="Enter  Answer" required> {{ old('answer', $data->answer ?? '') }} </textarea>
                                @error('answer')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <div class="form-group col-lg-12">
                                <label for="code_block" class="font-weight-medium">Code Block</label>
                                <textarea class="form-control @error('code_block') is-invalid @enderror" id="code_block"
                                    style="width: 100%; height: 90px;" name="code_block" placeholder="Enter Code" required>  {{ old('code_block', $data->code_block) }}</textarea>
                                @error('code_block')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" title="" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
