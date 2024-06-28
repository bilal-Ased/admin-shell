<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Material;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;

class HomeController extends Controller
{
    /*
     * Dashboard Pages Routs
     */
    public function index(Request $request)
    {

        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(6));

        $selectedItem = isset($analyticsData[0]) ? $analyticsData[0] : null;

        dd($analyticsData);

        $userCount = User::count();
        $customerCount = Customer::getTotalCount();
        $newCustomerCount = Customer::where('created_at', '>=', Carbon::now()->subDays(30))->count();
        $itemsCount = Material::count();
        $upcomingProjects = Project::with('customer')
            ->where('end_date', '>', now()) // Assuming end_date is the deadline
            ->orderBy('end_date') // You can change the sorting as per your requirement
            ->take(5) // Limit the results to 5
            ->get();

        $assets = ['chart', 'animation'];

        return view('dashboards.dashboard', compact('assets', 'userCount', 'customerCount', 'newCustomerCount', 'itemsCount', 'upcomingProjects', 'analyticsData'));
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

    public function landing_blog_detail(Request $request)
    {
        return view('landing-pages.pages.blog-detail');
    }

    public function landing_contact(Request $request)
    {
        return view('landing-pages.pages.contact-us');
    }

    public function landing_ecommerce(Request $request)
    {
        return view('landing-pages.pages.ecommerce-landing-page');
    }

    public function landing_faq(Request $request)
    {
        return view('landing-pages.pages.faq');
    }

    public function landing_feature(Request $request)
    {
        return view('landing-pages.pages.feature');
    }

    public function landing_pricing(Request $request)
    {
        return view('landing-pages.pages.pricing');
    }

    public function landing_saas(Request $request)
    {
        return view('landing-pages.pages.saas-marketing-landing-page');
    }

    public function landing_shop(Request $request)
    {
        return view('landing-pages.pages.shop');
    }

    public function landing_shop_detail(Request $request)
    {
        return view('landing-pages.pages.shop_detail');
    }

    public function landing_software(Request $request)
    {
        return view('landing-pages.pages.software-landing-page');
    }

    public function landing_startup(Request $request)
    {
        return view('landing-pages.pages.startup-landing-page');
    }
}
