@extends('admin.layout.master')


@section('content')

    <div class="content-wrapper">

        <section class="content  card card-primary">
            <div class="container-fluid">
                <div class="row mb-2" style="margin-top: 20px">
                    <div class="col-sm-6">
                        <h4> রোল আপডেট করুন</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">হোম</a></li>
                            <li class="breadcrumb-item active"> রোল আপডেট করুন</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="website-form form-group">
                            <div class="card-header">
                                <h3 class="card-title"> রোল আপডেট করুন</h3>
                            </div>
                            <br>
                            <form class="needs-validation" action="{{ route('roles.update', $role->id) }}" method="post">
                                @csrf
                                @method('PATCH')

                                <div class="row">

                                    <div class="col-sm-6 col-md-4">
                                        <label for="inputName" class="col-form-label">ইংরেজী নাম</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" placeholder="ইংরেজী রোল নাম" value="{{ $role->name }}">

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
                                                <input id="{{ $permission->id }}" {!! in_array($permission->id, $rolePermissions) ? 'checked' : '' !!} type="checkbox"
                                                    name="permission[]" value="{{ $permission->id }}">
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
            </div>

        </section>
    </div>

@endsection
