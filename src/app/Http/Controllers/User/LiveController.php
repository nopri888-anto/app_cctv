<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Maspek;
use App\Models\Mcam;
use App\Models\Mscorecard;
use App\Models\MscorecardAspect;
use App\Models\Taudit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Taudity;
use App\Models\Taudityaspect;

class LiveController extends Controller
{
    public function __construct()
    {
        $this->Mcam = new Mcam();
        $this->Mscorecard = new Mscorecard();
        $this->Maspek = new Maspek();
    }

    public function index()
    {
        $mcams = [
            'mcam' => $this->Mcam->getDataCam(),
        ];
        return view('user.live.index', $mcams);
    }

    public function find(Request $request)
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
        return view('user.live.index', compact('mcam'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function selectCam($cam = 0)
    {
        $mcams = DB::table('mcams')
            ->join('moutlets', 'mcams.moutletfk', '=', 'moutlets.id')
            ->join('mbranches', 'moutlets.mbranchfk', '=', 'mbranches.id')
            ->join('mregions', 'mbranches.mregionfk', '=', 'mregions.id')
            ->select('mcams.*', 'moutlets.*', 'mbranches.*', 'mregions.*')
            ->where('mcams.id', 'like', "%" . $cam . "%")->first();
        return view('user.live.cam', compact('mcams'));
        //return response()->json($mcams, 200);
    }

    public function startAudit($mcam)
    {
        $mcam = DB::table('mcams')
            ->join('moutlets', 'mcams.moutletfk', '=', 'moutlets.id')
            ->join('mbranches', 'moutlets.mbranchfk', '=', 'mbranches.id')
            ->join('mregions', 'mbranches.mregionfk', '=', 'mregions.id')
            ->select('mcams.*', 'moutlets.outlatename', 'moutlets.id AS mid', 'mbranches.branchname', 'mregions.regionname')
            ->where('mcams.camid', 'like', "%" . $mcam . "%")->first();

        $maspeks = Maspek::all();
        $mscorecards = Mscorecard::all();

        //return response()->json($mscoreAspekName, 200);
        return view('user.live.audit', compact('mcam', 'maspeks'))
            ->with('mscorecards', $mscorecards);
    }

    public function getItemPosition($scorecardnameid = 0)
    {
        // $itemData['data'] = Mscorecard::orderBy('scorecarname', 'ASC')
        //     ->select('mscorecarditems.item', 'maspeks.aspectname', 'maspeks.id AS idaspek', 'mscorecards.id AS idmscorecards')
        //     ->join('mscorecardaspect', 'mscorecards.id', '=', 'mscorecardaspect.mscorecardfk')
        //     ->join('maspeks', 'maspeks.id', '=', 'mscorecardaspect.maspectfk')
        //     ->join('mscorecarditems', 'mscorecardaspect.id', '=', 'mscorecarditems.mscorecardaspectfk')
        //     ->where('mscorecards.id', $scorecardnameid)
        //     ->get();

        $itemData['data'] = Mscorecard::orderBy('scorecarname', 'ASC')
            ->select('maspeks.aspectname', 'maspeks.id AS idaspek')
            ->join('mscorecardaspect', 'mscorecards.id', '=', 'mscorecardaspect.mscorecardfk')
            ->join('maspeks', 'maspeks.id', '=', 'mscorecardaspect.maspectfk')
            ->where('mscorecards.id', $scorecardnameid)
            ->get();
        return response()->json($itemData);
    }


    public function saveaudit(Request $request)
    {
        $rules = [
            'idoutlet' => 'required',
            'scorecardname' => 'required',
            'total' => 'required',
            'yudisiumscore' => 'required',
        ];

        $messages = [
            'idoutlet.required' => 'Outlet name must be filled!',
            'scorecardname.required' => 'Scorecardname must be filled!',
            'total.required' => 'Audit score must be filled!',
            'yudisiumscore.required' => 'Yudisium must be filled!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $taudits = new Taudit();
        //$id = Auth::id();
        $taudits->muserfk = 2;
        $taudits->moutletfk = $request->idoutlet;
        $taudits->mscorecardfk = $request->scorecardname;
        $taudits->audittime = Carbon::now();
        $taudits->auditscore = $request->total;
        $taudits->yudisium = $request->yudisiumscore;
        $insertdatataudits = $taudits->save();
        $idtaudity = $taudits->id;


        if ($insertdatataudits) {
            $rules = [
                'employee' => 'required',
                'idcam' => 'required',
                'total' => 'required',
                'yudisiumscore' => 'required',
            ];

            $messages = [
                'employee.required' => 'Employee name must be filled!',
                'idcam.required' => 'Outlatecam must be filled!',
                'total.required' => 'Score must be filled!',
                'yudisiumscore.required' => 'Yudisium Score must be filled!',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }
            $taudity = new Taudity();
            $taudity->tadutfk = $idtaudity;
            $taudity->mcamfk = $request->idcam;
            $taudity->audityname = $request->employee;
            $taudity->audityscore = $request->total;
            $taudity->yudisium = $request->yudisiumscore;
            $taudity->begintime = Carbon::now();
            $taudity->finishtime = Carbon::now();
            $insertdatataudity = $taudity->save();
            $dataidaudity = $taudity->id;
            if ($insertdatataudity) {
                //return response()->json($insertdatataudity, 200);
                $yudisiumaspek = $request->nilaiitem;
                if ($yudisiumaspek >= 0 && $yudisiumaspek <= 69) {
                    $yudisiumaspekresult = "BAD";
                } else if ($yudisiumaspek >= 70 && $yudisiumaspek <= 79) {
                    $yudisiumaspekresult = "FAIR";
                } else if ($yudisiumaspek >= 80 && $yudisiumaspek <= 89) {
                    $yudisiumaspekresult = "GOOD";
                } else if ($yudisiumaspek >= 90 && $yudisiumaspek <= 99) {
                    $yudisiumaspekresult = "EXCELLENT";
                } else {
                    $yudisiumaspekresult = "PERFECT";
                }

                //insert conversesion array
                for ($i = 0; $i < count($request->idaspek); $i++) {
                    $inputs[] = [
                        'taudityfk' => $dataidaudity,
                        'maspectfk' => $request->idaspek[$i],
                        'aspectscore' => $request->nilaiitem[$i],
                        'yudisium' => $yudisiumaspekresult,
                        'begintime' => Carbon::now(),
                        'finishtime' => Carbon::now(),
                    ];
                }
                $datataudityaspect = Taudityaspect::insert($inputs);

                // $taudityaspect = new Taudityaspect();
                // $taudityaspect->taudityfk = $taudity->id;
                // $taudityaspect->maspectfk = $request->idaspek;
                // $taudityaspect->begintime = Carbon::now();
                // $taudityaspect->finishtime = Carbon::now();
                // $taudityaspect->aspectscore = $request->nilaiitem;
                // $taudityaspect->yudisium = $yudisiumaspekresult;
                // $datataudityaspect = $taudityaspect->save();
                if ($datataudityaspect) {
                    return response()->json($datataudityaspect, 200);
                    // return view('user.live.index');
                } else {
                    Session::flash('errors', ['' => 'Score Failed to created!']);
                    return redirect()->route('user.live.audit');
                }
            } else {
                Session::flash('errors', ['' => 'Score Failed to created!']);
                return redirect()->route('user.live.audit');
            }
        } else {
            Session::flash('errors', ['' => 'Score Failed to created!']);
            return redirect()->route('user.live.audit');
        }
    }
}
