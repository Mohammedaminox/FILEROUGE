<?php

namespace App\Http\Controllers;

use App\Models\IconClass;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $iconClasses = IconClass::all();
        return view('service', [
            'services' => $services,
            'iconClasses' => $iconClasses
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:services',
            'icon_class' => ''
        ]);
        Service::create($request->all());
        return redirect()->route('service.index')
            ->with('success', 'service created successfully.');
    }

    public function update(Request $request, Service $service)
    {

        $service->update($request->all());

        return redirect()->route('service.index')
            ->with('success', 'service updated successfully');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('service.index')
            ->with('success', 'service deleted successfully');
    }
}
