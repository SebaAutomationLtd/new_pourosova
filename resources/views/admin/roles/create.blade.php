@extends('admin.layout.master')

@section('top-header')
    <section class="content-header pl-3">
        <h1>রোল পারমিশন</h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-fw ti-home"></i> ড্যাশবোর্ড
            </li>
            <li>রোল ম্যানেজমেন্ট</li>
        </ol>
    </section>
@stop

@section('content')

    <div class="content-wrapper">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="">নতুন রোল নিবন্ধন করুন</h3>
            </div>
            <div class="card-body">
                <form class="needs-validation" action="{{ route('roles.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <label for="inputName" class="col-form-label">ইংরেজী নাম</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="ইংরেজী রোল নাম" value="{{ old('name') }}">

                            @error('name')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-4 mt-2">
                            <strong>পারমিশনস: </strong>
                            @forelse($permissions as $permission)
                                <div>
                                    <input type="checkbox" name="permission[]" id="{{ $permission->id }}"
                                        value="{{ $permission->id }}">
                                    <label for="{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                            @empty
                            @endforelse
                            </select>
                            @error('permission[]')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div style="padding: 10px 0px 25px">
                        <button type="submit" class="btn btn-primary save_data">সংরক্ষণ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
