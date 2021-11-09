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
    <div class="card main-chart mt-4">
        <div class="card-header panel-tabs">
            <h5>আপডেট অন্যান্য কর্মকর্তা</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.web.contact.admin.other_employee.update',$other_edit->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">নাম</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="নাম" name="name" value="{{ $other_edit->name }}" id="name">

                    </div>
                    <div class="form-group col-md-4">
                        <label for="">পদবী</label>
                        <input type="text" class="form-control @error('designation') is-invalid @enderror" placeholder="পদবী" name="designation" value="{{ $other_edit->designation }}" id="designation">
          
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">মোবাইল</label>
                        <input type="number" class="form-control @error('contact') is-invalid @enderror" placeholder="মোবাইল"  value="{{ $other_edit->contact }}" name="contact">
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" >সাবমিট</button>
            </form>
        </div>
    </div>
@stop
@section('js')
<script type="text/javascript">
            document.forms['form'].elements['name'].value          =[{{ old('name') }}];
            document.forms['form'].elements['designation'].value   =[{{ old('designation') }}];
            document.forms['form'].elements['email'].value         =[{{ old('email') }}];
            document.forms['form'].elements['contact'].value       =[{{ old('contact') }}];
            document.forms['form'].elements['telephone'].value     =[{{ old('telephone') }}];
            document.forms['form'].elements['photo'].value         =[{{ old('photo') }}];
            document.forms['form'].elements['designation'].value   =[{{ old('designation') }}];
            document.forms['form'].elements['contact'].value   =    [{{ old('contact') }}];
    
</script>
@stop



