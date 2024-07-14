<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function mount()
    {
        if(session('email') && strlen(session('email') > 0))
        {
            $this->email = session('email');
            session(['email' => '']);
        }
    }

    public function loginPost()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

        try
        {
            if(Auth::attempt([
                'email' => $this->email,
                'password' => $this->password
            ]))
            {
                return $this->redirect(route('dashboard'), navigate:true);
            }
            else
            {
                session([
                    'email' => $this->email
                ]);
                if(User::where('email', $this->email)->count() < 1)
                {
                    session([
                        'error_message' => 'Invalid email'
                    ]);
                }
                else
                {
                    session([
                        'error_message' => 'Incorrect password'
                    ]);
                }
                return $this->redirect(route('login'), navigate:true);
            }
        } catch (\Exception $e) {
            return $this->redirect(route('login'));
        }
        
        session([
            'success_message' => 'Account created successfully. Please login to procceed'
        ]);
        return $this->redirect(route('login'), navigate:true);
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
