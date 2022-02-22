<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Mcam;
use App\Models\Mscorecard;
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

        $cam = DB::table('mcams')
            ->join('moutlets', 'mcams.moutletfk', '=', 'moutlets.id')
            ->join('mbranches', 'moutlets.mbranchfk', '=', 'mbranches.id')
            ->join('mregions', 'mbranches.mregionfk', '=', 'mregions.id')
            ->select('mcams.*', 'moutlets.outlatename', 'mbranches.branchname', 'mregions.regionname')
            ->where('mcams.id', 'like', "%" . $mcam . "%")->first();
        return view('user.offline.detail', compact('cam'));
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

    public function startAudit($cam)
    {
        $taudit = DB::table('taudityaspect')
            ->join('maspeks', 'taudityaspect.maspectfk', '=', 'maspeks.id')
            ->join('taudity', 'taudityaspect.taudityfk', '=', 'taudity.id')
            ->select('taudityaspect.*', 'maspeks.*', 'taudity.*')
            ->get();
        $mcam = DB::table('mcams')
            ->join('moutlets', 'mcams.moutletfk', '=', 'moutlets.id')
            ->join('mbranches', 'moutlets.mbranchfk', '=', 'mbranches.id')
            ->join('mregions', 'mbranches.mregionfk', '=', 'mregions.id')
            ->select('mcams.*', 'moutlets.outlatename', 'mbranches.branchname', 'mregions.regionname')
            ->where('mcams.camip', 'like', "%" . $cam . "%")->first();
        return view('user.offline.scorecard', compact('mcam', 'taudit'));
    }

    public function searchAuditData(Request $request)
    {
        $keyword = $request->find;
        $mcam = DB::table('taudityscore')
            ->join('taudityaspect', 'taudityscore.taudityaspectfk', '=', 'taudityaspect.id')
            ->join('maspeks', 'taudityaspect.maspectfk', '=', 'maspeks.id')
            ->join('taudity', 'taudityaspect.taudityfk', '=', 'taudity.id')
            ->select('mcams.*', 'moutlets.outlatename', 'mbranches.branchname', 'mregions.regionname')
            ->where('regionname', 'like', "%" . $keyword . "%")
            ->orWhere('branchname', 'like', "%" . $keyword . "%")
            ->orWhere('outlatename', 'like', "%" . $keyword . "%")
            ->orWhere('camid', 'like', "%" . $keyword . "%")
            ->paginate(5);
        return view('user.offline.index', compact('mcam'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function score($mcamid)
    {

        $mscore = Mscorecard::distinct()->get(['scorecarname']);

        $cam = DB::table('mcams')
            ->join('moutlets', 'mcams.moutletfk', '=', 'moutlets.id')
            ->join('mbranches', 'moutlets.mbranchfk', '=', 'mbranches.id')
            ->join('mregions', 'mbranches.mregionfk', '=', 'mregions.id')
            ->select('mcams.*', 'moutlets.*', 'mbranches.branchname', 'mregions.regionname')
            ->where('mcams.camip', 'like', "%" . $mcamid . "%")->first();

        return view('user.offline.create', compact('cam', 'mscore'));

    }

    public function getItemAspek($maspekid = 0)
    {
        $itemData['data'] = Mscorecard::orderBy('scorecarname', 'DESC')
            ->select('mscorecards.*')
            ->where('id', $maspekid)
            ->get();

        return response()->json($itemData);
    }

}