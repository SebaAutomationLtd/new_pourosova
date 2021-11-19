<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DataTables;
use DB;
use Illuminate\Http\Request;
use URL;

class BosotBariController extends Controller
{
    public function NewBosotIndex()
    {
        return view('admin.bosotbari.index');
    }

    public function BosotSearchResult2(Request $request)
    {

        if ($request->ajax()) {
            $query = DB::table('bosot_bari');

            if (!empty($request->get('ward_id'))) {
                $query->where('ward_id', '=', $request->get('ward_id'));
            }

            if (!empty($request->get('village_id'))) {
                $query->where('village_id', '=', $request->get('village_id'));
            }

            if (!empty($request->get('nid'))) {
                $query->orWhere('nid', '=', $request->get('nid'));
            }

            if (!empty($request->get('holding_no'))) {
                $query->orWhere('holding_no', '=', $request->get('holding_no'));
            }

            if (!empty($request->get('mobile'))) {
                $query->orWhere('mobile', '=', $request->get('mobile'));
            }

            $data = $query->orderBy('id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    $useri = DB::table('users')->where('id', $data->user_id)->first();
                    return $useri->name;
                })
                ->addColumn('father', function ($data) {
                    if (isset($data->father)) {
                        return $data->father;
                    } else {
                        return $data->spouse;
                    }
                })
                ->addColumn('nid', function ($data) {
                    if ($data->nid == null) {
                        return $data->birth_certificate;
                    } else {
                        return $data->nid;
                    }
                })

                ->addColumn('action', function ($row) {
                    $btn = '<a data-toggle="tooltip" title="" href="#" class="btn btn-info btn-sm quick-edit"  data-original-title="কুইক এডিট" data-id="' . $row->id . '"><i class="fa fa-wrench"></i></a>
  <a data-toggle="tooltip" title="" href="' . url('take_action_edit/' . $row->id . '/' . '1') . '" class="btn btn-success btn-sm " data-original-title="এডিট করুন"><i class="fa fa-edit"></i></a>
  <a data-toggle="tooltip" onclick="return confirm("Are you sure?")"  title="" href="' . route('delete.general_member', $row->id) . '" class="btn btn-danger btn-sm" data-original-title="ডিলেট করুন"><i class="fa fa-trash"></i></a>';

                    return $btn;

                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.bosotbari.bosot_search_result');
    }

    public function BosotSearchResult3(Request $request)
    {

        if ($request->ajax()) {
            $query = DB::table('bosot_bari')->where('status', 1);

            if (!empty($request->get('ward_id'))) {
                $query->where('ward_id', '=', $request->get('ward_id'));
            }

            if (!empty($request->get('village_id'))) {
                $query->where('village_id', '=', $request->get('village_id'));
            }

            if (!empty($request->get('mobile'))) {
                $query->where('nid', '=', $request->get('mobile'))->orWhere('holding_no', '=', $request->get('mobile'))->orWhere('mobile', '=', $request->get('mobile'));
            }

            $data = $query->orderBy('id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    $useri = DB::table('users')->where('id', $data->user_id)->first();
                    return $useri->name;
                })
                ->addColumn('father', function ($data) {
                    if (isset($data->father)) {
                        return $data->father;
                    } else {
                        return $data->spouse;
                    }
                })
                ->addColumn('nid', function ($data) {
                    if ($data->nid == null) {
                        return $data->birth_certificate;
                    } else {
                        return $data->nid;
                    }
                })

                ->addColumn('action', function ($row) {
                    $btn = '<a data-toggle="tooltip" title="" href="#" class="btn btn-info btn-sm quick-edit"  data-original-title="কুইক এডিট" data-id="' . $row->id . '"><i class="fa fa-wrench"></i></a>
  <a data-toggle="tooltip" title="" href="' . url('take_action_edit/' . $row->id . '/' . '1') . '" class="btn btn-success btn-sm " data-original-title="এডিট করুন"><i class="fa fa-edit"></i></a>
  <a data-toggle="tooltip" onclick="return confirm("Are you sure?")"  title="" href="' . route('delete.general_member', $row->id) . '" class="btn btn-danger btn-sm" data-original-title="ডিলেট করুন"><i class="fa fa-trash"></i></a>';

                    return $btn;

                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.bosotbari.bosot_search_result_active');
    }

    public function BosotSearchResult4(Request $request)
    {

        if ($request->ajax()) {
            $query = DB::table('bosot_bari')->where('status', 0);

            if (!empty($request->get('ward_id'))) {
                $query->where('ward_id', '=', $request->get('ward_id'));
            }

            if (!empty($request->get('village_id'))) {
                $query->where('village_id', '=', $request->get('village_id'));
            }

            if (!empty($request->get('mobile'))) {
                $query->where('nid', '=', $request->get('mobile'))->orWhere('holding_no', '=', $request->get('mobile'))->orWhere('mobile', '=', $request->get('mobile'));
            }

            $data = $query->orderBy('id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    $useri = DB::table('users')->where('id', $data->user_id)->first();
                    return $useri->name;
                })
                ->addColumn('father', function ($data) {
                    if (isset($data->father)) {
                        return $data->father;
                    } else {
                        return $data->spouse;
                    }
                })
                ->addColumn('nid', function ($data) {
                    if ($data->nid == null) {
                        return $data->birth_certificate;
                    } else {
                        return $data->nid;
                    }
                })

                ->addColumn('action', function ($row) {
                    $btn = '<a data-toggle="tooltip" title="" href="#" class="btn btn-info btn-sm quick-edit"  data-original-title="কুইক এডিট" data-id="' . $row->id . '"><i class="fa fa-wrench"></i></a>
  <a data-toggle="tooltip" title="" href="' . url('take_action_edit/' . $row->id . '/' . '1') . '" class="btn btn-success btn-sm " data-original-title="এডিট করুন"><i class="fa fa-edit"></i></a>
  <a data-toggle="tooltip" onclick="return confirm("Are you sure?")"  title="" href="' . route('delete.general_member', $row->id) . '" class="btn btn-danger btn-sm" data-original-title="ডিলেট করুন"><i class="fa fa-trash"></i></a>';

                    return $btn;

                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.bosotbari.bosot_search_result_inactive');
    }

    public function BosotSearchResult5(Request $request)
    {

        if ($request->ajax()) {
            $query = DB::table('bosot_bari');

            if (!empty($request->get('ward_id'))) {
                $query->where('ward_id', '=', $request->get('ward_id'));
            }

            if (!empty($request->get('village_id'))) {
                $query->where('village_id', '=', $request->get('village_id'));
            }

            if (!empty($request->get('family_class_id'))) {
                $query->where('family_class_id', '=', $request->get('family_class_id'));
            }

            $data = $query->orderBy('id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    $useri = DB::table('users')->where('id', $data->user_id)->first();
                    return $useri->name;
                })
                ->addColumn('nid', function ($data) {
                    if ($data->nid == null) {
                        return $data->birth_certificate;
                    } else {
                        return $data->nid;
                    }
                })
                ->addColumn('family_class_id', function ($data) {
                    $family = DB::table('family_classes')->where('id', $data->family_class_id)->first();
                    return $family->name ?? '';
                })

                ->addColumn('action', function ($row) {
                    $btn = '<a data-toggle="tooltip" title="" href="#" class="btn btn-info btn-sm quick-edit"  data-original-title="কুইক এডিট" data-id="' . $row->id . '"><i class="fa fa-wrench"></i></a>
  <a data-toggle="tooltip" title="" href="' . url('take_action_edit/' . $row->id . '/' . '1') . '" class="btn btn-success btn-sm " data-original-title="এডিট করুন"><i class="fa fa-edit"></i></a>
  <a data-toggle="tooltip" onclick="return confirm("Are you sure?")"  title="" href="' . route('delete.general_member', $row->id) . '" class="btn btn-danger btn-sm" data-original-title="ডিলেট করুন"><i class="fa fa-trash"></i></a>';

                    return $btn;

                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.bosotbari.bosot_search_result_family');
    }

    public function GetInfo($id)
    {
        $member = DB::table('bosot_bari')
            ->join('users', 'bosot_bari.user_id', 'users.id')
            ->select('users.show_password', 'bosot_bari.*')
            ->where('bosot_bari.id', $id)
            ->first();
        $user = DB::table('users')->where('id', $member->user_id)->first();

        echo '<div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control name" placeholder="Name"
                           value="' . $user->name . '">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="user_id">User ID</label>
                    <input type="text" name="user_id" id="user_id" class="form-control user_id" placeholder="User ID"
                           value="' . $user->id . '" readonly>
                </div>
            </div>
            <input type="hidden" name="member_id" class="member_id" value="' . $id . '">
            <div class="form-group col-md-6">
                <label for="password">password</label>
                <input type="text" name="password" id="password" class="form-control password" placeholder="Password"
                       value="' . $user->show_password . '">
            </div>
        </div>';

    }

    public function UpdateMemberInfo(Request $request)
    {

        $get_data = DB::table('bosot_bari')->where('id', $request->id)->first();

        $name     = $request->name;
        $password = $request->password;
        $user_id  = $get_data->user_id;
        DB::table('users')
            ->where('id', $get_data->user_id)
            ->update([
                'name'          => $name,
                'show_password' => $password,
                'password'      => bcrypt($password),
            ]);

    }

    public function DeleteMember($id)
    {
        $get_data = DB::table('bosot_bari')->where('id', $id)->first();
        DB::table('bosot_bari')->where('id', $id)->delete();
        DB::table('users')->where('id', $get_data->user_id)->delete();

        return Redirect()->back()->with('message', 'বসত বাড়ী ইউজার ডিলিট হয়েছে ');
    }
}
