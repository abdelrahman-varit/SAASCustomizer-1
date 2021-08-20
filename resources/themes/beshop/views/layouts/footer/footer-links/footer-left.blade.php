<div class="col-lg-4">
    <div class="footer_top_widget">
        <h4 class="footer_top_widget__heading">Other Links</h4>
        <div class="row">
            @if ($velocityMetaData)
                {!! DbView::make($velocityMetaData)->field('footer_middle_content')->render() !!}
            @else
                <div class="col">
                    <ul class="list-unstyled m-0">
                        <li class="mt-1"><a href="https://sellnoir.com/about-us/company-profile/"><i class="fas fa-minus"></i> About Us</a></li>
                        <li class="mt-1"><a href="https://sellnoir.com/about-us/company-profile/"><i class="fas fa-minus"></i> Customer Service</a></li>
                        <li class="mt-1"><a href="https://sellnoir.com/about-us/company-profile/"><i class="fas fa-minus"></i> What's New</a></li>
                        <li class="mt-1"><a href="https://sellnoir.com/about-us/company-profile/"><i class="fas fa-minus"></i> Contact Us</a></li>
                    </ul>
                </div>
                <div class="col">
                    <ul class="list-unstyled m-0">
                        <li class="mt-1"><a href="https://sellnoir.com/about-us/company-profile/"><i class="fas fa-minus"></i> Order and Returns</a></li>
                        <li class="mt-1"><a href="https://sellnoir.com/about-us/company-profile/"><i class="fas fa-minus"></i> Payment Policy</a></li>
                        <li class="mt-1"><a href="https://sellnoir.com/about-us/company-profile/"><i class="fas fa-minus"></i> Shipping Policy</a></li>
                        <li class="mt-1"><a href="https://sellnoir.com/about-us/company-profile/"><i class="fas fa-minus"></i> Privacy and Cokkies Policy</a></li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>