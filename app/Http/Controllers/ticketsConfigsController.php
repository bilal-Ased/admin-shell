<?php

namespace App\Http\Controllers;

use App\Models\TicketCategories;
use App\Models\TicketSources;
use App\Models\TicketStatuses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ticketsConfigsController extends Controller
{

    public function getTicketStatus(Request $request)
    {

        $data = TicketStatuses::where('status', 1)->where('name', 'like', '%' . $request->searchItem . '%');
        return $data->paginate(10, ['*'], 'page', $request->page);
    }


    public function getAllUsers(Request $request)
    {


        // Build the query
        $searchTerm = $request->input('term');
        if ($searchTerm == 'data_default') $searchTerm = null;

        if (is_array($searchTerm)) {
            $searchTerm = $searchTerm['term'];
        }

        $data = User::where('status', 'active')
            ->where(function ($q) use ($searchTerm) {
                $q->where('username', 'like', '%' . $searchTerm . '%')
                    // ->orWhere('last_name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('email', 'like', '%' . $searchTerm . '%');
            })
            ->select('users.*', 'users.username as name', 'users.username as text');

        // Execute the query and get paginated results
        $paginatedData = $data->paginate(3, ['*'], 'page', $request->page);


        // Return the modified paginated results
        return response()->json($paginatedData);
    }

    public function getTicketCategories(Request $request)
    {
        $data = TicketCategories::where('name', 'like', '%' . $request->searchItem . '%');
        return $data->paginate(10, ['*'], 'page', $request->page);
    }

    public function getTicketSources(Request $request)
    {
        $data = TicketSources::where('status', 1)->where('name', 'like', '%' . $request->searchItem . '%');
        return $data->paginate(10, ['*'], 'page', $request->page);
    }
}
