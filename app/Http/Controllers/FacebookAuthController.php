<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;

use Socialite;

class FacebookAuthController extends Controller
{
    /**
     * Dẫn tới đường đăng nhập tương ứng với Provider
     *
     * @param [type] $provider
     * @return void
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Hàm sẽ được gọi sau khi đăng nhập
     *
     * @param [type] $provider
     * @return void
     */
    public function handleProviderCallback($provider)
    {

        $user = Socialite::driver($provider)->user();

        if ($this->findOrCreate($user))
            return redirect('/');
        else
            return redirect('/login');
    }

    /**
     * Kiểm tra người dùng đã tồn tại chưa, nếu chưa sẽ thêm vào, ngược lại sẽ login
     *
     * @param [type] $user: Thông tin người dùng sau khi đăng nhập thành công
     * @return void
     */
    private function findOrCreate($user)
    {
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
            return true;
        } else if (!$user->email) {
            return false;
        } else {
            $newUser = new User();
            $newUser->email            = $user->email;
            $newUser->name             = "Guest";
            $newUser->password         = $user->token;
            $newUser->provider_id      = $user->id;
            $newUser->username         = $user->name;
            $newUser->save();

            $newCustomer = new Customer();
            $newCustomer->name_customer = $user->name;
            $newCustomer->email         = $user->email;
            $newCustomer->last_name     = $user->name;
            $newCustomer->user_id       = $newUser->id;
            $newCustomer->save();

            auth()->login($newUser, true);
            return true;
        }
    }



    // public function redirectToProvider()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }

    // /**
    //  * Obtain the user information from facebook.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function handleProviderCallback()
    // {
    //     $user = Socialite::driver('facebook')->user();

    //     $authUser = $this->findOrCreateUser($user);

    //     // Chỗ này để check xem nó có chạy hay không
    //     // dd($user);

    //     Auth::login($authUser, true);

    //     return redirect()->route('trang-chu');
    // }

    // private function findOrCreateUser($facebookUser)
    // {
    //     $authUser = User::where('provider_id', $facebookUser->id)->first();

    //     if ($authUser) {
    //         return $authUser;
    //     }

    //     return User::create([
    //         'name' => $facebookUser->name,
    //         'password' => $facebookUser->token,
    //         'email' => $facebookUser->email,
    //         'provider_id' => $facebookUser->id,
    //         'provider' => $facebookUser->id,
    //     ]);
    // }
}
