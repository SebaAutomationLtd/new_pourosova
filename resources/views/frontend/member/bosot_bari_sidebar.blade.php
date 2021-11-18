@php
    $sonods=DB::table('sonod_setting')->where('status',1)->get();
@endphp

<div class="items">
    <a href="{{ route('member.dashboard') }}" ><i class="fa fa-bars"></i>প্রোফাইল</a>
    <a href="#" class=""><i class="fa fa-bars"></i>মাই এ‌সেস‌মেন্ট</a>
    <a href="{{route('member.seba-apply')}}" class="{{ Request::path() == 'seba-apply' ? 'active' : '' }}" ><i class="fa fa-bars"></i>নাগ‌রিক সেবার আ‌বেদন</a>
    @if($sonods)
        @foreach($sonods as $sonod)

            <a href="{{ route('sonod-request',$sonod->id) }}"><i class="fa fa-bars"></i>{{$sonod->title}}সমূহ</a>
        @endforeach

    @endif

    <a href="#"><i class="fa fa-bars"></i>আ‌বেদনের অবস্থা</a>
    <a href="#"><i class="fa fa-bars"></i>সনদ ডাউন‌লোড</a>
    <a href="#"><i class="fa fa-bars"></i>ব‌কেয়া কর প‌রি‌শোধ</a>
    <a href="#"><i class="fa fa-bars"></i>সকল লেন‌দেন</a>
    <a href="#"><i class="fa fa-bars"></i>অন্যান্য সেবা</a>
</div>
