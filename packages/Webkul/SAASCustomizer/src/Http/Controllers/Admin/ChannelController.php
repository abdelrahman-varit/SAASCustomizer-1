<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Admin;

use Webkul\Shop\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Core\Repositories\ChannelRepository as Channel;

/**
 * Channel controller
 *
 * @author Jitendra Singh <jitendra@webkul.com>
 * @author Vivek Sharma <viveksh047@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class ChannelController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * ChannelRepository object
     *
     * @var Object
     */
    protected $channel;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Core\Repositories\ChannelRepository $channel
     * @return void
     */
    public function __construct(Channel $channel)
    {
        $this->channel = $channel;

        $this->_config = request('_config');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
        $this->validate(request(), [
            'code' => ['required', 'unique:channels,code', new \Webkul\Core\Contracts\Validations\Code],
            'name' => 'required',
            'locales' => 'required|array|min:1',
            'hostname' => ['required', 'unique:channels,hostname', new \Webkul\SAASCustomizer\Contracts\Validations\Host],
            'default_locale_id' => 'required',
            'currencies' => 'required|array|min:1',
            'base_currency_id' => 'required',
            'root_category_id' => 'required',
            'logo.*' => 'mimes:jpeg,jpg,bmp,png',
            'favicon.*' => 'mimes:jpeg,jpg,bmp,png',
            'seo_title' => 'required|string',
            'seo_description' => 'required|string',
            'seo_keywords' => 'required|string'
        ]);

        $data = request()->all();

        $data['seo']['meta_title'] = $data['seo_title'];
        $data['seo']['meta_description'] = $data['seo_description'];
        $data['seo']['meta_keywords'] = $data['seo_keywords'];

        unset($data['seo_title']);
        unset($data['seo_description']);
        unset($data['seo_keywords']);

        $data['home_seo'] = json_encode($data['seo']);

        unset($data['seo']);

        Event::dispatch('core.channel.create.before');

        $channel = $this->channel->create($data);

        Event::dispatch('core.channel.create.after', $channel);

        session()->flash('success', trans('admin::app.settings.channels.create-success'));

        return redirect()->route($this->_config['redirect']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $channel = $this->channel->with(['locales', 'currencies'])->findOrFail($id);

        return view($this->_config['view'], compact('channel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'code' => ['required', 'unique:channels,code,' . $id, new \Webkul\Core\Contracts\Validations\Code],
            'name' => 'required',
            'locales' => 'required|array|min:1',
            'hostname' => ['required', 'unique:channels,hostname,' . $id, new \Webkul\SAASCustomizer\Contracts\Validations\Host],
            'inventory_sources' => 'required|array|min:1',
            'default_locale_id' => 'required',
            'currencies' => 'required|array|min:1',
            'base_currency_id' => 'required',
            'root_category_id' => 'required',
            'logo.*' => 'mimes:jpeg,jpg,bmp,png',
            'favicon.*' => 'mimes:jpeg,jpg,bmp,png'
        ]);

        $data = request()->all();
       
        $data['seo']['meta_title'] = $data['seo_title'];
        $data['seo']['meta_description'] = $data['seo_description'];
        $data['seo']['meta_keywords'] = $data['seo_keywords'];

        unset($data['seo_title']);
        unset($data['seo_description']);
        unset($data['seo_keywords']);

        $data['home_seo'] = json_encode($data['seo']);

        Event::dispatch('core.channel.update.before', $id);

        $channel = $this->channel->update($data, $id);

        Event::dispatch('core.channel.update.after', $channel);

        session()->flash('success', trans('admin::app.settings.channels.update-success'));

        return redirect()->route('admin.channels.edits');
    }

    public function themesSelect(){
        $id=request()->get('id');
        $data=['theme'=>request()->get('theme')];
        $channel = $this->channel->with(['locales', 'currencies','inventory_sources'])->findOrFail($id);

         
        // $channel->locales()->sync($data['locales']);
 
        // $channel->currencies()->sync($data['currencies']);
 
        // $channel->inventory_sources()->sync($data['inventory_sources']);
 
        // $this->uploadImages($data, $channel);
 
        // $this->uploadImages($data, $channel, 'favicon');

       
        $channel = $this->channel->updateTheme($data, $id);
      
        Event::dispatch('core.channel.update.after', $channel);
        
        session()->flash('success', trans('admin::app.settings.channels.theme-success'));
        
        return redirect()->route('admin.theme.index');
        // return redirect()->route('admin.channels.edit',$id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $channel = $this->channel->findOrFail($id);

        if ($channel->code == config('app.channel')) {
            session()->flash('error', trans('admin::app.settings.channels.last-delete-error'));
        } else {
            try {
                Event::dispatch('core.channel.delete.before', $id);

                $this->channel->delete($id);

                Event::dispatch('core.channel.delete.after', $id);

                session()->flash('success', trans('admin::app.settings.channels.delete-success'));

                return response()->json(['message' => true], 200);
            } catch(\Exception $e) {
                session()->flash('error', trans('saas::app.tenant.custom-errors.cannot-delete-default'));
            }
        }

        return response()->json(['message' => false], 400);
    }
}