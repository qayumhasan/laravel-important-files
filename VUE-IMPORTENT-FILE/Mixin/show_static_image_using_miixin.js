// First make a folder in resource/js/mixin/asset.js
// write code like this
```
module.exports = {
    methods: {
        asset(path) {
            var base_path = window._asset || '';
            return base_path + path;
        }
    }
}
```


// Required it on app.js
```
  Vue.mixin(require('./mixin/assets'));
```

// use it on product.vue

  <img :src="asset('public/frontend/assets/img/icons/download.png')" /><span>2360</span>

// here i use laravel asset method in vue js
// first at all i use " <script> window._asset = '{{ asset('') }}'; </script> " in master.blade.php
