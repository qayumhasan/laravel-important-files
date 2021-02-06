  $validated = $request->validate([
            'item_name' => [
                'required',
                Rule::unique('item_entries')->ignore($request->id),
            ],
        ]);
        
        
 ## here item_entries are table name
