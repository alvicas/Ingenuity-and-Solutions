<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
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
     * Undocumented function
     *
     * @param RegisterRequest $registerRequest
     * @return void
     */
    public function __invoke(RegisterRequest $registerRequest)
    {
        DB::beginTransaction();
        try {
            $dataRequest = $registerRequest->all();
            
            $dataUser = $this->userModel->setDataCreate($dataRequest);
            $this->userModel->create($dataUser);
    
            $this->userModel->autenticate($dataUser);
            $registerRequest->session()->regenerate();
                
            DB::commit();
            return redirect()->intended('library');
        
        } catch (Exception $exception) {

            DB::rollBack();
            return redirect()->intended('register');
        }
    }
}
