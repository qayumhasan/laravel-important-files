## .env set up


MAIL_DRIVER="smtp"
MAIL_HOST="smtp.gmail.com"
MAIL_PORT="587"
MAIL_USERNAME="dev.qayumhasan@gmail.com"
MAIL_PASSWORD="sdfsdfsdfdsf"
MAIL_ENCRYPTION=tls
MAIL_FROM_NAME="Mail From DurbarIT Ecommerce"
MAIL_FROM_ADDRESS="dev.qayumhasan@gmail.com"

## in controller section
 public function emailForgotPassword($request)
    {
        $request->validate([
            'phone_email' =>'required'
        ]);

        $user =User::where('email',$request->phone_email)->first();
        if($user){
            $token = str::random('90');
            $verify_code = rand(9999,99999);
            $user->update([
                'verification_code'=>$verify_code,
                'remember_token'=>$token,
            ]);

            Mail::to($request->phone_email)->send(new ForgotPassword($token,$request->phone_email));


        }
    }
    
## In ForgotPassword.PHP fILE

  use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $token;
    public $email;

    public function __construct($token , $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $token = $this->token;
        $mail = $this->email;
        return $this->view('mail_template.forget_password_mail_template',compact('token','mail'));
    }
