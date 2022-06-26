<!DOCTYPE html>
<html lang="en">
    <head>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="AGplxhn2"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-K75HRNBN0Q"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-K75HRNBN0Q');
        </script>
        <title>@yield('title_page')</title>
        @yield('private_link')
        @include('client.template.include.head')
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    <body>
        <!-- mobile menu -->
        <div class="mercado-clone-wrap">
            @include('client.template.include.mobile_menu')
        </div>
        <!-- end mobile menu -->

        <!--header-->
        <header id="header" class="header header-style-1">
            @include('client.template.include.header')
        </header>
        <!--end header-->

        <!--main content page-->
        @yield('main_content_page')
        <!--end main content page-->
        <!--footer-->
        <footer id="footer">
            @include('client.template.include.footer')
        </footer>

        <!--end footer-->
        <!--scripts js-->

        @include('client.template.include.scripts_common')
        @yield('private_scripts')

        <!--end scripts js-->

        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="cYDc1Pqx"></script>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6180dd5c61f84693"></script>

        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/61a97f41187037343b0b612f/1flv1i74h';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
        <script src="/dist/js/pages/client/form.js"></script>
    </body>
</html>
