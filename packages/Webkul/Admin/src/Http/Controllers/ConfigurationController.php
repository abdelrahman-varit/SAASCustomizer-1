<?php

namespace Webkul\Admin\Http\Controllers;

use Illuminate\Support\Facades\Event;
use Webkul\Core\Repositories\CoreConfigRepository;
use Webkul\Core\Tree;
use Illuminate\Support\Facades\Storage;
use Webkul\Admin\Http\Requests\ConfigurationForm;
use Webkul\StripeConnect\Repositories\StripeConnectRepository;
use Company;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_config;

    /**
     * CoreConfigRepository object
     *
     * @var \Webkul\Core\Repositories\CoreConfigRepository
     */
    protected $coreConfigRepository;

    protected $stripeConnectRepository;
    /**
     *
     * @var array
     */
    protected $configTree;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Core\Repositories\CoreConfigRepository  $coreConfigRepository
     * @return void
     */
    public function __construct(CoreConfigRepository $coreConfigRepository, StripeConnectRepository $stripeConnectRepository)
    {
        $this->middleware('admin');

        $this->coreConfigRepository = $coreConfigRepository;

        $this->stripeConnectRepository = $stripeConnectRepository;

        $this->_config = request('_config');

        $this->prepareConfigTree();
    }

    /**
     * Prepares config tree
     *
     * @return void
     */
    public function prepareConfigTree()
    {
        $tree = Tree::create();

        foreach (config('core') as $item) {
            $tree->add($item);
        }

        $tree->items = core()->sortItems($tree->items);

        $this->configTree = $tree;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $slugs = $this->getDefaultConfigSlugs();

        if (count($slugs)) {
            return redirect()->route('admin.configuration.index', $slugs);
        }

        return view($this->_config['view'], ['config' => $this->configTree]);
    }


    public function paymentMethodIndex()
    {
        // $slugs = $this->getDefaultConfigSlugs();

        // if (count($slugs)) {
        //     return redirect()->route('admin.configuration.paymentmethod', $slugs);
        // }

        $company = Company::getCurrent();

        $stripeConnect = $this->stripeConnectRepository->findOneWhere([
            'company_id' => $company->id
            ]);
        
        $client_id = company()->getSuperConfigData('sales.paymentmethods.stripe.client_id');

        return view($this->_config['view'], ['config' => $this->configTree,'stripeConnect'=>$stripeConnect, 'client_id'=>$client_id,'company'=>$company]);
    }

    /**
     * Returns slugs
     *
     * @return array
     */
    public function getDefaultConfigSlugs()
    {
        if (! request()->route('slug')) {
            $firstItem = current($this->configTree->items);
            $secondItem = current($firstItem['children']);

            return $this->getSlugs($secondItem);
        }

        if (! request()->route('slug2')) {
            $secondItem = current($this->configTree->items[request()->route('slug')]['children']);

            return $this->getSlugs($secondItem);
        }

        return [];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Webkul\Admin\Http\Requests\ConfigurationForm  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConfigurationForm $request)
    {
        Event::dispatch('core.configuration.save.before');
        // $shop_accounts = request()->get('general')['general']['shop-accounts']['enable'];
        // $company = Company::getCurrent();
        // if($shop_accounts){
        //     $company->update([
        //         'is_active' => 0
        //     ]);
        // }else{
        //     $company->update([
        //         'is_active' => 1
        //     ]);
        // }
        //dd(request()->get('sales'));
        $this->coreConfigRepository->create(request()->all());
      
        Event::dispatch('core.configuration.save.after');

        session()->flash('success', trans('admin::app.configuration.save-message'));

        return redirect()->back();
    }


    public function paymentMethodStore(ConfigurationForm $request)
    {
        Event::dispatch('core.configuration.save.before');
         
       // dd(request()->all());
        $this->coreConfigRepository->create(request()->all());
      
        Event::dispatch('core.configuration.save.after');

        session()->flash('success', trans('admin::app.configuration.save-message'));

        return redirect()->back();
    }



    /**
     * download the file for the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        $path = request()->route()->parameters()['path'];

        $fileName = 'configuration/'. $path;

        $config = $this->coreConfigRepository->findOneByField('value', $fileName);

        return Storage::download($config['value']);
    }

    /**
     * @param  string  $secondItem
     * @return array
     */
    private function getSlugs($secondItem): array
    {
        $temp = explode('.', $secondItem['key']);

        return ['slug' => current($temp), 'slug2' => end($temp)];
    }
}