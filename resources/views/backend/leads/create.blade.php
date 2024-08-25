@extends('layouts.app')
@section('title')
    {{ config('app.name', 'Laravel') }} | {{ __('Leads') }}
@endsection
@section('heading')
    {{ __('Leads') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('admin.leads.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title p-2">{{ __('Create') }}</h3>
                        <a href="{{ route('admin.leads.index') }}" class="btn btn-default float-right">
                            Back to list
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <!-- Customer Information -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            {{ __('Lead Information') }}
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-12 col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group input-group-sm ">
                                                            <label class="mb-0 font-weight-normal"
                                                                for="name">{{ __('Name') }}</label>
                                                            <input type="text" id="name" name="name"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                placeholder="{{ __('Name') }}"
                                                                value="{{ old('name') }}" maxlength="191">
                                                            @include('includes.invalid', [
                                                                'field' => 'name',
                                                            ])
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group input-group-sm ">
                                                            <label class="mb-0 font-weight-normal"
                                                                for="phone">{{ __('Phone') }}</label>
                                                            <input type="number" id="phone" name="phone"
                                                                class="form-control @error('phone') is-invalid @enderror"
                                                                placeholder="{{ __('Please enter phone number') }}"
                                                                value="{{ old('phone') }}" maxlength="191">
                                                            @include('includes.invalid', [
                                                                'field' => 'phone',
                                                            ])
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group input-group-sm ">
                                                            <label class="mb-0 font-weight-normal"
                                                                for="email">{{ __('Email') }}</label>
                                                            <input type="text" id="email" name="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                placeholder="{{ __('Please enter email ') }}"
                                                                value="{{ old('email') }}" maxlength="191">
                                                            @include('includes.invalid', [
                                                                'field' => 'email',
                                                            ])
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group input-group-sm ">
                                                            <label class="mb-0 font-weight-normal"
                                                                for="source">{{ __('source') }}</label>
                                                            <input type="text" id="source" name="source"
                                                                class="form-control @error('source') is-invalid @enderror"
                                                                placeholder="{{ __('Please enter source') }}"
                                                                value="{{ old('source') }}" maxlength="191">
                                                            @include('includes.invalid', [
                                                                'field' => 'source',
                                                            ])
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group input-group-sm ">
                                                            <label class="mb-0 font-weight-normal"
                                                            for="role">{{__('Status')}}</label>
                                                            <select
                                                                id  ="status"
                                                                name="status"
                                                                class="form-control @error('status') is-invalid @enderror">
                                                                <option value="">Select status</option>
                                                                @foreach($statuses as $key => $status)
                                                                    <option value="{{ $status }}"
                                                                        {{ old('status') === $status ?? $lead->id ? 'selected' : '' }}>{{ __($status) }}</option>
                                                                @endforeach
                                                            </select>
                                                            @include('includes.invalid', ['field'=> 'status'])
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group input-group-sm ">
                                                            <div class="form-group h-50">
                                                                <label class="mb-0"
                                                                    for="description">{{ __('Description') }}</label>
                                                                <textarea name="description" class="quill-textarea col-md-12" >{!! old('description')!!}</textarea>
                                                        </div>
                                                        </div>
                                                        @include('includes.invalid', [
                                                            'field' => 'description',
                                                        ])
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                    <div class="card-footer">
                        <button type="submit" class="btn bg-gradient-primary">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
