<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\UserPasswordResetToken;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ResetPassword extends Component
{
    public $password;
    public $password_confirmation;
    public $token;

    public function mount($token = null)
    {
        $this->token = $token;
    }

    public function resetPassword()
    {
        $this->validate([
            'password' => 'required|string|min:8|confirmed'
        ]);

        try
        {
            $pstData = UserPasswordResetToken::where('token', $this->token)->first();
            $user = User::where('email', $pstData->email)->first();
            $user->password = Hash::make($this->password);
            $user->save();
            $pstData->delete();

            session([
                'success_message' => 'Password has been reset'
            ]);
        }
        catch(\Exception $e)
        {
            session([
                'error_message' => 'ERROR: '.$e->getMessage()
            ]);
            return $this->redirect(route('password.reset'), navigate:true);
        }
        return $this->redirect(route('login'), navigate:true);
    }

    public function render()
    {
        return view('livewire.auth.reset-password');
    }
}
