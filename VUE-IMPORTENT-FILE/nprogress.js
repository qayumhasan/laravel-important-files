import Nprogress from 'nprogress'
import 'nprogress/nprogress.css';




axios.interceptors.request.use(function (config) {
    
    Nprogress.start();
    eventBus.$emit('startLoader',true);
    
    return config;
  }, function (error) {
      console.log(error)
    return Promise.reject(error);
  });

  axios.interceptors.response.use(function (response) {
    Nprogress.done();
    eventBus.$emit('startLoader',false);
    
    
    return response;
  }, function (error) {
    console.log(error)
    return Promise.reject(error);
  });


