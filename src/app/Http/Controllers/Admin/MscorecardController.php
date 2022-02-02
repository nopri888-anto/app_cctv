<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Maspek;
use App\Models\Mscorecard;
use App\Models\MscorecardAspect;
use App\Models\Mscoreitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MscorecardController extends Controller
{
    public function index()
    {
        $mscoreaspek = Mscorecard::orderBy('scorecarname')->get();
        return view(
            'admin.scorecard.index',
            ['mscorecardaspect' => $mscoreaspek]
        );
    }

    public function create()
    {
        $maspeks = Maspek::all();
        return view('admin.scorecard.create', compact('maspeks'));
    }

    public function store(Request $request)
    {

        $rules = [
            'scorecarname' => 'required|max:40',
            'description' => 'required|max:200',
            'status' => 'required',
            'aspekfk' => 'required',
        ];

        $messages = [
            'scorecarname.required' => 'Scorecard name must be filled!',
            'scorecarname.max' => 'Scorecardname max filled!',
            'description.required' => 'Description must be filled!',
            'description.max' => 'Description max filled!',
            'status.required' => 'Status must be filled!',
            'aspekfk.required' => 'Aspect must be filled!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $mscorecard = new Mscorecard;
        $mscorecard->scorecarname = $request->scorecarname;
        $mscorecard->description = $request->description;
        $mscorecard->status = $request->status;
        $mscorecard->updatedby = 'Admin';
        $mscorecard->save();

        for ($i = 0; $i < count($request->aspekfk); $i++) {
            $inputs[] = [
                'mscorecardfk' => $idMscorecard = $mscorecard->id,
                'maspectfk' => $request->aspekfk[$i],
            ];
        }

        $insertdatas = MscorecardAspect::insert($inputs);
        if ($insertdatas) {
            // return redirect()->route('scorecard.parameter', ['id' => $idMscorecard]);
            return redirect()->route('admin.scorecard.index')->with('success', 'Scorecard item has been created!');
        } else {
            Session::flash('errors', ['' => 'Scorecard Failed to created!']);
            return redirect()->route('admin.scorecard.create');
        }
    }

    public function show($id)
    {
        $showData = DB::table('mscorecards')
            ->join('mscorecardaspect', 'mscorecards.id', '=', 'mscorecardaspect.mscorecardfk')
            ->join('maspeks', 'mscorecardaspect.maspectfk', '=', 'maspeks.id')
            ->select('mscorecards.*', 'maspeks.*', 'mscorecardaspect.id')
            ->where('mscorecards.id', $id)
            ->get();

        return view('admin.scorecard.show', ['mscorecards' => $showData]);
    }

    public function additemparameter($id)
    {
        $showItem = DB::table('mscorecardaspect')
            ->join('maspeks', 'mscorecardaspect.maspectfk', '=', 'maspeks.id')
            ->join('mscorecards', 'mscorecardaspect.mscorecardfk', '=', 'mscorecards.id')
            ->select('mscorecards.scorecarname', 'mscorecardaspect.id', 'maspeks.aspectname')
            ->where('mscorecardaspect.id', $id)
            ->get();

        $showItems = DB::table('mscorecarditems')
            ->join('mscorecardaspect', 'mscorecarditems.mscorecardaspectfk', '=', 'mscorecardaspect.id')
            ->join('maspeks', 'mscorecardaspect.maspectfk', '=', 'maspeks.id')
            ->join('mscorecards', 'mscorecardaspect.mscorecardfk', '=', 'mscorecards.id')
            ->select('mscorecards.scorecarname', 'maspeks.aspectname', 'mscorecarditems.*')
            ->where('mscorecardaspect.id', $id)
            ->get();

        return view('admin.scorecard.parameter',
            ['mscorecardaspect' => $showItem],
            ['mscorecarditems' => $showItems]
        );
    }

    public function storeitemparameter(Request $request)
    {
        $rules = [
            'idmscorecardaspect' => 'required',
        ];

        $messages = [
            'idmscorecardaspect.required' => 'ID Mscorecardaspect null',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        for ($i = 0; $i < count($request->item); $i++) {
            $inputs[] = [
                'item' => $request->item[$i],
                'mscorecardaspectfk' => $request->idmscorecardaspect[$i],
            ];
        }

        $insertitems = Mscoreitem::insert($inputs);
        if ($insertitems) {
            return redirect()->route('admin.scorecard')->with('success', 'Scorecard item has been created!');
        } else {
            // Session::flash('errors', ['' => 'Scorecard Failed to created!']);
            return back()->with('errors', 'Item Scorecard has been deleted!');
        }
    }

    public function destroyitemparameter($id)
    {
        Mscoreitem::whereId($id)->delete();
        return back()->with('success', 'Item Scorecard has been deleted!');
    }

    // public function storeItem(Request $request)
    // {
    //     $rules = [
    //         'item' => 'required',
    //     ];

    //     $messages = [
    //         'item.required' => 'Scorecard name must be filled!',
    //     ];

    //     $validator = Validator::make($request->all(), $rules, $messages);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput($request->all);
    //     }

    //     for ($i = 0; $i < count($request->item); $i++) {
    //         $inputan[] = [
    //             'item' => $request->item[$i],
    //             'mscorecardaspectfk' => $request->itemid[$i],
    //         ];
    //     }

    //     $insertdata = Mscoreitem::insert($inputan);

    //     if ($insertdata) {
    //         return redirect()->back('admin.scorecard.index')->with('success', 'Scorecard item has been created!');
    //     } else {
    //         Session::flash('errors', ['' => 'Scorecard Failed to created!']);
    //         return redirect()->route('admin.scorecard.create');
    //     }
    // }

    public function getIdItemScorecard($aspek = 0)
    {
        $dataScorecard = DB::table('maspeks')
            ->join('mscorecardaspect', 'maspeks.id', '=', 'mscorecardaspect.maspectfk')
            ->join('mscorecards', 'mscorecardaspect.mscorecardfk', '=', 'mscorecards.id')
            ->select('mscorecardaspect.id')
            ->where('mscorecardaspect.id', $aspek)
            ->get();

        return response()->json($dataScorecard);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Mscorecard::whereId($id)->delete();
        return back()->with('success', 'Scorecard has been deleted!');
    }
}