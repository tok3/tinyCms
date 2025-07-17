@php
if(!isset($page))
    {
        $page = '';
    }
@endphp
<!--begin:Navbar items-->
<ul class="navbar-nav ms-auto">

  <!--begin:landings-->
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle @if($page === 'home')active @endif" href="{{ URL('assan/index.html') }}" role="button"
      data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">xLandings
    </a>
    <div class="dropdown-menu dropdown-menu-md dropdown-menu-start py-0 pe-lg-0">
      <div class="overflow-hidden rounded-end">
        <div class="row mx-0">
          <div class="col-lg-5 position-relative">
            <div class="py-1 py-lg-3 d-lg-flex flex-column">
              <a  href="{{ URL('assan/index.html') }}" class="dropdown-item">Welcome</a>
              <a  href="{{ URL('assan/index-landing-classic.html') }}" class="dropdown-item">Classic Landing</a>
              <a  href="{{ URL('assan/index-landing-creative.html') }}" class="dropdown-item">Creative</a>
              <a  href="{{ URL('assan/index-landing-agency.html') }}" class="dropdown-item">Agency</a>
              <a  href="{{ URL('assan/index-landing-business.html') }}" class="dropdown-item">Business</a>
              <a  href="{{ URL('assan/index-landing-startup.html') }}" class="dropdown-item">Startup</a>
              <a  href="{{ URL('assan/index-landing-consultancy.html') }}" class="dropdown-item">Consultancy</a>
              <a  href="{{ URL('assan/index-landing-saas-webapp.html') }}" class="dropdown-item">Saas WebApp</a>

              <a  href="{{ URL('assan/index-landing-mobile-App.html') }}" class="dropdown-item">Mobile App</a>
              <a  href="{{ URL('assan/index-landing-personal-portfolio.html') }}" class="dropdown-item">Personal Portfolio</a>
            </div>
          </div>
          <!--/.col-->
          <div class="col-lg-7 d-none rounded-end overflow-hidden px-0 d-lg-block position-relative bg-no-repeat bg-cover bg-center"
            style="background-image: url({{ URL('assets/img/960x1140/3.jpg')}})">
            <div class="position-absolute rounded-end w-100 h-100 top-0 start-0 bg-gradient-primary opacity-75">
            </div>
            <div
              class="p-4 d-flex flex-column align-items-center text-center justify-content-center h-100 py-5 position-relative text-white">
              <h5 class="fs-1 mb-4">Build stunning website ease</h5>
              <p class="mb-5 small">Over 7000+ users & 7+ years of regular updates</p>
              <a  href="{{ URL('assan/#!') }}" class="btn btn-white btn-lg">Purchase Now</a>
            </div>
          </div>
          <!--/.col-->
        </div>
        <!--/.row-->
      </div>
    </div>
  </li>
  <!--end:landings-->

  <!--begin:portfolio-->
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle {{ $page === 'portfolio' ? 'active' : '' }} href="{{ URL('assan/#') }}" role="button"
      data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside">Portfolio
    </a>
    <div class="dropdown-menu">
      <div class="dropend">
        <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" href="{{ URL('assan/#') }}">Classic</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ URL('assan/portfolio-classic-2-col.html') }}">2 Col</a>
          <a class="dropdown-item" href="{{ URL('assan/portfolio-classic-3-col.html') }}">3 Col</a>
          <a class="dropdown-item" href="{{ URL('assan/portfolio-classic-4-col.html') }}">4 Col</a>
          <a class="dropdown-item" href="{{ URL('assan/portfolio-classic-masonry.html') }}">Masonry</a>
        </div>
      </div>
      <div class="dropend">
        <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" href="{{ URL('assan/#') }}">Grid
          Overlay</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ URL('assan/portfolio-grid-overlay-2-col.html') }}">2 Col</a>
          <a class="dropdown-item" href="{{ URL('assan/portfolio-grid-overlay-3-col.html') }}">3 Col</a>
          <a class="dropdown-item" href="{{ URL('assan/portfolio-grid-overlay-4-col.html') }}">4 Col</a>
          <a class="dropdown-item" href="{{ URL('assan/portfolio-grid-overlay-masonry.html') }}">Masonry</a>
        </div>
      </div>
      <div class="dropend">
        <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" href="{{ URL('assan/#') }}">Full
          width</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ URL('assan/portfolio-full-width-3-col.html') }}">3 Col</a>
          <a class="dropdown-item" href="{{ URL('assan/portfolio-full-width-4-col.html') }}">4 Col</a>
          <a class="dropdown-item" href="{{ URL('assan/portfolio-full-width-masonry.html') }}">Masonry</a>
        </div>
      </div>
      <div class="dropend">
        <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" href="{{ URL('assan/#') }}">Project
          Layouts</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ URL('assan/portfolio-case-study.html') }}">Case Study</a>
          <a class="dropdown-item" href="{{ URL('assan/portfolio-single-classic.html') }}">classic</a>
        </div>
      </div>
    </div>
  </li>
  <!--end:portfolio-->

  <!--begin:blog-->
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle {{ $page === 'blog' ? 'active' : '' }}" href="{{ URL('assan/#') }}" role="button"
      data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside">Blog
    </a>
    <div class="dropdown-menu">
      <div class="dropend">
        <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" href="{{ URL('assan/#') }}">Blog
          Layouts</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ URL('assan/blog-classic.html') }}">Blog classic</a>
          <a class="dropdown-item" href="{{ URL('assan/blog-standard.html') }}">Blog standard</a>
          <a class="dropdown-item" href="{{ URL('assan/blog-masonry.html') }}">Blog Masonry</a>
          <a class="dropdown-item" href="{{ URL('assan/blog-sidebar.html') }}">Blog Sidebar</a>
          <a class="dropdown-item" href="{{ URL('assan/blog-magazine.html') }}">Blog magazine</a>
        </div>
      </div>
      <div class="dropend">
        <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" href="{{ URL('assan/#') }}">Article
          Layouts</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ URL('assan/blog-article-basic.html') }}">Basic</a>
          <a class="dropdown-item" href="{{ URL('assan/blog-article-video.html') }}">Video</a>
          <a class="dropdown-item" href="{{ URL('assan/blog-article-gallery.html') }}">Gallery</a>
          <a class="dropdown-item" href="{{ URL('assan/blog-article-parallax.html') }}">Parallax
            Header</a>
        </div>
      </div>
    </div>
  </li>
  <!--end:blog-->

  <!--begin:pages-->
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle {{ $page === 'pages' ? 'active' : '' }}" href="{{ URL('assan/#') }}" role="button"
      data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside">Pages
    </a>
    <div class="dropdown-menu">
      <div class="dropend">
        <a class="dropdown-item dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" href="{{ URL('assan/#') }}">About</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ URL('assan/page-about.html') }}">About Company</a>
          <a class="dropdown-item" href="{{ URL('assan/page-about-modern.html') }}">About modern</a>
          <a class="dropdown-item" href="{{ URL('assan/page-team.html') }}">Our Team</a>
        </div>
      </div>
      <div class="dropend">
        <a class="dropdown-item dropdown-toggle" href="{{ URL('assan/#') }}" aria-expanded="false" data-bs-toggle="dropdown">Services</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ URL('assan/page-services.html') }}">Services</a>
          <a class="dropdown-item" href="{{ URL('assan/page-services-modern.html') }}">Services
            Modern</a>
        </div>
      </div>
      <div class="dropend">
        <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" href="{{ URL('assan/#') }}">Career</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ URL('assan/page-careers.html') }}">careers</a>
          <a class="dropdown-item" href="{{ URL('assan/page-career-single.html') }}">career single</a>
        </div>
      </div>
      <div class="dropend">
        <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" href="{{ URL('assan/#') }}">Customers</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ URL('assan/page-customers.html') }}">Customers</a>
          <a class="dropdown-item" href="{{ URL('assan/page-customer-story.html') }}">Customer Story</a>
        </div>
      </div>
      <div class="dropend">
        <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" href="{{ URL('assan/#') }}">Account</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ URL('assan/page-profile.html') }}">Profile</a>
          <a class="dropdown-item" href="{{ URL('assan/page-account-signin.html') }}">Sign In</a>
          <a class="dropdown-item" href="{{ URL('assan/page-account-signin-alt.html') }}">Sign In alt</a>
          <a class="dropdown-item" href="{{ URL('assan/page-account-signup.html') }}">Sign Up</a>
          <a class="dropdown-item" href="{{ URL('assan/page-account-signup-alt.html') }}">Sign Up Alt</a>
          <a class="dropdown-item" href="{{ URL('assan/page-account-forget-password.html') }}">Forget Password</a>

        </div>
      </div>
      <div class="dropend">
        <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" href="{{ URL('assan/#') }}">Misc</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ URL('assan/test-start-neu.html') }}">Aktion Barrierefrei Custom Cards</a>
          <a class="dropdown-item" href="{{ URL('assan/page-misc-error-404.html') }}">Error 404</a>
          <a class="dropdown-item" href="{{ URL('assan/page-misc-coming-soon.html') }}">Coming Soon</a>
          <a class="dropdown-item" href="{{ URL('assan/page-misc-maintenance.html') }}">Maintenance</a>
          <a class="dropdown-item" href="{{ URL('assan/page-misc-success-message.html') }}">Success Message</a>
          <a class="dropdown-item" href="{{ URL('assan/page-misc-policy.html') }}">Privacy Policy</a>
        </div>
      </div>
      <a class="dropdown-item" href="{{ URL('assan/page-pricing.html') }}">Pricing Plans</a>
      <a class="dropdown-item" href="{{ URL('assan/page-faq.html') }}">Faqs</a>
      <a class="dropdown-item" href="{{ URL('assan/page-knowladge-base.html') }}">Knowladge Base</a>
    </div>
  </li>
  <!--end:pages-->

  <!--begin:components-->
  <li class="nav-item dropdown position-lg-static">
    <a class="nav-link dropdown-toggle {{ $page === 'components' ? 'active' : '' }}" href="{{ URL('assan/#') }}" role="button"
      data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Components
    </a>
    <div class="dropdown-menu dropdown-menu-fw px-lg-0">
     <div class="dropdown-scroll-lg">
      <div class="row mx-lg-0 justify-content-lg-around">
        <!--Dropdown-grid-Col-->
        <div class="col-lg-3">
          <div class="h-100">
            <div>
              <a class="dropdown-item" href="{{ URL('assan/component-accordion.html') }}">Accordion</a>
              <a class="dropdown-item" href="{{ URL('assan/component-alerts.html') }}">Alerts</a>
              <a class="dropdown-item" href="{{ URL('assan/component-animations.html') }}">Animations</a>
              <a class="dropdown-item" href="{{ URL('assan/component-avatar.html') }}">Avatar</a>
              <a class="dropdown-item" href="{{ URL('assan/component-breadcrumb.html') }}">Breadcrumb</a>
              <a class="dropdown-item" href="{{ URL('assan/component-badge.html') }}">Badge</a>
              <a class="dropdown-item" href="{{ URL('assan/component-blockquote.html') }}">Blockquote</a>
              <a class="dropdown-item" href="{{ URL('assan/component-buttons.html') }}">Buttons</a>
              <a class="dropdown-item" href="{{ URL('assan/component-border-shadow.html') }}">Border & Shadow</a>
              <a class="dropdown-item" href="{{ URL('assan/component-card-image.html') }}">card image</a>
              <a class="dropdown-item" href="{{ URL('assan/component-card-icon.html') }}">card icon</a>
              <a class="dropdown-item" href="{{ URL('assan/component-call-to-action.html') }}">Call to action</a>
              <a class="dropdown-item" href="{{ URL('assan/component-bs-carousel.html') }}">Carousel bootstrap</a>
              <a class="dropdown-item" href="{{ URL('assan/component-colors.html') }}">Colors</a>
              <a class="dropdown-item" href="{{ URL('assan/component-collapse.html') }}">Collapse</a>
              <a class="dropdown-item" href="{{ URL('assan/component-cookies.html') }}">Cookies</a>
              <a class="dropdown-item" href="{{ URL('assan/component-cursor.html') }}">Cursor</a>
            </div>
          </div>
        </div>

        <!--Dropdown-grid-Col-->
        <div class="col-lg-3">
          <div class="h-100">
            <div>
              <a class="dropdown-item" href="{{ URL('assan/component-count-down.html') }}">Countdown</a>
              <a class="dropdown-item" href="{{ URL('assan/component-counteup.html') }}">Countup</a>
              <a class="dropdown-item" href="{{ URL('assan/component-clients.html') }}">Clients</a>
              <a class="dropdown-item" href="{{ URL('assan/component-dropdowns.html') }}">Dropdown</a>
              <a class="dropdown-item" href="{{ URL('assan/component-dropdown-grid.html') }}">Dropdown Grid</a>
              <a class="dropdown-item" href="{{ URL('assan/component-form-components.html') }}">Form components</a>
              <a class="dropdown-item" href="{{ URL('assan/component-form-select.html') }}">Form Select</a>
              <a class="dropdown-item" href="{{ URL('assan/component-form-autosize.html') }}">Form Autosize</a>
              <a class="dropdown-item" href="{{ URL('assan/component-form-steps.html') }}">Form Steps</a>
              <a class="dropdown-item" href="{{ URL('assan/component-form-layouts.html') }}">Form Layouts</a>
              <a class="dropdown-item" href="{{ URL('assan/component-form-quill-editor.html') }}">Form editor</a>
              <a class="dropdown-item" href="{{ URL('assan/component-form-flatpicker.html') }}">Form flatpicker</a>
              <a class="dropdown-item" href="{{ URL('assan/component-form-validation.html') }}">Form validation</a>
              <a class="dropdown-item" href="{{ URL('assan/component-grid-system.html') }}">Grid system</a>
              <a class="dropdown-item" href="{{ URL('assan/component-gsap-reveal.html') }}">Gsap Reveal</a>
              <a class="dropdown-item" href="{{ URL('assan/component-icons-bootstrap.html') }}">Icons Bootstrap</a>
              <a class="dropdown-item" href="{{ URL('assan/component-icons-boxicons.html') }}">Boxicons</a>
            </div>
          </div>
        </div>
        <!--Dropdown-grid-Col-->
        <div class="col-lg-3">
          <div class="h-100">
            <div>

              <a class="dropdown-item" href="{{ URL('assan/component-iconsmind.html') }}">Iconsmind</a>
              <a class="dropdown-item" href="{{ URL('assan/component-icons-social-brands.html') }}">Icons Social</a>
              <a class="dropdown-item" href="{{ URL('assan/component-isotope-filter.html') }}">Isotope filter</a>
              <a class="dropdown-item" href="{{ URL('assan/component-lightbox.html') }}">Lightbox</a>
              <a class="dropdown-item" href="{{ URL('assan/component-list.html') }}">List</a>
              <a class="dropdown-item" href="{{ URL('assan/component-link.html') }}">Link</a>
              <a class="dropdown-item" href="{{ URL('assan/component-modal.html') }}">Modal</a>
              <a class="dropdown-item" href="{{ URL('assan/component-masonry.html') }}">Masonry</a>
              <a class="dropdown-item" href="{{ URL('assan/component-map-box.html') }}">Map</a>
              <a class="dropdown-item" href="{{ URL('assan/component-navs.html') }}">Navs</a>
              <a class="dropdown-item" href="{{ URL('assan/component-navbar.html') }}">Navbar</a>
              <a class="dropdown-item" href="{{ URL('assan/component-offcanvas.html') }}">Offcanvas</a>
              <a class="dropdown-item" href="{{ URL('assan/component-pagination.html') }}">Pagination</a>
              <a class="dropdown-item" href="{{ URL('assan/component-progress.html') }}">Progress</a>
              <a class="dropdown-item" href="{{ URL('assan/component-popover.html') }}">Popover</a>
              <a class="dropdown-item" href="{{ URL('assan/component-page-header.html') }}">Page Header</a>
              <a class="dropdown-item" href="{{ URL('assan/component-parallax.html') }}">Parallax</a>
            </div>
          </div>
        </div>
        <!--Dropdown-grid-Col-->
        <div class="col-lg-3">
          <div class="h-100">
            <div>

              <a class="dropdown-item" href="{{ URL('assan/component-pricing.html') }}">Pricing</a>
              <a class="dropdown-item" href="{{ URL('assan/component-swiper-slider.html') }}">Swiper slider</a>
              <a class="dropdown-item" href="{{ URL('assan/component-scroll-spy.html') }}">Scroll spy</a>
              <a class="dropdown-item" href="{{ URL('assan/component-spinners.html') }}">Spinners</a>
              <a class="dropdown-item" href="{{ URL('assan/component-shapes-dividers.html') }}">Shapes & dividers</a>
              <a class="dropdown-item" href="{{ URL('assan/component-tabbbed-content.html') }}">Tabbed Content</a>
              <a class="dropdown-item" href="{{ URL('assan/component-tables.html') }}">Tables</a>
              <a class="dropdown-item" href="{{ URL('assan/component-toast.html') }}">Toast</a>
              <a class="dropdown-item" href="{{ URL('assan/component-tooltip.html') }}">Tooltip</a>
              <a class="dropdown-item" href="{{ URL('assan/component-testimonials.html') }}">Testimonials</a>
              <a class="dropdown-item" href="{{ URL('assan/component-timeline.html') }}">Timeline</a>
              <a class="dropdown-item" href="{{ URL('assan/component-typed-text.html') }}">Typed Text</a>
              <a class="dropdown-item" href="{{ URL('assan/component-typography.html') }}">Typography</a>
              <a class="dropdown-item" href="{{ URL('assan/component-utility-classes.html') }}">Utility classes</a>
              <a class="dropdown-item" href="{{ URL('assan/component-video-plyr.html') }}">Video Player</a>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
  </li>
  <!--end:components-->

  <!--begin:features-->
  <li class="nav-item dropdown position-lg-static">
    <a class="nav-link dropdown-toggle {{ $page === 'features' ? 'active' : '' }}" href="{{ URL('assan/#') }}" role="button"
      data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Features
    </a>
    <div class="dropdown-menu dropdown-menu-fw px-lg-0">
      <div class="dropdown-scroll-lg">
        <div class="row mx-lg-0">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <h5 class="dropdown-header pt-3">
              Headers Styles <span class="badge ms-2 bg-info">25+</span></h5>
            <div class="row g-0">
              <div class="col-lg-6">
                <a  href="{{ URL('assan/header-default.html') }}" class="dropdown-item">Default</a>
                <a  href="{{ URL('assan/header-info-bar.html') }}" class="dropdown-item">info bar</a>
                <a  href="{{ URL('assan/header-info-bar-2.html') }}" class="dropdown-item">info bar 2</a>
                <a  href="{{ URL('assan/header-no-navbar.html') }}" class="dropdown-item">No Navbar</a>
                <a  href="{{ URL('assan/header-transparent.html') }}" class="dropdown-item">Transparent</a>
                <a  href="{{ URL('assan/header-absolute-top.html') }}" class="dropdown-item">Absolute top</a>
                <a  href="{{ URL('assan/header-fixed-top.html') }}" class="dropdown-item">Fixed top</a>
                <a  href="{{ URL('assan/header-center-logo.html') }}" class="dropdown-item">Center logo</a>
                <a  href="{{ URL('assan/header-sticky-down.html') }}" class="dropdown-item">Sticky down</a>
                <a  href="{{ URL('assan/header-sticky-up.html') }}" class="dropdown-item">Sticky up</a>
                <a  href="{{ URL('assan/header-sticky-fixed.html') }}" class="dropdown-item">Sticky fixed</a>
                <a  href="{{ URL('assan/header-sticky-boxed.html') }}" class="dropdown-item">Sticky Boxed</a>
                <a  href="{{ URL('assan/header-full-screen.html') }}" class="dropdown-item">Full screen</a>
                <a  href="{{ URL('assan/header-login.html') }}" class="dropdown-item">Login</a>
                <a  href="{{ URL('assan/header-logged-in.html') }}" class="dropdown-item">Logged In</a>
              </div>
              <!--/.col-sm-6-->
              <div class="col-lg-6">
                <a  href="{{ URL('assan/header-search-bar.html') }}" class="dropdown-item">Search</a>
                <a  href="{{ URL('assan/header-search-bar-2.html') }}" class="dropdown-item">Search 2</a>
                <a  href="{{ URL('assan/header-search-bar-3.html') }}" class="dropdown-item">Search 3</a>

                <a  href="{{ URL('assan/header-search-with-icons.html') }}" class="dropdown-item">Icons</a>
                <a  href="{{ URL('assan/header-shopping-cart.html') }}" class="dropdown-item">Shopping Cart</a>
                <a  href="{{ URL('assan/header-shopping-cart-2.html') }}" class="dropdown-item">Shopping Cart 2</a>
                <a  href="{{ URL('assan/header-offcanvas.html') }}" class="dropdown-item">offcanvas</a>
                <a  href="{{ URL('assan/header-offcanvas-collapse.html') }}"
                  class="dropdown-item position-relative text-truncate pe-4">offcanvas collapse</a>
                <div class="dropdown-divider mx-3"></div>
                <div class="dropdown-header">Footer Styles <span class="badge ms-2 bg-info">9+</span></div>
                <a  href="{{ URL('assan/footer-1.html') }}" class="dropdown-item">Footer 1</a>
                <a  href="{{ URL('assan/footer-2.html') }}" class="dropdown-item">Footer 2</a>
                <a  href="{{ URL('assan/footer-3.html') }}" class="dropdown-item">Footer 3</a>
                <a  href="{{ URL('assan/footer-4.html') }}" class="dropdown-item">Footer 4</a>
                <a  href="{{ URL('assan/footer-5.html') }}" class="dropdown-item">Footer 5</a>
                <a  href="{{ URL('assan/footer-6.html') }}" class="dropdown-item">Footer 6</a>
                <a  href="{{ URL('assan/footer-7.html') }}" class="dropdown-item">Footer 7</a>
                <a  href="{{ URL('assan/footer-8.html') }}" class="dropdown-item">Footer 8</a>
                <a  href="{{ URL('assan/footer-9.html') }}" class="dropdown-item">Footer 9</a>
              </div>
            </div>
            <!--/.row-->
          </div>
          <!--/.End col-->
          <div class="col-lg-5 mb-4 mb-lg-0">
            <h5 class="dropdown-header pt-3">
              Hero Covers Slider</h5>
            <div class="row">
              <div class="col-lg-6">
                <a  href="{{ URL('assan/hero-simple.html') }}" class="dropdown-item">Hero Simple</a>
                <a  href="{{ URL('assan/hero-parallax.html') }}" class="dropdown-item">Hero Parallax</a>
                <a  href="{{ URL('assan/hero-parallax-element.html') }}" class="dropdown-item"> Parallax Element</a>
                <a  href="{{ URL('assan/hero-fullscreen.html') }}" class="dropdown-item">Hero Fullscreen</a>
                <a  href="{{ URL('assan/hero-newsletter.html') }}" class="dropdown-item">Hero Newsletter</a>
                <a  href="{{ URL('assan/hero-signup.html') }}" class="dropdown-item">Form SignUp</a>
                <a  href="{{ URL('assan/hero-pricing.html') }}" class="dropdown-item">Form Pricing</a>
                <a  href="{{ URL('assan/hero-video-button.html') }}" class="dropdown-item">Video popup</a>
                <a  href="{{ URL('assan/hero-youtube-video.html') }}" class="dropdown-item">Youtube Video</a>
                <a  href="{{ URL('assan/hero-vimeo-video.html') }}" class="dropdown-item">Vimeo Video</a>
                <a  href="{{ URL('assan/hero-html5-video.html') }}" class="dropdown-item">HTML5 Video</a>
              </div>
              <div class="col-lg-6">
                <a  href="{{ URL('assan/hero-bg-shape.html') }}" class="dropdown-item">BG Shape</a>
                <a  href="{{ URL('assan/hero-bg-shape-2.html') }}" class="dropdown-item">BG Shape 2</a>
                <a  href="{{ URL('assan/hero-shape-image.html') }}" class="dropdown-item">Shape Image</a>
                <a  href="{{ URL('assan/hero-shape-image-2.html') }}" class="dropdown-item">Shape Image 2</a>
                <a  href="{{ URL('assan/hero-tiles.html') }}" class="dropdown-item">Image tiles</a>
                <a  href="{{ URL('assan/hero-media-player.html') }}" class="dropdown-item">Media Player </a>
                <a  href="{{ URL('assan/hero-illustration.html') }}" class="dropdown-item">Illustration</a>
                <a  href="{{ URL('assan/hero-typed-text.html') }}" class="dropdown-item">Typed Text</a>
                <a  href="{{ URL('assan/hero-text-outline.html') }}" class="dropdown-item">Text outline</a>
                <a  href="{{ URL('assan/hero-slider-swiper.html') }}" class="dropdown-item">Swiper slider</a>
                <a  href="{{ URL('assan/hero-slider-master.html') }}" class="dropdown-item">Master Slider</a>
                <a  href="{{ URL('assan/hero-slider-master-alt.html') }}" class="dropdown-item">Master Slider Alt</a>
                <a  href="{{ URL('assan/hero-particles.html') }}" class="dropdown-item">Particles</a>
              </div>
            </div>
          </div>
          <!--/.End col-->

          <div class="col-lg-3">
            <h5 class="dropdown-header pt-3 mb-lg-2">
              Layouts</h5>
            <a class="dropdown-item" target="_blank" href="{{ URL('assan/layout-blank.html') }}">Blank</a>
            <a class="dropdown-item" href="{{ URL('assan/layout-full-width.html') }}">Full width</a>
            <a class="dropdown-item" href="{{ URL('assan/layout-sidebar-start.html') }}">Sidebar start</a>
            <a class="dropdown-item" href="{{ URL('assan/layout-sidebar-end.html') }}">Sidebar end</a>
            <a class="dropdown-item" href="{{ URL('assan/layout-footer-fixed.html') }}">Footer fixed</a>
            <a class="dropdown-item" href="{{ URL('assan/layout-sticky-sidebar.html') }}">Sticky Sidebar</a>
            <a class="dropdown-item" href="{{ URL('assan/layout-secondary-navbar.html') }}">Secondary Navbar</a>
            <div class="dropdown-divider mx-3"></div>
            <h5 class="dropdown-header mb-lg-2">
              Theme styles</h5>
            <a class="d-flex align-items-center dropdown-item" href="{{ URL('assan/theme-style-default.html') }}">
              <span class="d-inline-block align-middle me-2 rounded-circle shadow-lg lh-1">
                <svg width="16" height="16" class="align-middle" viewBox="0 0 10 10" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M0 5C0 2.23858 2.23858 0 5 0V0C7.76142 0 10 2.23858 10 5V5C10 7.76142 7.76142 10 5 10V10C2.23858 10 0 7.76142 0 5V5Z"
                    fill="#673de6" />
                </svg>
              </span> Theme Default
            </a>
            <a class="d-flex align-items-center dropdown-item" href="{{ URL('assan/theme-style-purple.html') }}">
              <span class="d-inline-block align-middle me-2 rounded-circle shadow-lg lh-1">
                <svg width="16" height="16" class="align-middle" viewBox="0 0 10 10" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M0 5C0 2.23858 2.23858 0 5 0V0C7.76142 0 10 2.23858 10 5V5C10 7.76142 7.76142 10 5 10V10C2.23858 10 0 7.76142 0 5V5Z"
                    fill="#8244cb" />
                </svg>
              </span> Theme Purple
            </a>
            <a class="d-flex align-items-center dropdown-item" href="{{ URL('assan/theme-style-teal.html') }}">
              <span class="d-inline-block align-middle me-2 rounded-circle shadow-lg lh-1">
                <svg width="16" height="16" class="align-middle" viewBox="0 0 10 10" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M0 5C0 2.23858 2.23858 0 5 0V0C7.76142 0 10 2.23858 10 5V5C10 7.76142 7.76142 10 5 10V10C2.23858 10 0 7.76142 0 5V5Z"
                    fill="#0b6b52" />
                </svg>
              </span> Theme teal
            </a>
            <a class="d-flex align-items-center dropdown-item" href="{{ URL('assan/theme-style-pink.html') }}">
              <span class="d-inline-block align-middle me-2 rounded-circle shadow-lg lh-1">
                <svg width="16" height="16" class="align-middle" viewBox="0 0 10 10" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M0 5C0 2.23858 2.23858 0 5 0V0C7.76142 0 10 2.23858 10 5V5C10 7.76142 7.76142 10 5 10V10C2.23858 10 0 7.76142 0 5V5Z"
                    fill="#d7347f" />
                </svg>
              </span> Theme Pink
            </a>
            <a class="d-flex align-items-center dropdown-item" href="{{ URL('assan/theme-style-green.html') }}">
              <span class="d-inline-block align-middle me-2 rounded-circle shadow-lg lh-1">
                <svg width="16" height="16" class="align-middle" viewBox="0 0 10 10" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M0 5C0 2.23858 2.23858 0 5 0V0C7.76142 0 10 2.23858 10 5V5C10 7.76142 7.76142 10 5 10V10C2.23858 10 0 7.76142 0 5V5Z"
                    fill="#3d9c40" />
                </svg>
              </span> Theme Green
            </a>
            <a class="d-flex align-items-center dropdown-item" href="{{ URL('assan/theme-style-serif.html') }}">
              <span class="flex-center font-serif width-1x small height-1x me-2 rounded-circle shadow-lg lh-1">
                s
              </span> Theme Serif
            </a>

            <a class="d-flex align-items-center dropdown-item" href="{{ URL('assan/theme-style-orange.html') }}">
              <span class="d-inline-block align-middle me-2 rounded-circle shadow-lg lh-1">
                <svg width="16" height="16" class="align-middle" viewBox="0 0 10 10" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M0 5C0 2.23858 2.23858 0 5 0V0C7.76142 0 10 2.23858 10 5V5C10 7.76142 7.76142 10 5 10V10C2.23858 10 0 7.76142 0 5V5Z"
                    fill="#e87529" />
                </svg>
              </span>Theme Orange
            </a>
            <a class="d-flex align-items-center dropdown-item" href="{{ URL('assan/theme-style-rtl.html') }}">
              <span class="flex-center fw-bold bg-success text-white width-1x small height-1x me-2 rounded-circle shadow-lg lh-1">
                R
              </span> Theme RTL
            </a>
          </div>
          <!--/.End col-->
        </div>
      </div>
    </div>
  </li>
  <!--end:features-->

  <!--begin:demos-->
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle {{ $page === 'demos' ? 'active' : '' }}" href="{{ URL('assan/#') }}" role="button"
      data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Demos
    </a>
    <div class="dropdown-menu p-lg-3 dropdown-menu-end dropdown-menu-xs">
      <a class="dropdown-item" target="_blank" href="{{ URL('assan/demo-shop.html') }}">
        E-commerce
      </a>
      <a class="dropdown-item" target="_blank" href="{{ URL('assan/demo-one-page.html') }}">
        One Page
      </a>
      <a class="dropdown-item" target="_blank" href="{{ URL('assan/demo-real-estate.html') }}">
        Real estate
      </a>
      <a class="dropdown-item" target="_blank" href="{{ URL('assan/demo-jobs.html') }}">
        Jobs
      </a>
      <a class="dropdown-item" target="_blank" href="{{ URL('assan/demo-event-landing.html') }}">
        Event Landing
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" target="_blank" href="{{ URL('assan/demo-rtl.html') }}">
        RTL Starter
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" target="_blank" href="{{ URL('assan/https://uigator.com/assan/5.1/admin-dashboard/') }}">
        Admin Dashboard
      </a>
      <a class="dropdown-item" target="_blank" href="{{ URL('assan/https://uigator.com/assan/5.1/nft-marketplace/') }}">
        NFT Marketplace
      </a>
      <a class="dropdown-item" target="_blank" href="{{ URL('assan/https://uigator.com/assan/5.1/blog-magazine/index.html') }}">
      Blog Magazine
      </a>
      <!--footer-->
      <div class="p-3">
        <div class="row">
          <div class="col-12 d-flex align-items-center justify-content-center">

            <span class="flex-grow-1 small text-body-secondary">Many more demos
              coming soon...</span>
          </div>
        </div>
      </div>
    </div>
  </li>
  <!--end:Pages-->
</ul>
<!--end:Navbar items-->
