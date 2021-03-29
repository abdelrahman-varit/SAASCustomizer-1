<header class="sticky-header" v-if="!isMobile()">
    <div class="row">
        <div class="container">
            <div class="row velocity-divide-page py-4">
                <logo-component></logo-component>
                <searchbar-component></searchbar-component>
            </div>
        </div>
    </div>
</header>

@push('scripts')
    <script type="text/javascript">
        (() => {
            document.addEventListener('scroll', e => {
                scrollPosition = Math.round(window.scrollY);

                if (scrollPosition > 50){
                    document.querySelector('header').classList.add('header-shadow');
                } else {
                    document.querySelector('header').classList.remove('header-shadow');
                }
            });
        })()
    </script>
@endpush
