<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    /**
     * @var User
     */
    public $userModel;

    /**
     * __construct function
     *
     * @param User $userModel
     */
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LoginRequest $loginRequest)
    {
        try {
            $dataRequest = $loginRequest->all();
            
            if ($this->userModel->autenticate($dataRequest)) {
                $loginRequest->session()->regenerate();
                
                return redirect()->intended('library');
            }
 
            return back()->withErrors([
                'globalError' => 'The provided credentials do not match our records.',
            ]);

        } catch (Exception $exception) {

            return back()->withErrors([
                'globalError' => 'Sorry, we have a problem, please contact with the support team',
            ]);
        }
    }
}
