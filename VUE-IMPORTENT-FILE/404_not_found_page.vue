 { 
        path: '/:catchAll(.*)', 
        component: require('./components/errors/404').default,
        name: 'NotFound'
      },
