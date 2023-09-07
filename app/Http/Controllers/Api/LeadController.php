<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\NewContact;

class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();

        Mail::to('hello@example.com')->send(new NewContact($newLead));
    }
}
