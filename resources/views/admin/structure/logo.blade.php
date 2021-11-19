@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>ওয়েবসাইট</h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="fa fa-fw ti-home"></i> হেডার
                </a>
            </li>
            <li> লোগো</li>

        </ol>
    </section>
@stop

@section('content')
    <div class="card main-chart">
        <div class="card-header panel-tabs">
            <h5>হেডার লোগো পরিবর্তন</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.header.logo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <img class="w-100 d-block" id="logo_background" src="{{ asset('Front') }}/images/header.jpg" alt="">
                </div>
                <div>
                    <div class="row advanced_select2">
                        <div class="col-sm-8 ">
                            @if(isset($website_data->logo_background))
                                <img src="{{ asset('uploads/header_logo/'. $website_data->logo_background) }}" style="height: 90px; width: 100%;">
                            @endif

                            <label class="control-label txt_media">
                                লোগো ব্যাকগ্রাউন্ড
                            </label>
                            <input type="file" name="logo_background" class="image-file-upload file-loading"
                                data-show-preview="false">
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
                        <div class="col-sm-8 ">
                            @if(isset($website_data->logo_bangla))
                                <img src="{{ asset('uploads/header_logo/'. $website_data->logo_bangla) }}" style="height: 90px; width: 100%;">
                            @endif

                            <label class="control-label txt_media">
                                লোগো এবং বাংলা টাইটেল
                            </label>
                            <input type="file" name="logo_bangla" class="image-file-upload file-loading"
                                data-show-preview="false">
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
                        <div class="col-sm-8 ">
                            @if(isset($website_data->logo_english))
                                <img src="{{ asset('uploads/header_logo/'. $website_data->logo_english) }}" style="height: 90px; width: 100%;">
                            @endif

                            <label class="control-label txt_media">
                                লোগো এবং ইংরেজি টাইটেল
                            </label>
                            <input type="file" name="logo_english" class="image-file-upload file-loading"
                                data-show-preview="false">
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



