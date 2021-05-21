<?php

namespace Webkul\SAASCustomizer\Helpers;

use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Inventory\Repositories\InventorySourceRepository;
use Webkul\Core\Repositories\LocaleRepository;
use Webkul\Core\Repositories\CurrencyRepository;
use Webkul\Core\Repositories\ChannelRepository;
use Webkul\Core\Repositories\CoreConfigRepository;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Attribute\Repositories\AttributeGroupRepository;
use Webkul\Customer\Repositories\CustomerGroupRepository;
use Webkul\CMS\Repositories\CmsRepository;
use Webkul\Velocity\Repositories\VelocityMetadataRepository;
use Webkul\Velocity\Repositories\ContentRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Product\Models\ProductFlat;
use Webkul\Product\Repositories\ProductFlatRepository as ProductFlat;
use Webkul\Product\Repositories\ProductInventoryRepository;

use Webkul\Product\Models\ProductAttributeValue;
use Webkul\SAASCustomizer\Repositories\AttributeValueRepository;

use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

use DB;
use Company;

/**
 * Class meant for preparing functional and sample data required for functioning of a new seller
 */
class DataPurger
{
    /**
     * CompanyRepository instance
     */
    protected $companyRepository;

    /**
     * CategoryRepository instance
     */
    protected $categoryRepository;

    /**
     * InventorySourceRepository instance
     */
    protected $inventorySourceRepository;

    /**
     * LocaleRepository instance
     */
    protected $localeRepository;

    /**
     * CurrencyRepository instance
     */
    protected $currencyRepository;

    /**
     * ChannelRepository instance
     */
    protected $channelRepository;

    /**
     * CoreConfigRepository instance
     */
    protected $coreConfigRepository;

    /**
     * AttributeRepository instance
     */
    protected $attributeRepository;

    /**
     * AttributeFamilyRepository instance
     */
    protected $attributeFamilyRepository;

    /**
     * AttributeGroupRepository instance
     */
    protected $attributeGroupRepository;

    /**
     * CustomerGroupRepository instance
     */
    protected $customerGroupRepository;

    /**
     * CmsRepository instance
     */
    protected $cmsRepository;

    /**
     * VelocityMetadataRepository instance
     */
    protected $velocityMetadataRepository;

    protected $contentRepository;

    /**
     * ProductRepository object
     *
     * @var \Webkul\Product\Repositories\ProductRepository
     */
    protected $productRepository;
    protected $productFlat;
    protected $productInventoryRepository;
    protected $productAttributeValue;

    protected $attributeFamilyData;



    public function __construct(
        CategoryRepository $categoryRepository,
        InventorySourceRepository $inventorySourceRepository,
        LocaleRepository $localeRepository,
        CurrencyRepository $currencyRepository,
        ChannelRepository $channelRepository,
        CoreConfigRepository $coreConfigRepository,
        AttributeRepository $attributeRepository,
        AttributeFamilyRepository $attributeFamilyRepository,
        AttributeGroupRepository $attributeGroupRepository,
        CustomerGroupRepository $customerGroupRepository,
        CmsRepository $cmsRepository,
        VelocityMetadataRepository $velocityMetadataRepository,
        ContentRepository $contentRepository,
        ProductRepository $productRepository,
        ProductFlat $productFlat,
        ProductInventoryRepository $productInventoryRepository,
        AttributeValueRepository $productAttributeValue
    )
    {
        $this->categoryRepository = $categoryRepository;

        $this->inventorySourceRepository = $inventorySourceRepository;

        $this->localeRepository = $localeRepository;

        $this->currencyRepository = $currencyRepository;

        $this->channelRepository = $channelRepository;

        $this->coreConfigRepository = $coreConfigRepository;
        
        $this->attributeRepository = $attributeRepository;

        $this->attributeFamilyRepository = $attributeFamilyRepository;

        $this->attributeGroupRepository = $attributeGroupRepository;

        $this->customerGroupRepository = $customerGroupRepository;

        $this->cmsRepository = $cmsRepository;

        $this->velocityMetadataRepository = $velocityMetadataRepository;

        $this->contentRepository = $contentRepository;

        $this->productRepository = $productRepository;
        $this->productFlat = $productFlat;
        $this->productInventoryRepository = $productInventoryRepository;
        $this->productAttributeValue = $productAttributeValue;
        
    }

    /**
     * To prepare the country state data for
     * admin and customers country & state fields
     * auto population
     */
    public function prepareCountryStateData()
    {
        $countries = json_decode(file_get_contents(base_path().'/packages/Webkul/Core/src/Data/countries.json'), true);

        DB::table('countries')->insert($countries);

        $states = json_decode(file_get_contents(base_path().'/packages/Webkul/Core/src/Data/states.json'), true);

        DB::table('country_states')->insert($states);

        Log::info("Info:- prepareCountryStateData() created.");

        return true;
    }

    /**
     * Creates a default locale
     */
    public function prepareLocaleData()
    {
        $companyRepository = Company::getCurrent();

        $data = [
            'code'          => 'en',
            'name'          => 'English',
            'company_id'    => $companyRepository->id
        ];
        
        Log::info("Info:- prepareLocaleData() created for company " . $companyRepository->domain . ".");

        return $this->localeRepository->create($data);
    }

    /**
     * Prepares a default currency
     */
    public function prepareCurrencyData()
    {
        $companyRepository = Company::getCurrent();

        $data = [
            'code'          => 'USD',
            'name'          => 'US Dollar',
            'symbol'        => '$',
            'company_id'    => $companyRepository->id
        ];

        Log::info("Info:- prepareCurrencyData() created for company " . $companyRepository->domain . ".");

        return $this->currencyRepository->create($data);
    }

    /**
     * Prepares category data
     */
    public function prepareCategoryData()
    {
        $companyRepository = Company::getCurrent();

        $data = [
            'position'          => '1',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => NULL,
            'name'              => 'Root',
            'slug'              => 'root',
            'description'       => 'Root',
            'meta_title'        => '',
            'meta_description'  => '',
            'meta_keywords'     => '',
            'locale'            => 'all',
            'company_id'        => $companyRepository->id
        ];

        $rootCategory = $this->categoryRepository->create($data);

        

        //header content purge

        $content1 = [
            "_token" => "JuuGJx2KRaQtfacnzpDUnP9beFIelth5CiBcSEH8",
            "locale" => "all",
            "title" => "Home",
            "position" => "1",
            "status" => "1",
            "content_type" => "category",
            "en" => [
                "page_link" => "/",
                "link_target" => "0"
                ]
            ];
            $this->contentRepository->create($content1);
            
            $content2 = [
            "_token" => "JuuGJx2KRaQtfacnzpDUnP9beFIelth5CiBcSEH8",
            "locale" => "all",
            "title" => "Flash Deals",
            "position" => "2",
            "status" => "1",
            "content_type" => "category",
            "en" => [
                "page_link" => "/flash-deals",
                "link_target" => "0"
                ]
            ];
            $this->contentRepository->create($content2);
    
            $content3 = [
                "_token" => "JuuGJx2KRaQtfacnzpDUnP9beFIelth5CiBcSEH8",
                "locale" => "all",
                "title" => "Blog",
                "position" => "3",
                "status" => "1",
                "content_type" => "category",
                "en" => [
                    "page_link" => "/blog",
                    "link_target" => "0"
                    ]
                ];
                $this->contentRepository->create($content3);
    
                $content4 = [
                    "_token" => "JuuGJx2KRaQtfacnzpDUnP9beFIelth5CiBcSEH8",
                    "locale" => "all",
                    "title" => "All Brands",
                    "position" => "4",
                    "status" => "1",
                    "content_type" => "category",
                    "en" => [
                        "page_link" => "/all-brands",
                        "link_target" => "0"
                        ]
                    ];
                    $this->contentRepository->create($content4);
    
                    
                $content5 = [
                    "_token" => "JuuGJx2KRaQtfacnzpDUnP9beFIelth5CiBcSEH8",
                    "locale" => "all",
                    "title" => "Shop Kids & Girls",
                    "position" => "5",
                    "status" => "1",
                    "content_type" => "category",
                    "en" => [
                        "page_link" => "/shop-kids-girls",
                        "link_target" => "0"
                        ]
                    ];
                $this->contentRepository->create($content5);


                //config setting for wishlist
                        
                $now = Carbon::now();
                DB::table('core_config')->insert([
                    [    'code'        => 'general.content.shop.wishlist_option',
                        'company_id'   => $companyRepository->id,
                        'value'        => '1',
                        'channel_code' => $companyRepository->username,
                        'locale_code'  => 'en',
                        'created_at'   => $now,
                        'updated_at'   => $now ]
                    ]);

        return $rootCategory;
    }

