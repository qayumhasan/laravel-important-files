//in route

 {
        path: '/email_varify/:email/:id',                                     
        component: require('./components/auth/email_varify').default,
        name:'email_varify'
    },
    
 //in vue template
 this.$router.push({ name: 'email_varify', params:{email:"dsafsad",id:'10'}});
 
