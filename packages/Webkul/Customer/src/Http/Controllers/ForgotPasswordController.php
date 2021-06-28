<?php

namespace Webkul\Customer\Http\Controllers;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Webkul\Customer\Repositories\CustomerRepository;
use Company;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;
    
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;


    protected $customerRepository;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( CustomerRepository $customerRepository)
    {
        $this->_config = request('_config');
        $this->customerRepository = $customerRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view($this->_config['view']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        try {
            $this->validate(request(), [
                'email' => 'required|email',
            ]);

            $company = Company::getCurrent();
            $customer = $this->customerRepository->findOneWhere(['email'=>request('email'),'company_id'=>$company->id]);
           
            if(empty($customer)){
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
        } catch (\Swift_RfcComplianceException $e) {
            session()->flash('success', trans('customer::app.forget_password.reset_link_sent'));

            return redirect()->back();
        } catch (\Exception $e) {
            report($e);
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
        return Password::broker('customers');
    }
}