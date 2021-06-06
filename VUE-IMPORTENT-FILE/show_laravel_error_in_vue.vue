<script>
export default {
  name: "Register",
  data() {
    return {
      userData: {
        fullname: "",
        user_name: "",
        email: "",
        password: "",
        password_confirmation: "",
        terms_privacy: "",
      },
    // show errors
        password_err:'',
        fullname_err:'',
        user_name_err:'',
        email_err:'',
    };
  },
  mounted() {},
  computed: {},

  methods: {
    register() {
      axios.post("/user/register",this.userData)
        .then((res) => {
            this.userData = {};
            this.$router.push({ name: 'email_varify', params:{email:res.data.email,id:res.data.id}});
        })
        .catch((error) => {
               
               if(error.response.data.errors.fullname){
                   this.fullname_err = error.response.data.errors.fullname[0];
               }
               if(error.response.data.errors.user_name){
                   this.user_name_err = error.response.data.errors.user_name[0];
               }
               if(error.response.data.errors.email){
                   this.email_err = error.response.data.errors.email[0];
               }

               if(error.response.data.errors.password){
                   this.password_err = error.response.data.errors.password[0];
               }

        });
    },
  },
};
</script>
