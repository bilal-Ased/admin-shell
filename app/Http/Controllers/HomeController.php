<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Customer;
use App\Models\Material;
use App\Models\Project;
use App\Models\Tickets;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Attributes\Ticket;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;

class HomeController extends Controller
{
    /*
     * Dashboard Pages Routs
     */
    public function index(Request $request)
    {
        $userId = Auth::id();
        // $openTickets = Tickets::where('status_id', Tickets::STATUS_OPEN)->count();
        $myAppointments = Appointment::where('user_id', $userId)->count();
        $customerCount = Customer::getTotalCount();
        $appointmentsToday = Appointment::where('appointment_date', '=', Carbon::today())->count();

        $newCustomerCount = Customer::where('created_at', '>=', Carbon::now()->subDays(30))->count();
        $fiveUpcomingAppointments = Appointment::with('customer')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $assets = ['chart', 'animation'];

        return view('dashboards.dashboard', compact('assets', 'appointmentsToday', 'customerCount', 'newCustomerCount', 'myAppointments', 'fiveUpcomingAppointments'));
    }


    public function handleChart()
    {
        // Get the counts of appointments grouped by month
        $monthlyData = Appointment::select(\DB::raw("MONTH(appointment_date) as month, COUNT(*) as count"))
            ->whereYear('appointment_date', date('Y')) // Adjust the year if necessary
            ->groupBy(\DB::raw("MONTH(appointment_date)"))
            ->orderBy(\DB::raw("MONTH(appointment_date)"))
            ->pluck('count', 'month'); // Pluck both count and month

        // Prepare an array for each month (1-12)
        $appointmentData = [];
        for ($month = 1; $month <= 12; $month++) {
            $appointmentData[$month] = $monthlyData->get($month, 0); // Default to 0 if no appointments
        }

        return response()->json($appointmentData); // Return JSON response
    }


    public function view()
    {
        return view('dashboards.chart');
    }


    public function statusChart()
    {    // Get the counts of appointments grouped by status
        // Get the counts of appointments grouped by status
        $statusCounts = Appointment::select('status_id', \DB::raw("COUNT(*) as count"))
            ->groupBy('status_id')
            ->pluck('count', 'status_id');

        // Prepare data for the pie chart directly
        $chartData = [];
        foreach ($statusCounts as $status => $count) {
            // Determine the status name based on its ID using defined constants
            switch ($status) {
                case Appointment::STATUS_Sheduled: // Reference the constant from the model
                    $statusName = 'Scheduled';
                    break;
                case Appointment::STATUS_ReSheduled: // Reference the constant from the model
                    $statusName = 'ReScheduled';
                    break;
                case Appointment::STATUS_Cancelled: // Reference the constant from the model
                    $statusName = 'Cancelled';
                    break;
                default:
                    $statusName = 'Unknown'; // Default case for unrecognized status
                    break;
            }

            $chartData[] = [
                'name' => $statusName,
                'y' => $count,
            ];
        }

        return response()->json($chartData); // Return JSON response
    }


    public function statusChartView()
    {
        return view('dashboards.status-chart');
    }


    public function getUserAppointments()
    {
        $userId = auth()->id();
        $appointments = Appointment::where('user_id', $userId)
            ->with('user')
            ->orderBy('appointment_date', 'desc') // Sort by date if needed
            ->take(3)
            ->get();

        return response()->json($appointments);
    }


    /*
     * Menu Style Routs
     */


    /*
     * Widget Routs
     */


    /*
     * Maps Routs
     */


    /*
     * Auth Routs
     */
    public function signin(Request $request)
    {
        return view('auth.login');
    }

    public function signup(Request $request)
    {
        return view('auth.register');
    }

    public function confirmmail(Request $request)
    {
        return view('auth.confirm-mail');
    }

    public function lockscreen(Request $request)
    {
        return view('auth.lockscreen');
    }

    public function recoverpw(Request $request)
    {
        return view('auth.recoverpw');
    }

    public function userprivacysetting(Request $request)
    {
        return view('auth.user-privacy-setting');
    }

    /*
     * Error Page Routs
     */

    public function error404(Request $request)
    {
        return view('errors.error404');
    }

    public function error500(Request $request)
    {
        return view('errors.error500');
    }

    public function maintenance(Request $request)
    {
        return view('errors.maintenance');
    }

    /*
     * uisheet Page Routs
     */


    /*
     * Form Page Routs
     */
    public function element(Request $request)
    {
        return view('forms.element');
    }

    public function wizard(Request $request)
    {
        return view('forms.wizard');
    }

    public function validation(Request $request)
    {
        return view('forms.validation');
    }
}
