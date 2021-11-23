@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>ওয়েবসাইট</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="fa fa-fw ti-home"></i> হেডার সেকশন
                </a>
            </li>
            <li> লোগো</li>

        </ol>
    </section>
@stop

@section('content')
    <div class="card main-chart">
        <div class="card-header panel-tabs">
            <h5 class="h5">হেডার লোগো পরিবর্তন</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.header.logo') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div>
                    <div class="row advanced_select2">
                        <div class="col-sm-8 ">
                            @if(file_exists(public_path('img/logo-background.svg')))
                                <img src="{{ asset('img/logo-background.svg') }}" style="height: 90px; width: 100%;">
                            @endif

                            <label class="control-label txt_media">
                                লোগো ব্যাকগ্রাউন্ড
                            </label>
                            <input type="file" name="logo_background" class="image-file-upload file-loading"
                                   data-show-preview="false">
                            @error('logo_background')
                            <small class="text-danger">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <div class="alert alert-info small m-t-10">
                                এই ছবিটি ওয়েবসাইট এর মেনুবারের উপরে লোগো এর ব্যাকগ্রাউন্ড হিসেবে কাজ করবে। সাইজ 1140px *
                                128px সাইজে আপলোড েকরুন
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form action="{{ route('admin.header.logo') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div>
                    <div class="row advanced_select2">
                        <div class="col-sm-8 mt-2">
                            @if(file_exists(public_path('img/logo-bn.png')))
                                <img src="{{ asset('img/logo-bn.png') }}" style="height: 90px; width: 100%;">
                            @endif

                            <label class="control-label txt_media">
                                লোগো এবং বাংলা টাইটেল
                            </label>
                            <input type="file" name="logo_bn" class="image-file-upload file-loading"
                                   data-show-preview="false">
                            @error('logo_bn')
                            <small class="text-danger">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <div class="alert alert-info small m-t-10">
                                অবশ্যই PNG ফরমেটে ছবি আপলোড করতে হবে। সাইজ 800px * 105px সাইজে আপলোড েকরুন
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <br>
            <form action="{{ route('admin.header.logo') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div>

                    <div class="row advanced_select2">
                        <div class="col-sm-8 mt-2">
                            @if(file_exists(public_path('img/logo-en.png')))
                                <img src="{{ asset('img/logo-en.png') }}" style="height: 90px; width: 100%;">
                            @endif

                            <label class="control-label txt_media">
                                লোগো এবং ইংরেজি টাইটেল
                            </label>
                            <input type="file" name="logo_en" class="image-file-upload file-loading"
                                   data-show-preview="false">
                            @error('logo_en')
                            <small class="text-danger">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <div class="alert alert-info small m-t-10">
                                অবশ্যই PNG ফরমেটে ছবি আপলোড করতে হবে। সাইজ 800px * 105px সাইজে আপলোড েকরুন
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop



