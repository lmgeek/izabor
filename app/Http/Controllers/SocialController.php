<?php
//
//namespace Order\Http\Controllers;
//
//use Illuminate\Http\Request;
//use Socialite;
//use Order\User;
//
//class SocialController extends Controller
//{
//    //
//
//    /**
//     * Redirect the user to the Google authentication page.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function redirectToProvider()
//    {
//        return Socialite::driver('google')->redirect();
//    }
//
//
//    /**
//     * Obtain the user information from Google.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function handleProviderCallback()
//    {
//        try {
//            $user = Socialite::driver('google')->user();
//        } catch (\Exception $e) {
//            return redirect('/login');
//        }
//
//        // only allow people with @company.com to login
//        if(explode("@", $user->email)[1] !== 'company.com'){
//            return redirect()->to('/');
//        }
//
//        // check if they're an existing user
//        $existingUser = User::where('email', $user->email)->first();
//
//        if($existingUser){
//            // log them in
//            auth()->login($existingUser, true);
//        } else {
//            // create a new user
//            $newUser                  = new User;
//            $newUser->rol_id          = 2;
//            $newUser->name            = $user->name;
//            $newUser->email           = $user->email;
//            $newUser->avatar          = $user->avatar;
//            $newUser->save();
//
//            auth()->login($newUser, true);
//        }
//        return redirect()->to('/');
//    }
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
////    public function handleProviderCallback($provider)
////    {
////        return Socialite::driver($provider)->redirect();
////    }
//
////    public function redirectToProvider($provider)
////    {
////        try {
////            $social = Socialite::driver($provider)->stateless();
////            $createUser = User::firstOrCreate([
////                'email' => $social->getEmail()
////            ],[
////                'user' => $social->getName()
////            ]);
////
////
////
////            auth()->login($createUser);
////            return $this->redirect('/home')->width('alert',"Bienvenido $createUser->name");
////
////        }catch(\GuzzleHttp\Exception\ClientException $e){
////            dd($e);
////        }
////    }
//
//
////    public function redirect ()
////    {
////        return Socialite::driver('facebook')->redirect();
////    }
////
////    public function callback()
////    {
////        $user = Socialite::driver('facebook')->user();
////
////        return ($user->getAvatar());
////    }
//}
