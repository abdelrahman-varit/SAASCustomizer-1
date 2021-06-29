<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Admin;

use Webkul\SAASCustomizer\Http\Controllers\Controller;
use Webkul\User\Repositories\AdminRepository;
use Session;
use Company;

/**
 * SessionController
 */
class SessionController extends Controller
{
    protected $_config;

    /**
     * AdminRepository Object
     */
    protected $adminRepository;

    public function __construct(
    AdminRepository $adminRepository
    )
    {
        $this->_config = request('_config');

        $this->adminRepository = $adminRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */

    public function createTwo($email)
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
           
            //session()->put('email', request('email'));

            return view($this->_config['view']);
        }
    }


    public function store()
    {
        $company = Company::getCurrent();

        $this->validate(request(), [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        $remember = request('remember');
 
        $admin = $this->adminRepository->findOneWhere(['email' => request()->email]);

        session()->put('company_name', request('company_name'));
        session()->put('email', request('email'));

        if ( isset($admin['company_id']) && ($admin['company_id'] == $company->id)) {
            if (! auth()->guard('admin')->attempt(request(['email', 'password']), $remember)) {
                session()->flash('error', trans('admin::app.users.users.login-error'));
                if(request('company_name')){
                    return redirect(url('/').'/admin/logins');
                }else{
                    return redirect()->back();
                }
            }

            if (auth()->guard('admin')->user()->status == 0) {
                session()->flash('warning', trans('admin::app.users.users.activate-warning'));

                auth()->guard('admin')->logout();

                return redirect()->route('admin.session.create');
            }

            return redirect()->intended(route($this->_config['redirect']));
        } else {
            session()->flash('error', trans('shop::app.customer.login-form.invalid-creds'));

            return redirect()->back();
        }
    }


    public function signinStepOne()
    {
        $niceNames = array(
            'email' => 'Email'
        );

        $validator = Validator::make(request()->all(), [
            'email' => 'required|email'
        ]);

        $validator->setAttributeNames($niceNames);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 403);
        } else {

            $shop_admin = $this->adminRepository->findOneWhere(['email'=>request()->get('email')]);
            if(empty(!$shop_admin)){
                $company_id = $shop_admin->company_id;
                $companies = $this->companyRepository->findWhereIn('id',[$company_id]);
            }

            if(empty($companies) || empty($shop_admin)){
                return response()->json([
                    'success' => false,
                    'errors' =>['email'=>['Shop not found for this email!']]
                ], 403);
            }

            $company_admin_url = $companies->first()->domain.'/admin/signin-two';
          
            return response()->json([
                'success' => true,
                'admin' => $shop_admin,
                'companies' => $companies,
                'redirect_url' => $company_admin_url,
                'errors' => null
            ], 200);
        }
    }


}