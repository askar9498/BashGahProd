<?php

namespace App\Http\Controllers\Web\Panel\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUsMessage;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class ContactUsController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('panels.admin.contact-us')
            ->with([
                'title' => 'تماس با ما',
                'contact_us' => ContactUsMessage::query()->paginate(10)
            ]);
    }
}
