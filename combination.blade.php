public function sku_combination(Request $request)
    {
        $options = array();
        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $colors_active = 1;
            array_push($options, $request->colors);
        } else {
            $colors_active = 0;
        }

        $unit_price = $request->unit_price;
        $product_name = $request->product_name;

        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_' . $no;
                $my_str = implode('|', $request[$name]);
                array_push($options, explode(',', $my_str));
            }
        }
        if ($request->has('colors_active') && $request->has('choice_no')) {
            $choice_count = count($request->choice_no);
            if ($choice_count == 0) {
                $combinations = Arr::crossJoin($options[0]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            } elseif ($choice_count == 1) {
                $combinations = Arr::crossJoin($options[0], $options[1]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            } elseif ($choice_count == 2) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            } elseif ($choice_count == 3) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            } elseif ($choice_count == 4) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3], $options[4]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            } elseif ($choice_count == 5) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3], $options[4], $options[5]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            }
        } elseif ($request->has('colors_active')) {

            $combinations = Arr::crossJoin($options[0]);
            return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
        } elseif ($request->has('choice_no')) {
            $choice_count = count($request->choice_no);
            if ($choice_count == 1) {
                $combinations = Arr::crossJoin($options[0]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            } elseif ($choice_count == 2) {
                $combinations = Arr::crossJoin($options[0], $options[1]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            } elseif ($choice_count == 3) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            } elseif ($choice_count == 4) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            } elseif ($choice_count == 5) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3], $options[4]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            }
        }
    }
