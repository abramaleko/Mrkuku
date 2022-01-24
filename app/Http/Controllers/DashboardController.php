<?php

namespace App\Http\Controllers;

use App\Models\Contracts;
use App\Models\Investments;
use App\Models\Invoices;
use App\Models\User;
use App\Notifications\AddPhoneNumber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    //
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
       $this->phoneNotificationDispach();

    //if user is a admin
     if ( Auth::user()->hasRole('Administrator')) {

        $startOfWeek=Carbon::now()->startOfWeek();
        $endOfWeek=Carbon::now()->endOfWeek();
        $previousWeek=$startOfWeek->subWeek();

        //Number of users
        $users=User::all()->count();


        $amountInvestedThisWeek=Contracts::
        whereBetween('start_date', [$startOfWeek, $endOfWeek])
        ->sum('amount');

        $amountInvestedPreviousWeek=Contracts::
        whereBetween('start_date', [$previousWeek, $startOfWeek])
        ->sum('amount');

       //calculate the percentage rise or fall of investment in each month
       try {
        $investmentFlow=( (intval($amountInvestedThisWeek) - intval($amountInvestedPreviousWeek) ) * 100) / intval($amountInvestedThisWeek);
       } catch (\DivisionByZeroError $th) {
           $investmentFlow=0;
       }


        $totalAmountInvested=Contracts::sum('amount');

       // get investment flow for the past six months
        for ($i=5; $i >= 0 ; $i--) {

            //for chicken project
            $investmentFlowByMonthForChickenProject[Carbon::now()->subMonths($i)->format('M')]=
            DB::table('contracts')
           -> select("amount")
            ->where('project_id',1)
            ->whereBetween('start_date',[Carbon::now()->subMonths($i)->startOfMonth(), Carbon::now()->subMonths($i)->endOfMonth()  ])
            ->get();


            //for corn project
            $investmentFlowByMonthForCornProject[Carbon::now()->subMonths($i)->format('M')]=
            DB::table('contracts')
           -> select("amount")
            ->where('project_id',2)
            ->whereBetween('start_date',[Carbon::now()->subMonths($i)->startOfMonth(), Carbon::now()->subMonths($i)->endOfMonth()  ])
            ->get();
        }

        $totalAmountInvestedForSixMonths=DB::table('contracts')
        ->whereBetween('start_date',[Carbon::now()->subMonths(6),Carbon::now()])
        ->sum('amount');

        $topInvestors=Contracts::
        select('investor_id', DB::raw('MAX(amount) as amount'))
        -> with(['investor' => function($query){
            $query->select('id','name','email');
        }])
        ->groupBy('investor_id')
        ->get();

        $latestTransactions=Contracts::
        orderBy('id','desc')
        ->get()->take(5);



        //leading projects section
        $chickenSumAmount=Contracts::where('project_id',1)
        ->sum('amount');

        $cornSumAmount=Contracts::where('project_id',2)
       ->sum('amount');

       $chickenPercentage= ($chickenSumAmount/($chickenSumAmount + $cornSumAmount)) * 100;

       $cornPercentage= ($cornSumAmount/($chickenSumAmount + $cornSumAmount)) * 100;



       return view('dashboard',[
        'users' => $users,
        'amountInvestedThisWeek' => $amountInvestedThisWeek,
        'investmentFlow' => $investmentFlow,
        'totalAmountInvested'  => $totalAmountInvested,
        'topInvestors' => $topInvestors,
        'investmentFlowByMonthForChickenProject' => $investmentFlowByMonthForChickenProject,
        'investmentFlowByMonthForCornProject' => $investmentFlowByMonthForCornProject,
        'totalAmountInvestedForSixMonths' => $totalAmountInvestedForSixMonths,
        'latestTransactions' => $latestTransactions,
        'chickenSumAmount'  => $chickenSumAmount,
        'cornSumAmount' => $cornSumAmount,
        'chickenPercentage' => $chickenPercentage,
        'cornPercentage' => $cornPercentage

    ]);
     }

     return view('investor-dashboard');

    }

    public function phoneNotificationDispach()
    {
          //notifications dispatch
          $counter=0;

          //dispatch notification for phone number is not added
          if (! (Auth::user()->phone_no)) {

             if (count(Auth::user()->unreadNotifications) == 0)
                  Auth::user()->notify(new AddPhoneNumber(Auth::user()->name));
             else
             {
              foreach (Auth::user()->unreadNotifications as $notification) {
                  if ($notification->type == "App\Notifications\AddPhoneNumber") {
                      $counter=+1;
                  }
              }
              if ($counter == 0) {
                  Auth::user()->notify(new AddPhoneNumber(Auth::user()->name));
              }
             }
          }
    }
}
