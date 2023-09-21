<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Services\AnalysisService;
use App\Services\DecileService;
use App\Services\RFMService;

class AnalysisController extends Controller
{
    public function index(Request $request)
    {
        // test code
        // // Ajax通信なのでJsonで返却する必要がある
        // return response()->json([
        // 'data' => $request->startDate // 仮設定
        // ], Response::HTTP_OK);

        //test code
                /*
        1. 購買id毎の売上をまとめ, dateをフォーマットした状態のサブクエリをつくる
2. サブクエリをgroupByで日毎にまとめる
*/
        // $subQuery = Order::betweenDate($request->startDate, $request->endDate);
        // if($request->type === 'perDay')
        // {
        // $subQuery->where('status', true)->groupBy('id')->selectRaw('SUM(subtotal) AS
        // totalPerPurchase, DATE_FORMAT(created_at, "%Y%m%d") AS date')->groupBy('date');
        // $data = DB::table($subQuery)
        // ->groupBy('date')
        // ->selectRaw('date, sum(totalPerPurchase) as total')
        // ->get();
        // }
        // return response()->json([ 'data' => $data, 'type' => $request->type ],
        // Response::HTTP_OK);
        // }




        $subQuery = Order::betweenDate($request->startDate, $request->endDate);

        if($request->type === 'perDay'){
           list($data, $labels, $totals) = AnalysisService::perDay($subQuery);
        }

        if($request->type === 'perMonth'){
            list($data, $labels, $totals) = AnalysisService::perMonth($subQuery);
         }

         if($request->type === 'perYear'){
            list($data, $labels, $totals) = AnalysisService::perYear($subQuery);
         }

         if($request->type === 'decile'){
            list($data, $labels, $totals) = DecileService::decile($subQuery);
         }

         if($request->type === 'rfm'){
            list($data, $totals, $eachCount) = RFMService::rfm($subQuery, $request->rfmPrms);
         
            return response()->json([
                'data' => $data,
                'type' => $request->type,
                'eachCount' => $eachCount,
                'totals' => $totals,
            ], Response::HTTP_OK);

        }
        return response()->json([
            'data' => $data,
            'type' => $request->type,
            'labels' => $labels,
            'totals' => $totals,
        ], Response::HTTP_OK);
        }
    

}