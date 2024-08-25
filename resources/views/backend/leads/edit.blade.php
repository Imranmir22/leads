@extends('layouts.app')
@section('title') {{ config('app.name', 'Laravel') }} | {{ __('Customers') }} @endsection
@section('heading') {{ __('Customers') }} @endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('admin.leads.update', $lead->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title p-2">{{ __('Edit') }} - &quot;{{ $lead->name }}&quot;</h3>
                        <a
                            href="{{ route('admin.leads.index') }}"
                            class="btn btn-default float-right">
                            <i class="material-icons">reply_all</i>&nbsp;
                            {{ __('Back to list') }}
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group input-group-sm ">
                                            <div class="form-group h-50">
                                                <label class="mb-0"
                                                    for="lead_message">Lead Message</label>
                                                <textarea name="lead_message" class="quill-textarea col-md-12" >{!! old('lead_message')!!}</textarea>
                                        </div>
                                        </div>
                                        @include('includes.invalid', [
                                            'field' => 'lead_message',
                                        ])
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card -->
                    <div class="card-footer">
                        <button type="submit"
                                class="btn bg-gradient-primary">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection
