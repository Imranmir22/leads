@extends('layouts.app')
@section('title') {{ config('app.name', 'Laravel') }} | {{ __('Customers') }} @endsection
@section('heading') {{ __('Customers') }} @endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title p-2">{{ __('View') }} - &quot;{{ $user->name }}&quot;</h3>
                    <a
                        href="{{ route('admin.customers.index') }}"
                        class="btn btn-default float-right">
                        <i class="material-icons">reply_all</i>&nbsp;
                        {{ __('Back to list') }}
                    </a>


                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                        <!-- Customer Information -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{ __('Customer Information') }}
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group input-group-sm ">
                                                <label class="mb-0"
                                                       for="profile_photo">{{__('Profile')}}</label>
                                                <div
                                                    class="form-control @error('profile_photo') is-invalid @enderror"
                                                    style="height: auto !important;">
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type='file' id="profile_photo"
                                                                   name="profile_photo"
                                                                   class="photo-upload"
                                                                   accept=".png, .jpg, .jpeg"/>
                                                            <label for="profile_photo"></label>
                                                        </div>
                                                        <div class="avatar-preview profile_photo">
                                                            <div
                                                                style="background-image: url('{{$user->profile_photo ?? 'https://placehold.it/300'}}');">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @include('backend.includes.invalid', ['field'=> 'profile_photo'])
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-12">
                                            <div class="row">

                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group input-group-sm ">
                                                        <label class="mb-0">{{__('Name')}}</label>
                                                        <div class="text-muted">
                                                            {{$user->name}}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group input-group-sm ">
                                                        <label class="mb-0">{{__('Email')}}</label>
                                                        <div class="text-muted">
                                                            {{$user->email}}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group input-group-sm ">
                                                        <label class="mb-0">{{__('Phone')}}</label>
                                                        <div class="text-muted">
                                                            {{$user->dialing_code}}{{$user->phone}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                       
                        <div class="col-12">
                            <!-- Other Information -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{ __('Other Information') }}
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        {{-- <div class="col-md-6 col-sm-12">
                                            <div class="form-group input-group-sm ">
                                                <label class="mb-0">{{__('Status')}}</label>
                                                <div class="text-muted">
                                                    {{$user->status}}
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group input-group-sm ">
                                                <label class="mb-0">{{__('Created On')}}</label>
                                                <div class="text-muted">
                                                    {{\App\Helpers\Helper::show_date($user->created_at)}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group input-group-sm ">
                                                <label class="mb-0">{{__('Updated On')}}</label>
                                                <div class="text-muted">
                                                    {{\App\Helpers\Helper::show_date($user->updated_at)}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group input-group-sm ">
                                                <label class="mb-0">{{__('Deleted On')}}</label>
                                                <div class="text-muted">
                                                    {{\App\Helpers\Helper::show_date($user->deleted_at)}}
                                                </div>
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
        </div>
    </div>
@endsection
