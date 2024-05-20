<?php

namespace App\Http\Controllers;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;

class ScriptController extends Controller
{
    public function index()
    {
        return view('scraped-content');
    }

    public function scrape()
    {
        try {
            // Create a new HttpBrowser instance
            $browser = new HttpBrowser(HttpClient::create());

            // URL of the external website you want to scrape
            $url = 'https://katicrm.com/dashboard/1704645693697x919326563660958800';

            // Request the URL
            $browser->request('GET', $url);

            // Get the content of the page
            $content = $browser->getResponse()->getContent();

            // Return the content as JSON response
            return response()->json(['html' => $content]);
        } catch (\Exception $e) {
            // Handle any errors that may occur during the scraping process
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
