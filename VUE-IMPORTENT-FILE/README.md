## Router Push
 ```
  this.$router.push({ name: 'email_varify', params:{email:res.data.email,id:res.data.id}});
 ```
 
 ## if you can not use default it may be show "arror VueJS Router 'Failed to mount component: template or render function not defined".
 ```
   {
        path:'/web/template',
        component: require('./components/products/product_master').default,
        children:[
            {
                path: '/web/template',
                component: require('./components/products/product_list/product_list').default,
                name: 'web_template',
            },
        ],
    },
 ```
 
 ## IF we went a item with array (use in vue product fillter) use like this
 ```
  $request->input('resubcat', []
 ```
 
 ## Set Active Class
 ```
  :class="getCatslug == cat.slug?'active':''"
 ```
  // in computed
  ```
  getCatslug(){
      return this.$route.params.cat;
    }
  ```
## Set Base Path in axios
 ```
  <meta name="api-base-url" content="{{ url('api/') }}" />
 ```
