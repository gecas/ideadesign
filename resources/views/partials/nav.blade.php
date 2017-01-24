    @if (Request::path() == App::getLocale()) 
     <header class="main-header">
    @else
      <header>
    @endif
    <style>
      .nav-header{
        width: 50%;
        margin: 0 auto;
        display: flex;
        position: relative;
        align-items: center;
        padding: 1em 0;
        justify-content: space-around;
      }
    </style>
          <div class="logo-wrapper">
            <div class="logo">
            <a href="/"><img src="/images/ideadesign.png"></a>
            </div>
            <div class="burger-menu">
              <div class="burger"></div>
            </div>
          </div>
               <nav>
               

            <ul>
            @if (Request::path() == App::getLocale())   
             <li><a href="/{!! App::getLocale() !!}/tapetai" data-toggle="3" class="toggle noredirect">@lang('menu.tapetai')
                    <div class="hover"></div></a></li>
                <li><a href="/{!! App::getLocale() !!}/audiniai" data-toggle="5" class="toggle noredirect">@lang('menu.audiniai')
                    <div class="hover"></div></a></li>
                <li><a href="/{!! App::getLocale() !!}/parketlentes" data-toggle="4" class="toggle noredirect">@lang('menu.parketlentes')
                    <div class="hover"></div></a></li>
                <li><a href="/{!! App::getLocale() !!}/aksesuarai" data-toggle="6" class="toggle noredirect">@lang('menu.aksesuarai')
                    <div class="hover"></div></a></li>
                <li><a href="/{!! App::getLocale() !!}/naujienos" data-toggle="2" class="toggle noredirect">@lang('menu.naujienos')
                    <div class="hover"></div></a></li>
                <li><a href="/{!! App::getLocale() !!}/kontaktai" data-toggle="1" class="toggle noredirect">@lang('menu.kontaktai')
                    <div class="hover"></div></a></li>
                    
                
              @else
              <li><a href="/{!! App::getLocale() !!}/tapetai" data-toggle="3" class="toggle">@lang('menu.tapetai')
                    <div class="hover"></div></a></li>
                <li><a href="/{!! App::getLocale() !!}/audiniai" data-toggle="5" class="toggle">@lang('menu.audiniai')
                    <div class="hover"></div></a></li>
                <li><a href="/{!! App::getLocale() !!}/parketlentes" data-toggle="4" class="toggle">@lang('menu.parketlentes')
                    <div class="hover"></div></a></li>
                <li><a href="/{!! App::getLocale() !!}/aksesuarai" data-toggle="6" class="toggle">@lang('menu.aksesuarai')
                    <div class="hover"></div></a></li>
                <li><a href="/{!! App::getLocale() !!}/naujienos" data-toggle="2" class="toggle">@lang('menu.naujienos')
                    <div class="hover"></div></a></li>
                <li><a href="/{!! App::getLocale() !!}/kontaktai" data-toggle="1" class="toggle">@lang('menu.kontaktai')
                    <div class="hover"></div></a></li>
            @endif
            </ul>
            <div class="nav-header">
                @foreach(Config::get('localization.supported-locales') as $locale)
                      <a href="{{ localization()->getLocalizedURL($locale) }}"><img src="/images/{!! $locale !!}.png" width="25px" height="15px" alt="" hreflang="{{ $locale  }}"></a>     
                @endforeach                  
            </div>
            </nav>
          <div class="nav-footer">
                <a href="https://www.facebook.com/ideadesign.lt/?fref=ts"><i class="fa fa-facebook-square"></i></a>
                <a href="{!! url('kontaktai') !!}"><i class="fa fa-envelope"></i></a>
                <a href="https://www.instagram.com/ideadesignlt/"><i class="fa fa-instagram"></i></a>
          </div>
</header>