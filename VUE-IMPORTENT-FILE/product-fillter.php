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
 data() {
    return {
      selected: {
        cat: this.$route.params.cat,
        subcat: this.$route.params.subcat,
        resubcat: [],
        filter: [],
        search: "",
      },
    };
  },

  watch: {
    $route(to, from) {
      var cat = this.$route.params.cat;
      var subcat = this.$route.params.subcat;
      this.$store.dispatch("retriveCategores");
      this.$store.dispatch("retriveSubCategores",cat);
      this.$store.dispatch("retriveReSubCategores",{cat:cat,subcat:subcat});
      this.$store.dispatch("retriveProduct",{cat:cat,subcat:subcat});
      this.$store.dispatch("retriveFilterProduct",{cat:cat,subcat:subcat,params:this.selected});

      this.selected.resubcat = [];
      this.selected.filter = [];
      this.selected.search = "";
    },
    selected: {
      handler: function () {
        var cat = this.$route.params.cat;
        var subcat = this.$route.params.subcat;
        this.$store.dispatch("retriveFilterProduct",{cat:cat,subcat:subcat,params:this.selected});
      },
      deep: true,
    },
  },




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
