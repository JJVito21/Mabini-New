{{-- @section('content')  --}}
{{-- desktop navbar --}}
<section class="hidden md:block desktop fixed z-[99] top-0">
    <nav id="desktop">
        <div class="flex flex-col">
            {{-- styled on scroll --}}
            <a href="homepage_management" id="schoolName" class=" bg-neutral-100 flex justify-center items-center h-[6rem] w-screen py-4 gap-2">
                <img src="{{ URL('images/logo2.png') }}" alt="logo" class="w-16">
                <h3 class="text-neutral-800 font-bold font-kaisei text-lg md:text-xl uppercase tracking-wider">Mabini Farm School
                </h3>
            </a>
            {{-- end of styled on scroll --}}
            <div class=" bg-[#044D0B] 
           w-screen py-2 navlinks font-kaisei text-neutral-100 text-lg relative flex justify-center items-center ">
            <div class="col ms-10 flex justify-start">    
                 <a class=" hover:text-[#E9AC32] transition duration-300 mx-3" href="/homepage_management">Home</a>
                 <a class=" hover:text-[#E9AC32] transition duration-300 mx-3" href="/memo_management">Memo</a>
                 <a class=" hover:text-[#E9AC32] transition duration-300 mx-3" href="/programs_management">Programs</a>
                 <a class=" hover:text-[#E9AC32] transition duration-300 mx-3" href="/procurement_management">Procurement</a>
                 <a class=" hover:text-[#E9AC32] transition duration-300 mx-3" href="/faculty_management">Faculty</a>
             </div>
             <div class="col flex justify-end md:me-10 gap-x-6 ">
                 <a href="/message_management" class="hover:text-[#E9AC32]"><i class="fa-regular fa-envelope text-xl"></i></a>
                 <a class="nav-link dropdown-toggle hover:text-[#E9AC32]" href="#" role="button" data-bs-toggle="dropdown"
                 aria-expanded="false">
                 {{ Auth::user()->name }}
             </a>
             <ul class="dropdown-menu font-sans ">
                 <li>
                     <div class="mx-3 text-lime-700">{{ Auth::user()->email }}</div>
                 </li>
                 
                 <li>
                 <a class="dropdown-item font-medium" href="{{ route('profile.edit') }}">
                         {{ __('Profile') }}
                 </a></li>
                
                 </li>
                 <li>
                     <hr class="dropdown-divider">
                 </li>
                 <li>
                    <div class="dropdown-item ">
                        <form method="POST" action="{{ route('logout') }}" class="">
                            @csrf

                            <a class="text-red-600  font-bold " href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                        </a>
                        </form>
                    </div>
                </li>
            </ul>   
            </div>
            </div>
        </div>
    </nav>
</section>

{{-- mobile sidebar --}}
<section class="block md:hidden z-[99]">

    <nav class="navbar bg-body-tertiary fixed-top navlinks shadow-md ">
        <div class="container-fluid">
            <a href="homepage_management" class="flex"> <img src="{{ URL('images/logo2.png') }}" alt="logo"
                    class="w-16 ">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header text-success">
                    <h5 class="fw-bold" id="offcanvasNavbarLabel">MABINI FARM SCHOOL</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">


                        <li class="nav-item"><a class="nav-link font-kaisei hover:text-[#E9AC32] transition duration-300 text-sm"
                                href="homepage_management">Home</a>
                        </li>
                        <li class="nav-item"><a class="nav-link font-kaisei hover:text-[#E9AC32] transition duration-300 text-sm"
                                href="memo_management">Memo</a>
                        </li>
                        <li class="nav-item"><a class="nav-link font-kaisei hover:text-[#E9AC32] transition duration-300 text-sm"
                                href="programs_management">Programs</a>
                        </li>
                        <li class="nav-item"><a class="nav-link font-kaisei hover:text-[#E9AC32] transition duration-300 text-sm"
                            href="procurement_management">Procurement</a>
                        </li>
                        <li class="nav-iten">
                        <a href="message_management" class="nav-link font-kaisei hover:text-[#E9AC32] transition duration-300 text-sm">Messages</a>
                        </li>
                        <div class="dropdown mt-3">
                            <button class="btn dropdown-toggle ms-[-12px] font-kaisei" type="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}

                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="mx-3 text-lime-700">{{ Auth::user()->email }}</div>
                                </li>
                              <li>
                                <a class="dropdown-item font-medium"  href="{{ route('profile.edit') }}"">{{ __('Profile') }}</a></li>
                              <li>
                                <hr class="dropdown-divider mt-4">
                              </li>
                              <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
        
                                    <a class="text-red-600 font-bold ms-3" href="route('logout')"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                </a>
                                </form>
                              </li>
                            </ul>
                          </div>
                    </ul>

                </div>
            </div>
    </nav>

</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let lastScrollTop = 0;
        const nav = document.querySelector("#desktop");

        window.addEventListener("scroll", function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop) {
                // Scrolling down
                nav.classList.remove("slide-down");
                nav.classList.add("slide-up");
            } else {
                // Scrolling up
                nav.classList.remove("slide-up");
                nav.classList.add("slide-down");
            }

            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // For Mobile or negative scrolling
        });
    });
</script>

<style>
    /* Transition classes for sliding effect */
    .slide-up {
        transform: translateY(-6rem);
        transition: transform 0.3s ease-in-out;
    }

    .slide-down {
        transform: translateY(0);
        transition: transform 0.1s ease-in-out;
    }

    /* Initial state for the navigation bar */
    #schoolName {
        transform: translateY(0);
        transition: transform 0.3s ease-in-out;
    }
</style>
{{-- @endsection --}}