    /**
     * Prepares data for a default inventory
     */
  
 

    public function prepareDemoCategoryData($rootCategory){

        $companyRepository = Company::getCurrent();

        $data1 = [
            'position'          => '2',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $rootCategory->id,
            'name'              => 'Fitness World',
            'slug'              => 'fitness-world-'.$companyRepository->id,
            'description'       => 'Fitness Product',
            'meta_title'        => 'Fitness Product',
            'meta_description'  => 'Fitness Product',
            'meta_keywords'     => 'Fitness Product',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        Log::info("Info:- prepareDemoCategoryData() created for data2 - company " . $companyRepository->domain . ".");

        $subCategory1 = $this->categoryRepository->create($data1);

        $data1_1 = [
            'position'          => '1',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $subCategory1->id,
            'name'              => 'Trademil',
            'slug'              => 'trademil-'.$companyRepository->id,
            'description'       => 'Trademil',
            'meta_title'        => 'Trademil',
            'meta_description'  => 'Trademil',
            'meta_keywords'     => 'Trademil',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        $subCategory1_1 = $this->categoryRepository->create($data1_1);

        $data1_2 = [
            'position'          => '2',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $subCategory1->id,
            'name'              => 'Exercise Bike',
            'slug'              => 'exercise-bike-'.$companyRepository->id,
            'description'       => 'Exercise Bike',
            'meta_title'        => 'Exercise Bike',
            'meta_description'  => 'Exercise Bike',
            'meta_keywords'     => 'Exercise Bike',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        $subCategory1_2 = $this->categoryRepository->create($data1_2);


        $data2 = [
            'position'          => '2',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $rootCategory->id,
            'name'              => 'Food & Beverages',
            'slug'              => 'food-beverages-'.$companyRepository->id,
            'description'       => 'Food & Beverages',
            'meta_title'        => 'Food & Beverages',
            'meta_description'  => 'Food & Beverages',
            'meta_keywords'     => 'Food & Beverages',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        Log::info("Info:- prepareCategoryData() created for company " . $companyRepository->domain . ".");

        $subCategory2 = $this->categoryRepository->create($data2);

        $data2_1 = [
            'position'          => '1',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $subCategory2->id,
            'name'              => 'Soft Drinks',
            'slug'              => 'soft-drinks-'.$companyRepository->id,
            'description'       => 'Soft Drinks',
            'meta_title'        => 'Soft Drinks',
            'meta_description'  => 'Soft Drinks',
            'meta_keywords'     => 'Soft Drinks',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        $subCategory2_1 = $this->categoryRepository->create($data2_1);

        $data2_2 = [
            'position'          => '2',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $subCategory2->id,
            'name'              => 'Bakery & Pastry',
            'slug'              => 'bakery-pastry-'.$companyRepository->id,
            'description'       => 'Bakery & Pastry',
            'meta_title'        => 'Bakery & Pastry',
            'meta_description'  => 'Bakery & Pastry',
            'meta_keywords'     => 'Bakery & Pastry',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        $subCategory2_2 = $this->categoryRepository->create($data2_2);
        
        $data3 = [
            'position'          => '3',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $rootCategory->id,
            'name'              => 'Women',
            'slug'              => 'women-product-'.$companyRepository->id,
            'description'       => 'Women Product',
            'meta_title'        => 'Women Product',
            'meta_description'  => 'Women Product',
            'meta_keywords'     => 'Women Product',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        Log::info("Info:- prepareCategoryData() created for company " . $companyRepository->domain . ".");

        $subCategory3 = $this->categoryRepository->create($data3);
    
        
        $data3_1 = [
            'position'          => '1',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $subCategory3->id,
            'name'              => 'Jwellary',
            'slug'              => 'jwellary-'.$companyRepository->id,
            'description'       => 'Jwellary',
            'meta_title'        => 'Jwellary',
            'meta_description'  => 'Jwellary',
            'meta_keywords'     => 'Jwellary',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        $subCategory3_1 = $this->categoryRepository->create($data3_1);

        $data3_2 = [
            'position'          => '2',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $subCategory3->id,
            'name'              => 'Cosmetics',
            'slug'              => 'cosmetics-'.$companyRepository->id,
            'description'       => 'Cosmetics',
            'meta_title'        => 'Cosmetics',
            'meta_description'  => 'Cosmetics',
            'meta_keywords'     => 'Cosmetics',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        $subCategory3_2 = $this->categoryRepository->create($data3_2);

        $data4 = [
            'position'          => '4',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $rootCategory->id,
            'name'              => 'Kids',
            'slug'              => 'kids-product-'.$companyRepository->id,
            'description'       => 'Kids Product',
            'meta_title'        => 'Kids Product',
            'meta_description'  => 'Kids Product',
            'meta_keywords'     => 'Kids Product',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        Log::info("Info:- prepareCategoryData() created for company " . $companyRepository->domain . ".");

        $subCategory4 = $this->categoryRepository->create($data4);
    
        
        $data4_1 = [
            'position'          => '1',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $subCategory4->id,
            'name'              => 'Baby Cloths',
            'slug'              => 'baby-cloths-'.$companyRepository->id,
            'description'       => 'Baby Cloths',
            'meta_title'        => 'Baby Cloths',
            'meta_description'  => 'Baby Cloths',
            'meta_keywords'     => 'Baby Cloths',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        $subCategory4_1 = $this->categoryRepository->create($data4_1);

        $data4_2 = [
            'position'          => '2',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $subCategory4->id,
            'name'              => 'Toys',
            'slug'              => 'toys-'.$companyRepository->id,
            'description'       => 'Toys',
            'meta_title'        => 'Toys',
            'meta_description'  => 'Toys',
            'meta_keywords'     => 'Toys',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        $subCategory4_2 = $this->categoryRepository->create($data4_2);   
    
        $data5 = [
            'position'          => '5',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $rootCategory->id,
            'name'              => 'Video Games',
            'slug'              => 'video-games-'.$companyRepository->id,
            'description'       => 'Video Games',
            'meta_title'        => 'Video Games',
            'meta_description'  => 'Video Games',
            'meta_keywords'     => 'Video Games',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        Log::info("Info:- prepareCategoryData() created for company " . $companyRepository->domain . ".");

        $subCategory5 = $this->categoryRepository->create($data5);
 
        $data5_1 = [
            'position'          => '1',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $subCategory5->id,
            'name'              => 'Actions & Advancers',
            'slug'              => 'actions-advacners-'.$companyRepository->id,
            'description'       => 'Actions & Advancers',
            'meta_title'        => 'Actions & Advancers',
            'meta_description'  => 'Actions & Advancers',
            'meta_keywords'     => 'Actions & Advancers',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        $subCategory5_1 = $this->categoryRepository->create($data5_1);

        $data5_2 = [
            'position'          => '2',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $subCategory5->id,
            'name'              => 'Puzzle Games',
            'slug'              => 'puzzle-games-'.$companyRepository->id,
            'description'       => 'Puzzle Games',
            'meta_title'        => 'Puzzle Games',
            'meta_description'  => 'Puzzle Games',
            'meta_keywords'     => 'Puzzle Games',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        $subCategory5_2 = $this->categoryRepository->create($data5_2);
    
        $data6 = [
            'position'          => '6',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $rootCategory->id,
            'name'              => 'Electronics',
            'slug'              => 'electronics-product-'.$companyRepository->id,
            'description'       => 'Electronics Product',
            'meta_title'        => 'Electronics',
            'meta_description'  => 'Electronics',
            'meta_keywords'     => 'Electronics',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        Log::info("Info:- prepareCategoryData() created for company " . $companyRepository->domain . ".");

        $subCategory6 = $this->categoryRepository->create($data6);
        
        $data6_1 = [
            'position'          => '2',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $subCategory6->id,
            'name'              => 'TV & Monitors',
            'slug'              => 'tv-monitors-'.$companyRepository->id,
            'description'       => 'TV & Monitors',
            'meta_title'        => 'TV & Monitors',
            'meta_description'  => 'TV & Monitors',
            'meta_keywords'     => 'TV & Monitors',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        $subCategory6_1 = $this->categoryRepository->create($data6_1);

        $data6_2 = [
            'position'          => '2',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $subCategory6->id,
            'name'              => 'Freeze & Airconditions',
            'slug'              => 'freeze-airconditions-'.$companyRepository->id,
            'description'       => 'Freeze & Airconditions',
            'meta_title'        => 'Freeze & Airconditions',
            'meta_description'  => 'Freeze & Airconditions',
            'meta_keywords'     => 'Freeze & Airconditions',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        $subCategory6_2 = $this->categoryRepository->create($data6_2);

        $data7 = [
            'position'          => '7',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $rootCategory->id,
            'name'              => 'Furnitures',
            'slug'              => 'furnitures-'.$companyRepository->id,
            'description'       => 'Furnitures Product',
            'meta_title'        => 'Furnitures Product',
            'meta_description'  => 'Furnitures Product',
            'meta_keywords'     => 'Furnitures Product',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        Log::info("Info:- prepareCategoryData() created for company " . $companyRepository->domain . ".");

        $subCategory7 = $this->categoryRepository->create($data7);
            
        $data7_1 = [
            'position'          => '2',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $subCategory7->id,
            'name'              => 'Wood Furnitures',
            'slug'              => 'wood-furnitures-'.$companyRepository->id,
            'description'       => 'Wood Furnitures',
            'meta_title'        => 'Wood Furnitures',
            'meta_description'  => 'Wood Furnitures',
            'meta_keywords'     => 'Wood Furnitures',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        $subCategory7_1 = $this->categoryRepository->create($data7_1);

        $data7_2 = [
            'position'          => '2',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $subCategory7->id,
            'name'              => 'Plastic Board Furnitures',
            'slug'              => 'plastic-board-furnitures-'.$companyRepository->id,
            'description'       => 'Plastic Board Furnitures',
            'meta_title'        => 'Plastic Board Furnitures',
            'meta_description'  => 'Plastic Board Furnitures',
            'meta_keywords'     => 'Plastic Board Furnitures',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        $subCategory7_2 = $this->categoryRepository->create($data7_2);

        $data8 = [
            'position'          => '8',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $rootCategory->id,
            'name'              => 'Mobile',
            'slug'              => 'mobile-'.$companyRepository->id,
            'description'       => 'Mobile & Accessorries',
            'meta_title'        => 'Mobile & Accessorries',
            'meta_description'  => 'Mobile & Accessorries',
            'meta_keywords'     => 'Mobile & Accessorries',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        Log::info("Info:- prepareCategoryData() created for company " . $companyRepository->domain . ".");

        $subCategory8 = $this->categoryRepository->create($data8);
        
        
        $data8_1 = [
            'position'          => '2',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $subCategory8->id,
            'name'              => 'Android Mobile',
            'slug'              => 'android-mobile-'.$companyRepository->id,
            'description'       => 'Android Mobile',
            'meta_title'        => 'Android Mobile',
            'meta_description'  => 'Android Mobile',
            'meta_keywords'     => 'Android Mobile',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        $subCategory8_1 = $this->categoryRepository->create($data8_1);

        $data8_2 = [
            'position'          => '2',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $subCategory8->id,
            'name'              => 'iPhone & Mac Laptop',
            'slug'              => 'iphone-mac-laptop-'.$companyRepository->id,
            'description'       => 'iPhone & Mac Laptop',
            'meta_title'        => 'iPhone & Mac Laptop',
            'meta_description'  => 'iPhone & Mac Laptop',
            'meta_keywords'     => 'iPhone & Mac Laptop',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        $subCategory8_2 = $this->categoryRepository->create($data8_2);

        $data9 = [
            'position'          => '9',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $rootCategory->id,
            'name'              => 'Watch & Wallet',
            'slug'              => 'watch-product-'.$companyRepository->id,
            'description'       => 'Watch & Wallet Product',
            'meta_title'        => 'Watch & Wallet Product',
            'meta_description'  => 'Watch & Wallet Product',
            'meta_keywords'     => 'Watch & Wallet Product',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        Log::info("Info:- prepareCategoryData() created for company " . $companyRepository->domain . ".");

        $subCategory9 = $this->categoryRepository->create($data9);
        
        $data9_1 = [
            'position'          => '2',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $subCategory9->id,
            'name'              => 'Hand Watches',
            'slug'              => 'hand-watches-'.$companyRepository->id,
            'description'       => 'Hand Watches',
            'meta_title'        => 'Hand Watches',
            'meta_description'  => 'Hand Watches',
            'meta_keywords'     => 'Hand Watches',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        $subCategory9_1 = $this->categoryRepository->create($data9_1);

        $data9_2 = [
            'position'          => '2',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $subCategory9->id,
            'name'              => 'Wallet & Parts',
            'slug'              => 'wallet-parts-'.$companyRepository->id,
            'description'       => 'Wallet & Parts',
            'meta_title'        => 'Wallet & Parts',
            'meta_description'  => 'Wallet & Parts',
            'meta_keywords'     => 'Wallet & Parts',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        $subCategory9_2 = $this->categoryRepository->create($data9_2);

        $data10 = [
            'position'          => '10',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $rootCategory->id,
            'name'              => 'Shoes & Belt',
            'slug'              => 'shoes-belt-product-'.$companyRepository->id,
            'description'       => 'Shoes & Belt Product',
            'meta_title'        => 'Shoes & Belt Product',
            'meta_description'  => 'Shoes & Belt Product',
            'meta_keywords'     => 'Shoes & Belt Product',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        Log::info("Info:- prepareCategoryData() created for company " . $companyRepository->domain . ".");

        $subCategory10 = $this->categoryRepository->create($data10);

        $data10_1 = [
            'position'          => '2',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $subCategory10->id,
            'name'              => 'Ladies Shoes',
            'slug'              => 'ladies-shoes-'.$companyRepository->id,
            'description'       => 'Ladies Shoes',
            'meta_title'        => 'Ladies Shoes',
            'meta_description'  => 'Ladies Shoes',
            'meta_keywords'     => 'Ladies Shoes',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        $subCategory10_1 = $this->categoryRepository->create($data10_1);

        $data10_2 = [
            'position'          => '2',
            'image'             => NULL,
            'status'            => '1',
            'parent_id'         => $subCategory10->id,
            'name'              => 'Leather Belts',
            'slug'              => 'leather-belts-'.$companyRepository->id,
            'description'       => 'Leather Belts',
            'meta_title'        => 'Leather Belts',
            'meta_description'  => 'Leather Belts',
            'meta_keywords'     => 'Leather Belts',
            'locale'            => 'all',
            'attributes'        => '37',
            'company_id'        => $companyRepository->id
        ];

        $subCategory10_2 = $this->categoryRepository->create($data10_2);

        $categories = [
            [
                'category'  =>$subCategory1,
                'sub1'      =>$subCategory1_1,
                'sub2'      =>$subCategory1_2,
            ], [
                'category'  =>$subCategory2,
                'sub1'      =>$subCategory2_1,
                'sub2'      =>$subCategory2_2,
            ], [
                'category'  =>$subCategory3,
                'sub1'      =>$subCategory3_1,
                'sub2'      =>$subCategory3_2,
            ],[
                'category'  =>$subCategory4,
                'sub1'      =>$subCategory4_1,
                'sub2'      =>$subCategory4_2,
            ],[
                'category'  =>$subCategory5,
                'sub1'      =>$subCategory5_1,
                'sub2'      =>$subCategory5_2,
            ],[
                'category'  =>$subCategory6,
                'sub1'      =>$subCategory6_1,
                'sub2'      =>$subCategory6_2,
            ],[
                'category'  =>$subCategory7,
                'sub1'      =>$subCategory7_1,
                'sub2'      =>$subCategory7_2,
            ],[
                'category'  =>$subCategory8,
                'sub1'      =>$subCategory8_1,
                'sub2'      =>$subCategory8_2,
            ],[
                'category'  =>$subCategory9,
                'sub1'      =>$subCategory9_1,
                'sub2'      =>$subCategory9_2,
            ],[
                'category'  =>$subCategory10,
                'sub1'      =>$subCategory10_1,
                'sub2'      =>$subCategory10_2,
            ],
        ];

        return  $categories;

    }

    public function prepareInventoryData()
    {
        $companyRepository = Company::getCurrent();

        $data = [
            'code'              => 'default',
            'name'              => 'Default',
            'contact_name'      => 'Detroit Warehouse',
            'contact_email'     => 'warehouse@example.com',
            'contact_number'    => '123456789',
            'status'            => 1,
            'country'           => 'US',
            'state'             => 'MI',
            'street'            => '12th Street',
            'city'              => 'Detroit',
            'postcode'          => '48127',
            'company_id'        => $companyRepository->id
        ];

        Log::info("Info:- prepareInventoryData() created for company " . $companyRepository->domain . ".");

        return $this->inventorySourceRepository->create($data);
    }


    public function prepareDemoProductData($categoryList, $inventoryList, $channelData){

        $companyRepository = Company::getCurrent();
        $inventorySourceId = $inventoryList->id;

        if(empty($this->attributeFamilyData)){
            Log::info("Info:- prepareDemoProductData() not created for company " . $companyRepository->domain . ".");
            return "prepareDemoProducctData";
        }


        $data1=[
            "_token"                => "CgWmt7sEZ4LpKI9ujkkaSYb6qoiMEkhvjEGNUdt3",
            "type"                  => "simple",
            "attribute_family_id"   => $this->attributeFamilyData->id,
            "sku"                   => time().$companyRepository->id,
        ];
            

        $product1_create = $this->productRepository->create($data1);

        $data1 = [
            'sku' => $product1_create->sku,
            'name' => 'Pro One',
            'url_key' => 'pro-one'. '-' . rand(1,9999999).'-'.$companyRepository->id,
            'new' => 1,
            'featured' => 1,
            'visible_individually' => 1,
            'min_price' => 100,
            'max_price' => 100,
            'status' => 1,
            'color' => 1,
            'price' => 100,
            'special_price' => 0,
            'special_price_from' => null,
            'special_price_to' => null,
            'width' => 1,
            'height' => 1,
            'depth' => 1,
            'meta_title' => '',
            'meta_keywords' => '',
            'meta_description' => '',
            'weight' => 1,
            'color_label' => 'Red'
            'size' => 6,
            'size_label' => 'S',
            'short_description' => '<p>Short Description</p>',
            'description' => '<p>Description</p>',
            'channel' => $channelData->id,
            'locale' => 'en',
        ];

        $this->productAttributeValue->createAttributeValue($data);

        $this->productFlat->create($data);



        // $product1_inventory_create = $this->productInventoryRepository->create([
        //     'qty'                   => 150,
        //     'product_id'            => $product1_create->id,
        //     'inventory_source_id'   => $inventorySourceId,
        //     'vendor_id'             => 0,
        //     "channels"              => [0 => $channelData->id],
        //     "price"                 => 500,
        // ]);
        // $product1_category_create = DB::table('product_categories')
        //     ->insert([
        //         'product_id' => $product1_create->id, 
        //         'category_id' => $categoryList[0]['category']->id
        // ]); 


        // $product1_update = ProductFlat::where('product_id', $product1_create->id)->first();
        // $product1_update->sku = $product1_create->sku;
        // $product1_update->name = 'Demo Product One';
        // $product1_update->url_key = 'demo-product-one'.'-' . rand(1,9999999).'-'.$companyRepository->id;
        // $product1_update->short_description = '<p>lorem</p>';
        // $product1_update->description = '<p>lorem</p>';
        // $product1_update->new = 1;
        // $product1_update->featured = 1;
        // $product1_update->status = 1;
        // $product1_update->visible_individually = 1;

        // $product1_update->price = 100;
        // $product1_update->min_price = 100;
        // $product1_update->max_price = 100;
        // $product1_update->special_price = 100;
        // $product1_update->special_price_from = 100;
        // $product1_update->special_price_to = 100;

        // $product1_update->weight = rand(1,2);
        // $product1_update->width = rand(1,2);
        // $product1_update->height = rand(1,2);
        // $product1_update->depth = rand(1,2);

        // $product1_update->color = 1;
        // $product1_update->color_label = 'Red';

        // $product1_update->size = 6;
        // $product1_update->size_label = 'S';

        // $product1_update->meta_title = '';
        // $product1_update->meta_keywords = '';
        // $product1_update->meta_description = '';

        // $product1_update->save();


    }

    /**
     * Prepares a default channel
     */
    public function prepareChannelData()
    {
        $companyRepository = Company::getCurrent();

        $localeRepository = $this->prepareLocaleData();

        $currencyRepository = $this->prepareCurrencyData();

        $categoryRepository = $this->prepareCategoryData();

        $demoCategoryRepository = $this->prepareDemoCategoryData($categoryRepository);

        $inventorySourceRepository = $this->prepareInventoryData();

        $this->attributeFamilyData  = $this->prepareAttributeFamilyData();

        
        $data = [
            'company_id'        => $companyRepository->id,
            'code'              => $companyRepository->username,
            'name'              => 'BuyNoir Channel',
            'description'       => 'BuyNoir Channel',
            'inventory_sources' => [
                0               => $inventorySourceRepository->id
            ],
            'root_category_id'  => $categoryRepository->id,
            'hostname'          => $companyRepository->domain,
            'locales'           => [
                0               => $localeRepository->id
            ],
            'default_locale_id' => $localeRepository->id,
            'currencies'        => [
                0               => $currencyRepository->id
            ],
            'base_currency_id'  => $currencyRepository->id,
            'theme'             => 'cognite',
            'home_page_content' => "<p>@include('shop::home.advertisements.advertisement-four')@include('shop::home.featured-products') @include('shop::home.advertisements.advertisement-three') @include('shop::home.new-products') @include('shop::home.advertisements.advertisement-two')@include('shop::home.category-products', ['category' => 'fitness-world-".$companyRepository->id."'])@include('shop::home.recent-products')</p>",

            'footer_content' => 
            '<div class="list-container">
                <span class="list-heading">Other Links</span>
                <ul class="list-group">
                    <li><a href="@php echo route(\'shop.cms.page\', \'about-us\') @endphp">BuyNoir About Us</a></li>
                    <li><a href="@php echo route(\'shop.cms.page\', \'return-policy\') @endphp">Return Policy</a></li>
                    <li><a href="@php echo route(\'shop.cms.page\', \'refund-policy\') @endphp">Refund Policy</a></li>
                    <li><a href="@php echo route(\'shop.cms.page\', \'terms-conditions\') @endphp">Terms and conditions</a></li>
                    <li><a href="@php echo route(\'shop.cms.page\', \'terms-of-use\') @endphp">Terms of Use</a></li>
                    <li><a href="@php echo route(\'shop.cms.page\', \'contact-us\') @endphp">Contact Us</a>
                    </li></ul></div>

                    <div class="list-container">
                        <span class="list-heading">Connect With Us</span>
                        <ul class="list-group">
                        <li><a href="#"><span class="icon icon-facebook"></span>Facebook </a></li>
                        <li><a href="#"><span class="icon icon-twitter"></span> Twitter </a></li>
                        <li><a href="#"><span class="icon icon-instagram"></span> Instagram </a></li>
                        <li><a href="#"> <span class="icon icon-google-plus"></span>Google+ </a></li>
                        <li><a href="#"> <span class="icon icon-linkedin"></span>LinkedIn </a></li></ul></div>',
            'home_seo' => json_encode([
                'meta_title'        => "BuyNoir Channel",
                'meta_description'  => "BuyNoir Channel Description",
                'meta_keywords'     => "BuyNoir Channel"
            ]),
        ];
        
        $channelRepository = $this->channelRepository->create($data);

        if ( isset($channelRepository->id) ) {
            $companyRepository->channel_id = $channelRepository->id;
            $companyRepository->save();
        }

        $productRepo = $this->prepareDemoProductData($demoCategoryRepository, $inventorySourceRepository,  $channelRepository);


        Log::info("Info:- prepareChannelData() created for company " . $companyRepository->domain . ".");

        return $channelRepository;
    }

    /**
     * Prepare data for the customer groups
     */
    public function prepareCustomerGroupData()
    {
        $companyRepository = Company::getCurrent();
        $data = [
            'guest'     => [
                'code'              => 'guest',
                'name'              => 'Guest',
                'is_user_defined'   => 0,
                'company_id'        => $companyRepository->id
            ],
            'general'   => [
                'id'                => 1,
                'code'              => 'general',
                'name'              => 'General',
                'is_user_defined'   => 0,
                'company_id'        => $companyRepository->id
            ],
            'wholesale' => [
                'id'                => 2,
                'code'              => 'wholesale',
                'name'              => 'Wholesale',
                'is_user_defined'   => 0,
                'company_id'        => $companyRepository->id
            ]
        ];

        Log::info("Info:- prepareCustomerGroupData() created for company " . $companyRepository->domain . ".");

        return [
            'guest'     => $this->customerGroupRepository->create($data['guest']),
            'default'   => $this->customerGroupRepository->create($data['general']),
            'wholesale' => $this->customerGroupRepository->create($data['wholesale'])
        ];
    }

    /**
     * Prepare Attribute Data
     */
    public function prepareAttributeData()
    {
        $companyRepository = Company::getCurrent();

        $sku = ['code' => 'sku','admin_name' => 'SKU','type' => 'text','validation' => NULL,'position' => '1','is_required' => '1','is_unique' => '1','value_per_locale' => '0','value_per_channel' => '0','is_filterable' => '0','is_configurable' => '0','is_user_defined' => '0','is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'SKU']];

        $this->attributeRepository->create($sku);

        $name = ['code' => 'name', 'admin_name' => 'Name', 'type' => 'text', 'validation' => NULL, 'position' => '2', 'is_required' => '1', 'is_unique' => '0', 'value_per_locale' => '1', 'value_per_channel' => '1', 'is_filterable' => '0', 'is_configurable' => '0', 'is_comparable' => '1', 'is_user_defined' => '0', 'is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id,'en' => ['name' => 'Name']];

        $this->attributeRepository->create($name);

        $url_key = ['code' => 'url_key', 'admin_name' => 'URL Key', 'type' => 'text', 'validation' => NULL, 'position' => '3', 'is_required' => '1', 'is_unique' => '1', 'value_per_locale' => '0', 'value_per_channel' => '0', 'is_filterable' => '0', 'is_configurable' => '0', 'is_user_defined' => '0', 'is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'URL Key']];

        $this->attributeRepository->create($url_key);

        $taxCategoryId = ['code' => 'tax_category_id', 'admin_name' => 'Tax Category', 'type' => 'select', 'validation' => NULL, 'position' => '4', 'is_required' => '0', 'is_unique' => '0', 'value_per_locale' => '0', 'value_per_channel' => '1', 'is_filterable' => '0', 'is_configurable' => '0', 'is_user_defined' => '0', 'is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Tax Category']];

        $this->attributeRepository->create($taxCategoryId);

        $new = ['code' => 'new', 'admin_name' => 'New', 'type' => 'boolean', 'validation' => NULL, 'position' => '5', 'is_required' => '0', 'is_unique' => '0', 'value_per_locale' => '0', 'value_per_channel' => '0', 'is_filterable' => '0','is_configurable' => '0', 'is_user_defined' => '0', 'is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'New']];

        $this->attributeRepository->create($new);

        $featured = ['id' => '6', 'code' => 'featured', 'admin_name' => 'Featured', 'type' => 'boolean', 'validation' => NULL, 'position' => '6', 'is_required' => '0', 'is_unique' => '0', 'value_per_locale' => '0', 'value_per_channel' => '0', 'is_filterable' => '0', 'is_configurable' => '0', 'is_user_defined' => '0', 'is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Featured']];

        $this->attributeRepository->create($featured);

        $visibleIndividually = ['code' => 'visible_individually','admin_name' => 'Visible Individually','type' => 'boolean','validation' => NULL,'position' => '7','is_required' => '1','is_unique' => '0','value_per_locale' => '0','value_per_channel' => '0','is_filterable' => '0','is_configurable' => '0','is_user_defined' => '0','is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Visible Individually']];

        $this->attributeRepository->create($visibleIndividually);

        $status = ['code' => 'status','admin_name' => 'Status','type' => 'boolean','validation' => NULL,'position' => '8','is_required' => '1','is_unique' => '0','value_per_locale' => '0','value_per_channel' => '0','is_filterable' => '0','is_configurable' => '0','is_user_defined' => '0','is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Status']];

        $this->attributeRepository->create($status);

        $shortDesc = ['code' => 'short_description','admin_name' => 'Short Description','type' => 'textarea','validation' => NULL,'position' => '9','is_required' => '1','is_unique' => '0','value_per_locale' => '1','value_per_channel' => '1','is_filterable' => '0','is_configurable' => '0','is_user_defined' => '0','is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Short Description']];

        $this->attributeRepository->create($shortDesc);

        $desc = ['code' => 'description','admin_name' => 'Description','type' => 'textarea','validation' => NULL,'position' => '10','is_required' => '1','is_unique' => '0','value_per_locale' => '1','value_per_channel' => '1','is_filterable' => '0','is_configurable' => '0', 'is_comparable' => '1','is_user_defined' => '0','is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Description']];

        $this->attributeRepository->create($desc);

        $price = ['code' => 'price','admin_name' => 'Price','type' => 'price','validation' => 'decimal','position' => '11','is_required' => '1','is_unique' => '0','value_per_locale' => '0','value_per_channel' => '0','is_filterable' => '1','is_configurable' => '0', 'is_comparable' => '1','is_user_defined' => '0','is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Price']];

        $this->attributeRepository->create($price);

        $cost = ['code' => 'cost','admin_name' => 'Cost','type' => 'price','validation' => 'decimal','position' => '12','is_required' => '0','is_unique' => '0','value_per_locale' => '0','value_per_channel' => '1','is_filterable' => '0','is_configurable' => '0','is_user_defined' => '1','is_visible_on_front' => '0', 'use_in_flat' => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Cost']];

        $this->attributeRepository->create($cost);

        $specialPrice = ['code' => 'special_price','admin_name' => 'Special Price','type' => 'price','validation' => 'decimal','position' => '13','is_required' => '0','is_unique' => '0','value_per_locale' => '0','value_per_channel' => '0','is_filterable' => '0','is_configurable' => '0','is_user_defined' => '0','is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Special Price']];

        $this->attributeRepository->create($specialPrice);

        $specialFrom = ['code' => 'special_price_from','admin_name' => 'Special Price From','type' => 'date','validation' => NULL,'position' => '14','is_required' => '0','is_unique' => '0','value_per_locale' => '0','value_per_channel' => '1','is_filterable' => '0','is_configurable' => '0','is_user_defined' => '0','is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Special Price From']];

        $this->attributeRepository->create($specialFrom);

        $specialTo = ['code' => 'special_price_to','admin_name' => 'Special Price To','type' => 'date','validation' => NULL,'position' => '15','is_required' => '0','is_unique' => '0','value_per_locale' => '0','value_per_channel' => '1','is_filterable' => '0','is_configurable' => '0','is_user_defined' => '0','is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Special Price To']];

        $this->attributeRepository->create($specialTo);

        $metaTitle = ['code' => 'meta_title','admin_name' => 'Meta Title','type' => 'textarea','validation' => NULL,'position' => '16','is_required' => '0','is_unique' => '0','value_per_locale' => '1','value_per_channel' => '1','is_filterable' => '0','is_configurable' => '0','is_user_defined' => '0','is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Meta Title']];

        $this->attributeRepository->create($metaTitle);

        $metaKeywords = ['code' => 'meta_keywords','admin_name' => 'Meta Keywords','type' => 'textarea','validation' => NULL,'position' => '17','is_required' => '0','is_unique' => '0','value_per_locale' => '1','value_per_channel' => '1','is_filterable' => '0', 'is_configurable' => '0','is_user_defined' => '0','is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Meta Keywords']];

        $this->attributeRepository->create($metaKeywords);

        $metaDesc = ['code' => 'meta_description','admin_name' => 'Meta Description','type' => 'textarea','validation' => NULL, 'position' => '18','is_required' => '0','is_unique' => '0','value_per_locale' => '1','value_per_channel' => '1','is_filterable' => '0','is_configurable' => '0','is_user_defined' => '1','is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Meta Description']];

        $this->attributeRepository->create($metaDesc);

        $width = ['code' => 'width','admin_name' => 'Width','type' => 'text','validation' => 'decimal','position' => '19','is_required' => '0','is_unique' => '0','value_per_locale' => '0','value_per_channel' => '0','is_filterable' => '0','is_configurable' => '0','is_user_defined' => '1','is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Width']];

        $this->attributeRepository->create($width);

        $height = ['code' => 'height','admin_name' => 'Height','type' => 'text','validation' => 'decimal','position' => '20','is_required' => '0','is_unique' => '0','value_per_locale' => '0','value_per_channel' => '0','is_filterable' => '0','is_configurable' => '0','is_user_defined' => '1','is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Height']];

        $this->attributeRepository->create($height);

        $depth = ['code' => 'depth','admin_name' => 'Depth','type' => 'text','validation' => 'decimal','position' => '21','is_required' => '0','is_unique' => '0','value_per_locale' => '0','value_per_channel' => '0','is_filterable' => '0','is_configurable' => '0','is_user_defined' => '1','is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Depth']];

        $this->attributeRepository->create($depth);

        $weight = ['code' => 'weight','admin_name' => 'Weight','type' => 'text','validation' => 'decimal','position' => '22','is_required' => '1','is_unique' => '0','value_per_locale' => '0','value_per_channel' => '0','is_filterable' => '0','is_configurable' => '0','is_user_defined' => '0','is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Weight']];

        $this->attributeRepository->create($weight);

        $color = ['code' => 'color','admin_name' => 'Color','type' => 'select','validation' => NULL,'position' => '23','is_required' => '0','is_unique' => '0','value_per_locale' => '0','value_per_channel' => '0','is_filterable' => '1','is_configurable' => '1','is_user_defined' => '1','is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Color'], 'options' => [
            'option_0' => ['admin_name' => 'Red', 'en' => ['label' => 'Red'], 'sort_order' => '1'],
            'option_1' => ['admin_name' => 'Green', 'en' => ['label' => 'Green'],'sort_order' => '2'],
            'option_2' => ['admin_name' => 'Yellow', 'en' => ['label' => 'Yellow'], 'sort_order' => '3'],
            'option_3' => ['admin_name' => 'Black', 'en' => ['label' => 'Black'], 'sort_order' => '4'],
            'option_4' => ['admin_name' => 'White', 'en' => ['label' => 'White'], 'sort_order' => '5']
        ]];

        $this->attributeRepository->create($color);

        $size = ['code' => 'size','admin_name' => 'Size','type' => 'select','validation' => NULL,'position' => '24','is_required' => '0','is_unique' => '0','value_per_locale' => '0','value_per_channel' => '0','is_filterable' => '1','is_configurable' => '1','is_user_defined' => '1','is_visible_on_front' => '0', 'use_in_flat'   => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Size'], 'options' => [
            'option_0' => ['id' => '6','admin_name' => 'S', 'en' => ['label' => 'S'], 'sort_order' => '1'],
            'option_1' => ['id' => '7','admin_name' => 'M', 'en' => ['label' => 'M'], 'sort_order' => '2'],
            'option_2' => ['id' => '8','admin_name' => 'L', 'en' => ['label' => 'L'], 'sort_order' => '3'],
            'option_3' => ['id' => '9','admin_name' => 'XL', 'en' => ['label' => 'XL'], 'sort_order' => '4']
        ]];

        $this->attributeRepository->create($size);

        $brand = ['code' => 'brand','admin_name' => 'Brand','type' => 'select','validation' => NULL,'position' => '25','is_required' => '0','is_unique' => '0','value_per_locale' => '0','value_per_channel' => '0','is_filterable' => '1','is_configurable' => '0','is_user_defined' => '0','is_visible_on_front' => '1', 'use_in_flat' => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Brand']];

        $this->attributeRepository->create($brand);

        $guest_checkout = ['code' => 'guest_checkout','admin_name' => 'Guest Checkout','type' => 'boolean','validation' => NULL,'position' => '8','is_required' => '1','is_unique' => '0','value_per_locale' => '0','value_per_channel' => '0','is_filterable' => '0','is_configurable' => '0','is_user_defined' => '0','is_visible_on_front' => '0', 'use_in_flat' => '1', 'company_id' => $companyRepository->id, 'en' => ['name' => 'Guest Checkout']];

        $this->attributeRepository->create($guest_checkout);

        Log::info("Info:- prepareAttributeData() created for company " . $companyRepository->domain . ".");

        //prepare attributeFamilyData() move into prepareChannelData(){}

        $this->prepareAttributeGroupData();

        return true;
    }

    /**
     * To prepare the attribute family
     */
    public function prepareAttributeFamilyData()
    {
        $companyRepository = Company::getCurrent();

        $data = [
            'code'              => 'default',
            'name'              => 'Default',
            'status'            => '0',
            'is_user_defined'   => '1',
            'company_id'        => $companyRepository->id
        ];

        Log::info("Info:- prepareAttributeFamilyData() created for company " . $companyRepository->domain . ".");

        return $this->attributeFamilyRepository->create($data);
    }

    /**
     * To prepare the attribute group mappings
     */
    public function prepareAttributeGroupData()
    {
        $companyRepository = Company::getCurrent();

        $attributeFamilyRepository = $this->attributeFamilyRepository->findOneWhere([
            'company_id'    => $companyRepository->id
        ]);

        $attributes = $this->attributeRepository->all();

        $group1 = ['sku', 'name', 'url_key', 'tax_category_id', 'new', 'featured', 'visible_individually', 'status', 'color', 'size', 'brand', 'guest_checkout'];
        $group2 = ['short_description', 'description'];
        $group3 = ['meta_title', 'meta_keywords', 'meta_description'];
        $group4 = ['price', 'cost', 'special_price', 'special_price_from', 'special_price_to'];
        $group5 = ['width', 'height', 'depth', 'weight'];

        // creating group 1
        $attributeGroupRepository = $this->attributeGroupRepository->create([
            'name'                  => 'General',
            'position'              => '1',
            'is_user_defined'       => '0',
            'attribute_family_id'   => $attributeFamilyRepository->id,
            'company_id'            => $companyRepository->id
        ]);

        $i = 1;
        foreach($group1 as $code) {
            $i++;

            foreach ($attributes as $value) {
                if($value->code == $code) {
                    DB::table('attribute_group_mappings')->insert([
                        [
                            'attribute_id'          => $value->id,
                            'attribute_group_id'    => $attributeGroupRepository->id,
                            'position'              => $i
                        ]
                    ]);
                }
            }
        }

        // creating group 2
        $attributeGroupRepository = $this->attributeGroupRepository->create([
            'name'                  => 'Description',
            'position'              => '2',
            'is_user_defined'       => '0',
            'attribute_family_id'   => $attributeFamilyRepository->id,
            'company_id'            => $companyRepository->id
        ]);

        $i = 1;
        foreach($group2 as $code) {
            $i++;

            foreach ($attributes as $value) {
                if($value->code == $code) {
                    DB::table('attribute_group_mappings')->insert([
                        [
                            'attribute_id'          => $value->id,
                            'attribute_group_id'    => $attributeGroupRepository->id,
                            'position'              => $i
                        ]
                    ]);
                }
            }
        }

        // creating group 3
        $attributeGroupRepository = $this->attributeGroupRepository->create([
            'name'                  => 'Meta Description',
            'position'              => '3',
            'is_user_defined'       => '0',
            'attribute_family_id'   => $attributeFamilyRepository->id,
            'company_id'            => $companyRepository->id
        ]);

        $i = 1;
        foreach($group3 as $code) {
            $i++;

            foreach ($attributes as $value) {
                if($value->code == $code) {
                    DB::table('attribute_group_mappings')->insert([
                        [
                            'attribute_id'          => $value->id,
                            'attribute_group_id'    => $attributeGroupRepository->id,
                            'position'              => $i
                        ]
                    ]);
                }
            }
        }

        // creating group 4
        $attributeGroupRepository = $this->attributeGroupRepository->create([
            'name'                  => 'Price',
            'position'              => '4',
            'is_user_defined'       => '0',
            'attribute_family_id'   => $attributeFamilyRepository->id,
            'company_id'            => $companyRepository->id
        ]);

        $i = 1;
        foreach($group4 as $code) {
            $i++;

            foreach ($attributes as $value) {
                if($value->code == $code) {
                    DB::table('attribute_group_mappings')->insert([
                        [
                            'attribute_id'          => $value->id,
                            'attribute_group_id'    => $attributeGroupRepository->id,
                            'position'              => $i
                        ]
                    ]);
                }
            }
        }

        // creating group 5
        $attributeGroupRepository = $this->attributeGroupRepository->create([
            'name'                  => 'Shipping',
            'position'              => '5',
            'is_user_defined'       => '0',
            'attribute_family_id'   => $attributeFamilyRepository->id,
            'company_id'            => $companyRepository->id
        ]);

        $i = 1;
        foreach($group5 as $code) {
            $i++;

            foreach ($attributes as $value) {
                if($value->code == $code) {
                    DB::table('attribute_group_mappings')->insert([
                        [
                            'attribute_id'          => $value->id,
                            'attribute_group_id'    => $attributeGroupRepository->id,
                            'position'              => $i
                        ]
                    ]);
                }
            }
        }

        Log::info("Info:- prepareAttributeGroupData() created for company " . $companyRepository->domain . ".");

        return true;
    }

    /**
     * To prepare the cms pages data for the seller's shop
     */
    public function prepareCMSPagesData()
    {
        $companyRepository = Company::getCurrent();

        $localeRepository = $this->localeRepository->findOneWhere([
            'company_id'    => $companyRepository->id
        ]);

        DB::table('cms_pages')->insert([
            [
                'company_id' => $companyRepository->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        $cmsRepository = DB::table('cms_pages')->where('company_id', $companyRepository->id)->orderBy('id', 'desc')->limit(1)->get()->first();

        DB::table('cms_page_translations')->insert([
            [
                'locale' => $localeRepository->code,
                'cms_page_id' => $cmsRepository->id,
                'company_id' => $companyRepository->id,
                'url_key' => 'about-us',
                'html_content' => '<div class="static-container">
                                   <div class="mb-5">About us page content</div>
                                   </div>',
                'page_title' => 'About Us',
                'meta_title' => 'about us',
                'meta_description' => '',
                'meta_keywords' => 'aboutus'
            ]
        ]);

        DB::table('cms_pages')->insert([
            [
                'company_id' => $companyRepository->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        $cmsRepository = DB::table('cms_pages')->where('company_id', $companyRepository->id)->orderBy('id', 'desc')->limit(1)->get()->first();

        DB::table('cms_page_translations')->insert([
            [
                'locale' => $localeRepository->code,
                'cms_page_id' => $cmsRepository->id,
                'company_id' => $companyRepository->id,
                'url_key' => 'return-policy',
                'html_content' => '<div class="static-container">
                                   <div class="mb-5">Return policy page content</div>
                                   </div>',
                'page_title' => 'Return Policy',
                'meta_title' => 'return policy',
                'meta_description' => '',
                'meta_keywords' => 'return, policy'
            ]
        ]);

        DB::table('cms_pages')->insert([
            [
                'company_id' => $companyRepository->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        $cmsRepository = DB::table('cms_pages')->where('company_id', $companyRepository->id)->orderBy('id', 'desc')->limit(1)->get()->first();

        DB::table('cms_page_translations')->insert([
            [
                'locale' => $localeRepository->code,
                'cms_page_id' => $cmsRepository->id,
                'company_id' => $companyRepository->id,
                'url_key' => 'refund-policy',
                'html_content' => '<div class="static-container">
                                   <div class="mb-5">Refund policy page content</div>
                                   </div>',
                'page_title' => 'Refund Policy',
                'meta_title' => 'Refund policy',
                'meta_description' => '',
                'meta_keywords' => 'refund, policy'
            ]
        ]);

        DB::table('cms_pages')->insert([
            [
                'company_id' => $companyRepository->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        $cmsRepository = DB::table('cms_pages')->where('company_id', $companyRepository->id)->orderBy('id', 'desc')->limit(1)->get()->first();

        DB::table('cms_page_translations')->insert([
            [
                'locale' => $localeRepository->code,
                'cms_page_id' => $cmsRepository->id,
                'company_id' => $companyRepository->id,
                'url_key' => 'terms-conditions',
                'html_content' => '<div class="static-container">
                                   <div class="mb-5">Terms & conditions page content</div>
                                   </div>',
                'page_title' => 'Terms & Conditions',
                'meta_title' => 'Terms & Conditions',
                'meta_description' => '',
                'meta_keywords' => 'term, conditions'
            ]
        ]);

        DB::table('cms_pages')->insert([
            [
                'company_id' => $companyRepository->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        $cmsRepository = DB::table('cms_pages')->where('company_id', $companyRepository->id)->orderBy('id', 'desc')->limit(1)->get()->first();

        DB::table('cms_page_translations')->insert([
            [
                'locale' => $localeRepository->code,
                'cms_page_id' => $cmsRepository->id,
                'company_id' => $companyRepository->id,
                'url_key' => 'terms-of-use',
                'html_content' => '<div class="static-container">
                                   <div class="mb-5">Terms of use page content</div>
                                   </div>',
                'page_title' => 'Terms of use',
                'meta_title' => 'Terms of use',
                'meta_description' => '',
                'meta_keywords' => 'term, use'
            ]
        ]);

        DB::table('cms_pages')->insert([
            [
                'company_id' => $companyRepository->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        $cmsRepository = DB::table('cms_pages')->where('company_id', $companyRepository->id)->orderBy('id', 'desc')->limit(1)->get()->first();

        DB::table('cms_page_translations')->insert([
            [
                'locale' => $localeRepository->code,
                'cms_page_id' => $cmsRepository->id,
                'company_id' => $companyRepository->id,
                'url_key' => 'contact-us',
                'html_content' => '<div class="static-container">
                                   <div class="mb-5">Contact us page content</div>
                                   </div>',
                'page_title' => 'Contact Us',
                'meta_title' => 'Contact Us',
                'meta_description' => '',
                'meta_keywords' => 'contact, us'
            ]
        ]);





        // New Pages according to design

        // Customer Service
        DB::table('cms_pages')->insert([
            [
                'company_id' => $companyRepository->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        $cmsRepository = DB::table('cms_pages')->where('company_id', $companyRepository->id)->orderBy('id', 'desc')->limit(1)->get()->first();

        DB::table('cms_page_translations')->insert([
            [
                'locale' => $localeRepository->code,
                'cms_page_id' => $cmsRepository->id,
                'company_id' => $companyRepository->id,
                'url_key' => 'customer-service',
                'html_content' => '<div class="static-container">
                                   <div class="mb-5">Customer Service page content</div>
                                   </div>',
                'page_title' => 'Customer Service',
                'meta_title' => 'Customer Service',
                'meta_description' => '',
                'meta_keywords' => 'customer,service'
            ]
        ]);


        // Whats New
        DB::table('cms_pages')->insert([
            [
                'company_id' => $companyRepository->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        $cmsRepository = DB::table('cms_pages')->where('company_id', $companyRepository->id)->orderBy('id', 'desc')->limit(1)->get()->first();

        DB::table('cms_page_translations')->insert([
            [
                'locale' => $localeRepository->code,
                'cms_page_id' => $cmsRepository->id,
                'company_id' => $companyRepository->id,
                'url_key' => 'whats-new',
                'html_content' => '<div class="static-container">
                                   <div class="mb-5">Whats New page content</div>
                                   </div>',
                'page_title' => 'Whats New',
                'meta_title' => 'Whats New',
                'meta_description' => '',
                'meta_keywords' => 'Whats,New'
            ]
        ]);


        // Order and Returns
        DB::table('cms_pages')->insert([
            [
                'company_id' => $companyRepository->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        $cmsRepository = DB::table('cms_pages')->where('company_id', $companyRepository->id)->orderBy('id', 'desc')->limit(1)->get()->first();

        DB::table('cms_page_translations')->insert([
            [
                'locale' => $localeRepository->code,
                'cms_page_id' => $cmsRepository->id,
                'company_id' => $companyRepository->id,
                'url_key' => 'order-and-returns',
                'html_content' => '<div class="static-container">
                                   <div class="mb-5">Order and Returns page content</div>
                                   </div>',
                'page_title' => 'Order and Returns',
                'meta_title' => 'Order and Returns',
                'meta_description' => '',
                'meta_keywords' => 'Order, Returns'
            ]
        ]);


        // Payment Policy
        DB::table('cms_pages')->insert([
            [
                'company_id' => $companyRepository->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        $cmsRepository = DB::table('cms_pages')->where('company_id', $companyRepository->id)->orderBy('id', 'desc')->limit(1)->get()->first();

        DB::table('cms_page_translations')->insert([
            [
                'locale' => $localeRepository->code,
                'cms_page_id' => $cmsRepository->id,
                'company_id' => $companyRepository->id,
                'url_key' => 'payment-policy',
                'html_content' => '<div class="static-container">
                                   <div class="mb-5">Payment Policy page content</div>
                                   </div>',
                'page_title' => 'Payment Policy',
                'meta_title' => 'Payment Policy',
                'meta_description' => '',
                'meta_keywords' => 'Payment Policy'
            ]
        ]);


        // Shipping Policy
        DB::table('cms_pages')->insert([
            [
                'company_id' => $companyRepository->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        $cmsRepository = DB::table('cms_pages')->where('company_id', $companyRepository->id)->orderBy('id', 'desc')->limit(1)->get()->first();

        DB::table('cms_page_translations')->insert([
            [
                'locale' => $localeRepository->code,
                'cms_page_id' => $cmsRepository->id,
                'company_id' => $companyRepository->id,
                'url_key' => 'shipping-policy',
                'html_content' => '<div class="static-container">
                                   <div class="mb-5">Shipping Policy page content</div>
                                   </div>',
                'page_title' => 'Shipping Policy',
                'meta_title' => 'Shipping Policy',
                'meta_description' => '',
                'meta_keywords' => 'Shipping Policy'
            ]
        ]);


        // Privacy and Cookies Policy
        DB::table('cms_pages')->insert([
            [
                'company_id' => $companyRepository->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        $cmsRepository = DB::table('cms_pages')->where('company_id', $companyRepository->id)->orderBy('id', 'desc')->limit(1)->get()->first();

        DB::table('cms_page_translations')->insert([
            [
                'locale' => $localeRepository->code,
                'cms_page_id' => $cmsRepository->id,
                'company_id' => $companyRepository->id,
                'url_key' => 'privacy-and-cookies-policy',
                'html_content' => '<div class="static-container">
                                   <div class="mb-5">Privacy and Cookies Policy page content</div>
                                   </div>',
                'page_title' => 'Privacy and Cookies Policy',
                'meta_title' => 'Privacy and Cookies Policy',
                'meta_description' => '',
                'meta_keywords' => 'Privacy and Cookies Policy'
            ]
        ]);




        Log::info("Info:- prepareCMSPagesData() created for company " . $companyRepository->domain . ".");

        return true;
    }

    /**
     * To prepare the Velocity Theme data for the tenant's shop
     */
    public function prepareVelocityData()
    {
        $companyRepository = Company::getCurrent();

        $localeRepository = $this->localeRepository->findOneWhere([
            'company_id'    => $companyRepository->id
        ]);
        
        $data = [
            'company_id'            => $companyRepository->id,
            'locale'                => $localeRepository->code,
            'channel'               => $companyRepository->username,
            'home_page_content'     => "<p>@include('shop::home.advertisements.advertisement-four')@include('shop::home.featured-products') @include('shop::home.advertisements.advertisement-three') @include('shop::home.new-products') @include('shop::home.advertisements.advertisement-two')@include('shop::home.category-products', ['category' => 'fitness-world-".$companyRepository->id."'])@include('shop::home.recent-products')</p>",

            'footer_left_content'   => trans('velocity::app.admin.meta-data.footer-left-raw-content'),

            'footer_middle_content' => 
                '<div class="col-lg-6 col-md-12 col-sm-12 no-padding">
                    <ul type="none">
                        <li><a href="/page/about-us">About Us</a></li>
                        <li><a href="/page/customer-service">Customer Service</a></li>
                        <li><a href="/page/whats-new/">What&rsquo;s New</a></li>
                        <li><a href="/page/contact-us">Contact Us </a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 no-padding">
                    <ul type="none">
                        <li><a href="/page/order-and-returns"> Order and Returns </a></li>
                        <li><a href="/page/payment-policy"> Payment Policy </a></li>
                        <li><a href="/page/shipping-policy"> Shipping Policy</a></li>
                        <li><a href="/page/privacy-and-cookies-policy"> Privacy and Cookies Policy </a></li>
                    </ul>
                </div>',

            'slider'                => 1,

            'subscription_bar_content' => '<div class="social-icons col-lg-6"><a href="https://webkul.com" target="_blank" class="unset" rel="noopener noreferrer"><i class="fs24 within-circle rango-facebook" title="facebook"></i> </a> <a href="https://webkul.com" target="_blank" class="unset" rel="noopener noreferrer"><i class="fs24 within-circle rango-twitter" title="twitter"></i> </a> <a href="https://webkul.com" target="_blank" class="unset" rel="noopener noreferrer"><i class="fs24 within-circle rango-linked-in" title="linkedin"></i> </a> <a href="https://webkul.com" target="_blank" class="unset" rel="noopener noreferrer"><i class="fs24 within-circle rango-pintrest" title="Pinterest"></i> </a> <a href="https://webkul.com" target="_blank" class="unset" rel="noopener noreferrer"><i class="fs24 within-circle rango-youtube" title="Youtube"></i> </a> <a href="https://webkul.com" target="_blank" class="unset" rel="noopener noreferrer"><i class="fs24 within-circle rango-instagram" title="instagram"></i></a></div>',

            'product_policy'        => '<div class="row col-12 remove-padding-margin"><div class="col-lg-4 col-sm-12 product-policy-wrapper"><div class="card"><div class="policy"><div class="left"><i class="rango-van-ship fs40"></i></div> <div class="right"><span class="font-setting fs20">Free Shipping on Order $20 or More</span></div></div></div></div> <div class="col-lg-4 col-sm-12 product-policy-wrapper"><div class="card"><div class="policy"><div class="left"><i class="rango-exchnage fs40"></i></div> <div class="right"><span class="font-setting fs20">Product Replace &amp; Return Available </span></div></div></div></div> <div class="col-lg-4 col-sm-12 product-policy-wrapper"><div class="card"><div class="policy"><div class="left"><i class="rango-exchnage fs40"></i></div> <div class="right"><span class="font-setting fs20">Product Exchange and EMI Available </span></div></div></div></div></div>',
        ];

        Log::info("Info:- prepareVelocityData() created for company " . $companyRepository->domain . ".");

        return $this->velocityMetadataRepository->create($data);
    }

    /**
     * Prepares a default Config data
     */
    public function prepareConfigData()
    {
        $companyRepository = Company::getCurrent();

        $localeRepository = $this->localeRepository->findOneWhere([
            'company_id'    => $companyRepository->id
        ]);

        $data = [
            'channel'   => $companyRepository->username,
            'locale'    => $localeRepository->code,
            'emails'    => [
                'general'   => [
                    'notifications' => [
                        'emails.general.notifications.verification'         => 1,
                        'emails.general.notifications.registration'         => 1,
                        'emails.general.notifications.customer'             => 1,
                        'emails.general.notifications.new-order'            => 1,
                        'emails.general.notifications.new-admin'            => 1,
                        'emails.general.notifications.new-invoice'          => 1,
                        'emails.general.notifications.new-refund'           => 1,
                        'emails.general.notifications.new-shipment'         => 1,
                        'emails.general.notifications.new-inventory-source' => 1,
                        'emails.general.notifications.cancel-order'         => 1,
                    ]
                ]
            ],
            'catalog'   => [
                'products'  => [
                    'guest-checkout'    => [
                        'allow-guest-checkout'  => 1,
                    ],
                    'review'            => [
                        'guest_review'          => 0,
                    ],
                ]
            ],
            'general'  => [
                'general'   => [
                    'email_setting' => [
                        'general.general.email_setting.sender_name' => 'BuyNoir Shop',
                        'general.general.email_setting.shop_email_from' => $companyRepository->username . '@bagshop.com',
                        'general.general.email_setting.admin_name' => 'BuyNoir Admin',
                        'general.general.email_setting.admin_email' => $companyRepository->username . '@bagadmin.com',
                    ]
                ],

                'content'   => [
                    'shop' => [
                        'compare_option'    => [
                            'general.content.shop.compare_option'   => 1,
                        ]
                    ]
                ]
            ],
            'customer' => [
                'settings' => [
                    'social_login' => [
                        'enable_facebook' => [
                            'customer.settings.social_login.enable_facebook' => 1,
                        ],
                        'enable_twitter' => [
                            'customer.settings.social_login.enable_twitter' => 1,
                        ],
                        'enable_google' => [
                            'customer.settings.social_login.enable_google' => 1,
                        ],
                        'enable_linkedin' => [
                            'customer.settings.social_login.enable_linkedin' => 1,
                        ],
                        'enable_github' => [
                            'customer.settings.social_login.enable_github' => 1,
                        ],
                    ]
                ],
                'social_login' => [
                    'facebook' => [
                        'FACEBOOK_CALLBACK_URL' => 'http://' . $companyRepository->domain . '/customer/social-login/facebook/callback',
                    ],
                    'twitter' => [
                        'TWITTER_CALLBACK_URL' => 'http://' . $companyRepository->domain . '/customer/social-login/twitter/callback',
                    ],
                    'google' => [
                        'GOOGLE_CALLBACK_URL' => 'http://' . $companyRepository->domain . '/customer/social-login/google/callback',
                    ],
                    'linkedin' => [
                        'LINKEDIN_CALLBACK_URL' => 'http://' . $companyRepository->domain . '/customer/social-login/linkedin/callback',
                    ],
                    'github' => [
                        'GITHUB_CALLBACK_URL' => 'http://' . $companyRepository->domain . '/customer/social-login/github/callback',
                    ],
                ],
            ]
        ];
        
        Log::info("Info:- prepareConfigData() created for company " . $companyRepository->domain . ".");

        return $this->coreConfigRepository->create($data);
    }

    /**
     * It will store a check in the companies
     * that all the necessary data had been
     * inserted successfully or not
     *
     */
    public function setInstallationCompleteParam()
    {
        $companyRepository = Company::getCurrent();

        $companyRepository->more_info = json_encode([
            'company_created'   => true,
            'seeded'            => true
        ]);

        $companyRepository->save();

        Log::info("Info:- setInstallationCompleteParam() complated for company " . $companyRepository->domain . ".");

        return $companyRepository;
    }
}