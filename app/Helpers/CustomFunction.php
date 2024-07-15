<?php

namespace App\Helpers;

use App\Models\Entity;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CustomFunction{

    // Fuction that creates unique slugs for entities
    public static function generateEntitySlug(String $name)
    {
        $unique_slug_created = 0;
        $try = 0;

        $name_parts = explode(' ', $name);
        $name_part_taken = $name_parts[0];

        while($unique_slug_created < 1)
        {
            $appendix = $try == 0 ? '' : $try;
            $slug = Str::slug($name_part_taken.' '.$appendix);
            if(!Entity::where('slug', $slug)->first())
            {
                $unique_slug_created++;
            }
            $try++;
        }
        return $slug;
    }

    // function to check if an entity name is unique for this user
    public static function isUniqueEntityName(String $name)
    {
        return Entity::where('name', $name)->where('user_id', Auth::user()->id)->count() > 0 ? false : true; 
    }

    // Fuction that creates unique tokens for tickets
    public static function generateTicketToken(String $subject)
    {
        $unique_token_created = 0;
        $try = 0;

        $subject_parts = explode(' ', $subject);
        $subject_part_taken = $subject_parts[0];

        while($unique_token_created < 1)
        {
            $appendix = $try == 0 ? '' : $try;
            $token = md5(Str::slug($subject_part_taken.' '.$appendix));
            if(!Ticket::where('token', $token)->first())
            {
                $unique_token_created++;
            }
            $try++;
        }
        return $token;
    }
}