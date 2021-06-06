## Install vue notification

  npm install --save vue-notification

## In app.js file

import Notifications from 'vue-notification'
Vue.use(Notifications)

## In Login.vue file

this.$notify({
  title: 'Important message',
  text: 'Hello user!'
});


##  Write it on the top of the main file
<notifications/>
