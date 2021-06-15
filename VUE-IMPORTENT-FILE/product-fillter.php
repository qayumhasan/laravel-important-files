## In Controller

 public function getFilterProduct()
    {
        $products = Product::withFilters(
            request()->input('resubcat', []),
            request()->input('search'),
            request()->input('cat'),
            request()->input('subcat'),
        )->get();

        return new ProductCollection($products);
    }



## In Product Model

     public function scopeWithFilters($query, $resubcat, $search, $cat, $subcat)
    {

        return $query->when(isset($cat), function ($query) use ($cat) {
                    $query->where('cat_slug', $cat);
                })->when(isset($subcat),function($query) use ($subcat){
                    $query->where('subcat_slug', $subcat);
                })->when(count($resubcat), function ($query) use ($resubcat) {
                    $query->whereIn('resubcate_id', $resubcat);
                })->when(isset($search), function ($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%');
                });
    }
}


## In Vue Component


loadFilterProduct() {
      axios
        .get("/get/filter/product",{
            params: this.selected
        })
        .then((res) => {
          this.products = res.data.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
