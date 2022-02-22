<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mscorecard;
use App\Models\MscorecardAspect;
use App\Models\Mscoreitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Mscorecarditem extends Controller
{
    public function index()
    {
        $mscoreaspekitem = Mscoreitem::with('mscorecardaspect')->get();
        return view(
            'admin.scorecarditem.index',
            ['mscorecarditems' => $mscoreaspekitem]
        );
    }

    public function create()
    {
        $mscorecard = Mscorecard::all();
        return view('admin.scorecarditem.create', compact('mscorecard'));
    }

    public function getScoreCardName($scoreid = 0)
    {
        // $itemData = DB::table('mscorecardaspect')
        $itemData['data'] = MscorecardAspect::orderBy('id', 'ASC')
            ->join('maspeks', 'mscorecardaspect.maspectfk', '=', 'maspeks.id')
            ->join('mscorecards', 'mscorecardaspect.mscorecardfk', '=', 'mscorecards.id')
            ->select('maspeks.aspectname', 'mscorecards.scorecarname', 'mscorecardaspect.*')
            ->where('mscorecardaspect.mscorecardfk', '=', $scoreid)
            ->get();

        return response()->json($itemData);
    }

    public function searchItem(Request $request)
    {
        $keyword = $request->scorecardname;
        //$keyword2 = $request->aspek;

        $itemData['data'] = DB::table('mscorecardaspect')
            ->join('maspeks', 'mscorecardaspect.maspectfk', '=', 'maspeks.id')
            ->join('mscorecards', 'mscorecardaspect.mscorecardfk', '=', 'mscorecards.id')
            ->select('mscorecardaspect.id')
        //->where('maspeks.id', $keyword2)
            ->where('mscorecards.id', $keyword)
            ->first();
        return response()->json($itemData);
        // return view('admin.scorecarditem.create', compact('itemData'));
    }

    public function store(Request $request)
    {
        $rules = [
            'item' => 'required',
            'mscoreitemid' => 'required',
        ];

        $messages = [
            'item.required' => 'Must be Filled!',
            'mscoreitemid.required' => 'Must be Filled!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // $mscoreitem = new Mscoreitem;
        for ($i = 0; $i < count($request->item); $i++) {
            $inputs[] = [
                'item' => $request->item[$i],
                'mscorecardaspectfk' => $request->mscoreitemid,
            ];
        }
        $insertdata = Mscoreitem::insert($inputs);

        if ($insertdata) {
            //Session::flash('success', 'Score has been created!');
            return redirect()->route('admin.scorecarditem')->with('success', 'Scorecard has been created!');
        } else {
            //Session::flash('errors', ['' => 'Score Failed to created!']);
            return redirect()->route('admin.scorecarditem.create')->with('errors', 'Scorecard Failed to created!');
        }
    }

    public function edit($id)
    {
        return view('admin.scoreitem.edit');
    }

    public function destroy($id)
    {
        Mscoreitem::where('id', $id)->delete();
        return back()->with('success', 'Scoreitem has been deleted!');
    }
}