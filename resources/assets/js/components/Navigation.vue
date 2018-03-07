<template>
<nav class="navbar navbar-inverse navbar-fixed-top sym-navbar-top sym-nav-white">
  <div class="container-fluid">
    
    <div class="navbar-header">

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sym-scrollspy" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand sym-scroll" href="/"></a>
      <img src="/images/symphony-logo-nav-light.svg" style="display: none;">

    </div>

    <div class="collapse navbar-collapse" id="sym-scrollspy">

      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Product <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Messaging and Productivity</a></li>
            <li><a href="#">Security and Compliance</a></li>
            <li><a href="#">App Directory</a></li>
            <li><a href="#">Download</a></li>
            <li><a href="#">Pricing</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Solutions <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Financial Services</a></li>
            <li><a href="#">&rsaquo;&nbsp;&nbsp;&nbsp;Sales &amp; Trading</a></li>
            <li><a href="#">&rsaquo;&nbsp;&nbsp;&nbsp;Analysts</a></li>
            <li><a href="#">&rsaquo;&nbsp;&nbsp;&nbsp;Operations</a></li>
            <li><a href="#">&rsaquo;&nbsp;&nbsp;&nbsp;Portfolio Managers</a></li>
            <li><a href="#">&rsaquo;&nbsp;&nbsp;&nbsp;Executives</a></li>
            <li><a href="#">&rsaquo;&nbsp;&nbsp;&nbsp;Legal</a></li>
            <li><a href="#">&rsaquo;&nbsp;&nbsp;&nbsp;Hedge Funds</a></li>
            <li><a href="#">Insurance</a></li>
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Company <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Press</a></li>
            <li><a href="/events">Events</a></li>
            <li><a href="#">Organization</a></li>
            <li><a href="#">Careers</a></li>
            <li><a href="#">Vision</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </li>

        <li><a href="/blog">Blog</a></li>

        <li><a href="#" data-sym-event-action="Clicked Sign In" data-sym-event-category="External Links">Sign In</a></li>

        <li id="sym-nav-signup">
          <div class="btn-group btn-block">
            <a href="#" class="btn btn-block btn-default-ghost" data-sym-event-action="Clicked Sign Up (Top Nav)" data-sym-event-category="External Links">Try it Now</a>
          </div>
        </li>

      </ul>
    </div>

  </div>
</nav>
</template>

<script>
    export default {
        name: 'Navigation'
    }
</script>
