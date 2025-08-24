<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DemoItem;

class DemoController extends Controller
{
    public function index()
    {
        $items = DemoItem::orderBy('priority', 'desc')->get();
        return view('demo.index', compact('items'));
    }

    public function create()
    {
        return view('demo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive,pending',
            'priority' => 'required|integer|min:1|max:10'
        ]);

        DemoItem::create($request->all());

        return redirect()->route('demo.index')->with('success', 'Demo item created successfully!');
    }

    public function show(DemoItem $demoItem)
    {
        return view('demo.show', compact('demoItem'));
    }

    public function edit(DemoItem $demoItem)
    {
        return view('demo.edit', compact('demoItem'));
    }

    public function update(Request $request, DemoItem $demoItem)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive,pending',
            'priority' => 'required|integer|min:1|max:10'
        ]);

        $demoItem->update($request->all());

        return redirect()->route('demo.index')->with('success', 'Demo item updated successfully!');
    }

    public function destroy(DemoItem $demoItem)
    {
        $demoItem->delete();

        return redirect()->route('demo.index')->with('success', 'Demo item deleted successfully!');
    }

    public function api()
    {
        $items = DemoItem::orderBy('priority', 'desc')->get();
        return response()->json($items);
    }
}
