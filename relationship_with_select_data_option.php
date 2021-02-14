 $inventores = MenuInventory::with(['fgoods_item' => function ($q) {
                $q->select('id', 'name');
            }, 'item' => function ($q) {
                $q->select('id', 'item_name');
            }, 'unit_item' => function ($q) {
                $q->select('id','name');
            }])
            ->select('unit', 'qty', 'id', 'fgoods', 'raw_material')->where('is_deleted', 0)->get(); $inventores = MenuInventory::with(['fgoods_item' => function ($q) {
                $q->select('id', 'name');
            }, 'item' => function ($q) {
                $q->select('id', 'item_name');
            }, 'unit_item' => function ($q) {
                $q->select('id','name');
            }])
            ->select('unit', 'qty', 'id', 'fgoods', 'raw_material')->where('is_deleted', 0)->get();
