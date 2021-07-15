<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Mcam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfflineController extends Controller
{
    public function __construct()
    {
        $this->Mcam = new Mcam();
    }

    public function index()
    {
        //$mregions['data'] = Mregion::orderBy('regionname', 'DESC')
        //    ->select('id', 'regionname')->get();

        //$mcams = [
        //    'mcam' => $this->Mcam->getDataCam(),
        //];
        //return view('user.offline.index')->with("mregions", $mregions);
        //return view('user.offline.index', $mcams);
        $mcams = [
            'mcam' => $this->Mcam->getDataCam(),
        ];
        return view('user.offline.index', $mcams);

    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $mcam = DB::table('mcams')
            ->join('moutlets', 'mcams.moutletfk', '=', 'moutlets.id')
            ->join('mbranches', 'moutlets.mbranchfk', '=', 'mbranches.id')
            ->join('mregions', 'mbranches.mregionfk', '=', 'mregions.id')
            ->select('mcams.*', 'moutlets.outlatename', 'mbranches.branchname', 'mregions.regionname')
            ->where('regionname', 'like', "%" . $keyword . "%")
            ->orWhere('branchname', 'like', "%" . $keyword . "%")
            ->orWhere('outlatename', 'like', "%" . $keyword . "%")
            ->orWhere('camid', 'like', "%" . $keyword . "%")
            ->paginate(5);
        return view('user.offline.index', compact('mcam'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show($mcam)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('posts.show',$post->id) }}
        //$cam = Mcam::find($mcam);
        $cam = DB::table('mcams')
            ->join('moutlets', 'mcams.moutletfk', '=', 'moutlets.id')
            ->join('mbranches', 'moutlets.mbranchfk', '=', 'mbranches.id')
            ->join('mregions', 'mbranches.mregionfk', '=', 'mregions.id')
            ->select('mcams.*', 'moutlets.outlatename', 'mbranches.branchname', 'mregions.regionname')
            ->where('mcams.id', 'like', "%" . $mcam . "%")->first();
        return view('user.offline.detail', compact('cam'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
        //
    }

    public function getRegion($mregionsid = 0)
    {
        $mbrancData['data'] = Mbranch::orderBy("branchname", "DESC")
            ->select('id', 'branchname', 'mregionfk')
            ->where('mregionfk', $mregionsid)
            ->get();

        return response()->json($mbrancData);
    }

    public function getOutlet($mbranchid = 0)
    {
        $moutletData['data'] = Moutlet::orderBy("outlatename", "DESC")
            ->select('id', 'outlatename', 'mbranchfk')
            ->where('mbranchfk', $mbranchid)
            ->get();

        return response()->json($moutletData);
    }

    public function getOutlateCam($moutletid = 0)
    {
        $mcamsData['data'] = Mcam::orderBy("camid", "DESC")
            ->join('moutlets', 'mcams.moutletfk', '=', 'moutlets.id')
            ->join('mbranches', 'moutlets.mbranchfk', '=', 'mbranches.id')
            ->join('mregions', 'mbranches.mregionfk', '=', 'mregions.id')
            ->select('mregions.*', 'mbranches.*', 'moutlets.*', 'mcams.*')
            ->where('moutletfk', $moutletid)
            ->get();

        return response()->json($mcamsData);
    }

    public function getDetailCam($mcamid = 0)
    {
        $detail['data'] = Mcam::orderBy("camid", "DESC")
            ->select('mcams.*')
            ->where('id', $mcamid)
            ->get();

        return response()->json($detail);
    }

}