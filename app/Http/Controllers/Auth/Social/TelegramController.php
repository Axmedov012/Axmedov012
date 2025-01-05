<?php

namespace App\Http\Controllers\Auth\Social;

use App\Http\Controllers\Controller;
use App\Models\TelegramUser;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class TelegramController extends Controller
{
    public function telegramCallback(Request $request)
    {
        $telegramData = Socialite::driver('telegram')->user();
        // Find or create the user in the database
        $authUser = $this->findOrCreateUser($telegramData,'telegram');
        // Log the user in
        auth()->login($authUser);
        return redirect()->intended('dashboard');

    }
    protected function findOrCreateUser($data, $provider)
    {
        if($provider=='telegram'){
            $user = TelegramUser::firstOrCreate(
                ['telegram_id'=>$data->getId() ],
                [
                    'name'=>$data->getName(),
                    'avatar'=>$data->avatar,
                    'email'=>$data->email,
                    'username'=>$data->nickname,
                ]
            );
        }
        return $user;

    }
}
