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
        $topFiveTickets = Tickets::with('customer', 'ticketSources')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        $assets = ['chart', 'animation'];

        return view('dashboards.dashboard', compact('assets', 'appointmentsToday', 'customerCount', 'newCustomerCount', 'myAppointments', 'topFiveTickets'));
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

    /*
     * Menu Style Routs
     */
    public function horizontal(Request $request)
    {
        $assets = ['chart', 'animation'];

        return view('menu-style.horizontal', compact('assets'));
    }

    public function dualhorizontal(Request $request)
    {
        $assets = ['chart', 'animation'];

        return view('menu-style.dual-horizontal', compact('assets'));
    }

    public function dualcompact(Request $request)
    {
        $assets = ['chart', 'animation'];

        return view('menu-style.dual-compact', compact('assets'));
    }

    public function boxed(Request $request)
    {
        $assets = ['chart', 'animation'];

        return view('menu-style.boxed', compact('assets'));
    }

    public function boxedfancy(Request $request)
    {
        $assets = ['chart', 'animation'];

        return view('menu-style.boxed-fancy', compact('assets'));
    }

    /*
     * Pages Routs
     */
    public function billing(Request $request)
    {
        return view('special-pages.billing');
    }

    public function calender(Request $request)
    {
        $assets = ['calender'];

        return view('special-pages.calender', compact('assets'));
    }

    public function kanban(Request $request)
    {
        return view('special-pages.kanban');
    }

    public function pricing(Request $request)
    {
        return view('special-pages.pricing');
    }

    public function rtlsupport(Request $request)
    {
        return view('special-pages.rtl-support');
    }

    public function timeline(Request $request)
    {
        return view('special-pages.timeline');
    }

    /*
     * Widget Routs
     */
    public function widgetbasic(Request $request)
    {
        return view('widget.widget-basic');
    }

    public function widgetchart(Request $request)
    {
        $assets = ['chart'];

        return view('widget.widget-chart', compact('assets'));
    }

    public function widgetcard(Request $request)
    {
        return view('widget.widget-card');
    }

    /*
     * Maps Routs
     */
    public function google(Request $request)
    {
        return view('maps.google');
    }

    public function vector(Request $request)
    {
        return view('maps.vector');
    }

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
    public function uisheet(Request $request)
    {
        return view('uisheet');
    }

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

    /*
    * Table Page Routs
    */
    public function bootstraptable(Request $request)
    {
        return view('table.bootstraptable');
    }

    public function datatable(Request $request)
    {
        return view('table.datatable');
    }

    /*
     * Icons Page Routs
     */

    public function solid(Request $request)
    {
        return view('icons.solid');
    }

    public function outline(Request $request)
    {
        return view('icons.outline');
    }

    public function dualtone(Request $request)
    {
        return view('icons.dualtone');
    }

    public function colored(Request $request)
    {
        return view('icons.colored');
    }

    /*
     * Extra Page Routs
     */
    public function privacypolicy(Request $request)
    {
        return view('privacy-policy');
    }

    public function termsofuse(Request $request)
    {
        return view('terms-of-use');
    }

    /*
    * Landing Page Routs
    */
    public function landing_index(Request $request)
    {
        return view('landing-pages.pages.index');
    }

    public function landing_blog(Request $request)
    {
        return view('landing-pages.pages.blog');
    }

    public function landing_about(Request $request)
    {
        return view('landing-pages.pages.about');
    }


    public function landing_contact(Request $request)
    {
        return view('landing-pages.pages.contact-us');
    }



    public function landing_faq(Request $request)
    {
        return view('landing-pages.pages.faq');
    }



    public function landing_pricing(Request $request)
    {
        return view('landing-pages.pages.pricing');
    }
}
