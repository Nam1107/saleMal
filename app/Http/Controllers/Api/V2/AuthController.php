<?php

namespace App\Http\Controllers\Api\V2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\RefreshToken;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use Hash;

class AuthController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('jwtauth', ['except' => ['login','register','refresh']]);
        
    }
    public function register(Request $request)
    {
        // 
        $request->validate([
            'name' => 'required|string',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8',
            'c_password' => 'required|same:password'
        ]);

        $user = new User([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar'=>'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.nj.com%2Fentertainment%2F2020%2F05%2Feveryones-posting-their-facebook-avatar-how-to-make-yours-even-if-it-looks-nothing-like-you.html&psig=AOvVaw0ORbck3Xz-oUKq6-Alu4ux&ust=1700070234042000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCKDIiKmFxIIDFQAAAAAdAAAAABAE',
        ]);
        if($user->save()){
            return response()->json([
                'message' => 'Successfully created user!',
                ],201);
        }
        else{
            return response()->json([
                'message' => 'Provide proper details',
            ], 401);
        }
    }
    

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8'
        ]
        );


        $credentials = $request->only(['email', 'password']);

        $user = User::where('email', $request->email)->first();
        if(!$user){
            return response()->json([
                'message' => 'Email not required',
            ], 401);
        }
        if (!Hash::check($request->password, $user->password, [])) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $refreshToken = [
            'user_id'=>$user->id, 
            'refresh_token'=> $token ,
            'token_type' => 'bearer',
        ];
        
        RefreshToken::create($refreshToken);
        // $refreshToken->create($refreshToken);

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return new UserResource(auth()->user());
    }

    /*
     *
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        // auth()->logout();
        $request->validate([
                'access_token' => 'required'
            ]);
        $accessToken['access_token'] = $request['access_token'];
        RefreshToken::where($refreshToken)->delete();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh(Request $request)
    {
        $token = $request->bearerToken();
        $id = RefreshToken::where('refresh_token', $token)->first();
        if(!$id){
            return response()->json([
                'message' => 'Token has expired',
            ], 401);
        }
        $user = User::where('id', $id['user_id'])->first();
        if(!$user){
            return response()->json([
                'message' => 'Token has expired',
            ], 401);
        }
        $token = auth()->refresh(); // set Black_list is false.
        return $this->respondWithToken($token);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60 
        ]);
    }
}
