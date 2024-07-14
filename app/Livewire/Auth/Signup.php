<?php

namespace App\Livewire\Auth;

use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Signup extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $country;

    public $countries = [];

    public function mount()
    {
        if(session('name') && strlen(session('name') > 0))
        {
            $this->name = session('name');
            session(['name' => '']);
        }
        if(session('email') && strlen(session('email') > 0))
        {
            $this->email = session('email');
            session(['email' => '']);
        }
        if(session('password') && strlen(session('password') > 0))
        {
            $this->password = session('password');
            session(['password' => '']);
        }
        $this->countries = Country::orderBy('name', 'asc')->get();
    }

    public function submitForm()
    {
        $this->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'country' => 'required|integer|min:1'
        ]);
        session(['name' => $this->name]);
        session(['email' => $this->email]);
        session(['password' => $this->password]);
        
        if(!Country::find($this->country))
        {
            session([
                'error_message' => 'Invalid country selection.'
            ]);
            return $this->redirect(route('register'), navigate:true);
        }

        try 
        {
            $user = new User();

            $user->name = $this->name;
            $user->email = $this->email;
            $user->password = Hash::make($this->password);
            $user->country_id = $this->country;

            $user->save();

            session(['name' => '']);
            session(['password' => '']);
        }
        catch(\Exception $e)
        {
            session([
                'error_message' => 'ERROR: '.$e->getMessage()
            ]);
            return $this->redirect(route('register'), navigate:true);
        }
        
        session([
            'success_message' => 'Account created successfully. Please login to procceed'
        ]);
        return $this->redirect(route('login'), navigate:true);
    }

    public function render()
    {
        return view('livewire.auth.signup');
    }
}
