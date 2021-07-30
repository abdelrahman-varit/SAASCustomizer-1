<?php

namespace Webkul\User\Http\Controllers;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Webkul\User\Repositories\AdminRepository;
use Company;

class ForgetPasswordController extends Controller
{
    use SendsPasswordResetEmails;
    
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;


        /**
     * AdminRepository object
     *
     * @var \Webkul\User\Repositories\AdminRepository
     */
    protected $adminRepository;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( AdminRepository $adminRepository)
    {
        $this->_config = request('_config');
        $this->adminRepository = $adminRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {        
        if (auth()->guard('admin')->check()) {
            return redirect()->route('admin.dashboard.index');
        } else {
            if (strpos(url()->previous(), 'admin') !== false) {
                $intendedUrl = url()->previous();
            } else {
                $intendedUrl = route('admin.dashboard.index');
            }

            session()->put('url.intended', $intendedUrl);

            return view($this->_config['view']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    //shop admin forget password!
    public function store()
    {
        try {
            $this->validate(request(), [
                'email' => 'required|email',
            ]);

            $company = Company::getCurrent();
            $adminUser = $this->adminRepository->findOneWhere(['email'=>request('email'),
                                                            'company_id'=>$company->id]);
            
            if(empty($adminUser)){
                return back()
                ->withInput(request(['email']))
                ->withErrors([
                    'email' => trans('customer::app.forget_password.email_not_exist'),
                ]);
            }

            $response = $this->broker()->sendResetLink(
                request(['email'])
            );

            if ($response == Password::RESET_LINK_SENT) {
                session()->flash('success', trans('customer::app.forget_password.reset_link_sent'));

                return back();
            }

            return back()
                ->withInput(request(['email']))
                ->withErrors([
                    'email' => trans('customer::app.forget_password.email_not_exist'),
                ]);

        } catch(\Exception $e) {
            session()->flash('error', trans($e->getMessage()));

            return redirect()->back();
        }
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('admins');
    }
}