<?php

namespace App\Livewire\Auth;

use App\Mail\PasswordRecoveryMail;
use App\Models\User;
use App\Models\UserPasswordResetToken;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ForgotPassword extends Component
{
    public $email;

    public function requestPassword()
    {
        $this->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $this->email)->first();
        if(!$user)
        {
            session([
                'error_message' => 'The email: <b>'.$this->email.'</b> is not recognised'
            ]);
            return $this->redirect(route('password.forgot'), navigate:true);
        }

        $token = md5($this->email.uniqid(rand()));

        try
        {
            UserPasswordResetToken::firstOrCreate(
                [
                    'email' => $this->email
                ],
                [
                    'token' => $token
                ]
            );

            $emailData = [
                'name' => $user->name,
                'url' => route('password.reset', $token)
            ];

            Mail::to($this->email)->send(new PasswordRecoveryMail($emailData));

            session([
                'success_message' => '
                    <small>
                        <p>The  password reset link has been sent to <b>'.$this->email.'</b>.</p>
                        <p>Please open the email and click on the "reset password" link to change your password.</p>
                        <b>Note:</b> You may need to check your spam folder if you did not get it in your inbox.
                    </small>'
                ]);
        }
        catch(\Exception $e)
        {
            session([
                'error_message' => 'ERROR: '.$e->getMessage()
            ]);
        }
        $this->redirect(route('password.forgot'), navigate:true);
    }

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
