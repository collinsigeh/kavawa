<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Entity;
use App\Models\Ticket;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('welcome', [
            'page_title' => 'Customer service and support solution',
            'is_setup_complete' => Country::count() > 0 ? true : false
        ]);
    }

    public function portal(String $slug = null)
    {
        $entity = Entity::where('slug', $slug)->first();
        if(!$entity)
        {
            return view('portal.404');
        }
        return view('portal.home', [
            'entity' => $entity
        ]);
    }

    public function supportPortal(String $slug = null)
    {
        $entity = Entity::where('slug', $slug)->first();
        if(!$entity)
        {
            return view('portal.404');
        }
        return view('portal.support.home', [
            'entity' => $entity
        ]);
    }

    public function showSupportTicket(String $slug = null, Ticket $ticket)
    {
        $entity = Entity::where('slug', $slug)->first();
        if(!$entity)
        {
            return view('portal.404');
        }
        // return view('portal.support.home', [
        //     'entity' => $entity
        // ]);
        dd('I got here with: '.$ticket->subject);
    }
}
