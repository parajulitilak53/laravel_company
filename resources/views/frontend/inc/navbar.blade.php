<nav id="navbar" class="navbar order-last order-lg-0">
    <ul>
      <li><a href="{{url('/')}}" class="active">Home</a></li>

      <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          <li><a href="{{url('/about')}}">About Us</a></li>
          <li><a href="{{url('/team')}}">Team</a></li>
          <li><a href="{{url('/testimonial')}}">Testimonials</a></li>
          <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
            <ul>
              <li><a href="#">Deep Drop Down 1</a></li>
              <li><a href="#">Deep Drop Down 2</a></li>
              <li><a href="#">Deep Drop Down 3</a></li>
              <li><a href="#">Deep Drop Down 4</a></li>
              <li><a href="#">Deep Drop Down 5</a></li>
            </ul>
          </li>
        </ul>
      </li>

      <li><a href="{{url('/service')}}">Services</a></li>
      <li><a href="{{url('/portfolio')}}">Portfolio</a></li>
      <li><a href="{{url('/pricing')}}">Pricing</a></li>
      <li><a href="{{url('/blog')}}">Blog</a></li>
      <li><a href="{{url('/contact')}}">Contact</a></li>

    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav><!-- .navbar -->