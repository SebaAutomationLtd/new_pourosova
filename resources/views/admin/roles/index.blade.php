@extends('admin.layout.master')

@section('header')
    <section class="content-header pl-3">
        <h1>
            রোল পারমিশন তালিকা
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-fw ti-home"></i> ড্যাশবোর্ড
            </li>
            <li> পারমিশন তালিকা</li>
        </ol>
    </section>
@stop

@section('content')

    <div class="card main-chart mt-4">
        <div class="card-header panel-tabs">
            <h4 style="display: inline-block" class="h5">রোল তালিকা টেবিল</h4>
            <a href="{{ route('roles.create') }}" class="btn btn-primary" style="float: right">
                <i class="fas fa-store-alt"></i> নতুন রোল তৈরি করুন
            </a>
        </div>
        <div class="card-body">
            <div class="">
                <div class="table-data">
                    <table class="table table-striped table-bordered datatable responsive nowrap table-hover"
                           style="width:100%">
                        <thead>
                        <tr>
                            <th>সিরিয়াল</th>
                            <th>রোলের নাম</th>
                            <th>একশন</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $key => $role)

                            <tr>
                                <td>{{ $key + 1 }}</td>

                                <td>{{ $role->name }}</td>

                                <td>


                                    <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>


                                    <form class="d-inline" action="{{ route('roles.destroy', $role->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection
