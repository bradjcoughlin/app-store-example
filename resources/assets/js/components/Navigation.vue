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

      <a class="navbar-brand sym-scroll" href="https://symphony.com"></a>
      <img src="/images/symphony-logo-nav-light.svg" style="display: none;">

    </div>

    <div class="collapse navbar-collapse" id="sym-scrollspy">

      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Product <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="https://symphony.com/product/messaging-and-productivity">Messaging and Productivity</a></li>
            <li><a href="https://symphony.com/product/security-and-compliance">Security and Compliance</a></li>
            <li><a href="/#/">App Directory</a></li>
            <li><a href="https://symphony.com/download">Download</a></li>
            <li><a href="https://symphony.com/product/pricing">Pricing</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Solutions <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="https://symphony.com/solutions">Financial Services</a></li>
            <li><a href="https://symphony.com/solutions/financial-services/sales-and-trading">&rsaquo;&nbsp;&nbsp;&nbsp;Sales &amp; Trading</a></li>
            <li><a href="https://symphony.com/solutions/financial-services/analysts">&rsaquo;&nbsp;&nbsp;&nbsp;Analysts</a></li>
            <li><a href="https://symphony.com/solutions/financial-services/operations">&rsaquo;&nbsp;&nbsp;&nbsp;Operations</a></li>
            <li><a href="https://symphony.com/solutions/financial-services/portfolio-managers">&rsaquo;&nbsp;&nbsp;&nbsp;Portfolio Managers</a></li>
            <li><a href="https://symphony.com/solutions/financial-services/executives">&rsaquo;&nbsp;&nbsp;&nbsp;Executives</a></li>
            <li><a href="https://symphony.com/solutions/financial-services/legal">&rsaquo;&nbsp;&nbsp;&nbsp;Legal</a></li>
            <li><a href="https://symphony.com/solutions/financial-services/hedge-funds">&rsaquo;&nbsp;&nbsp;&nbsp;Hedge Funds</a></li>
            <li><a href="https://symphony.com/solutions/insurance">&rsaquo;&nbsp;&nbsp;&nbsp;Insurance</a></li>
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Company <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="https://symphony.com/press/news">Press</a></li>
            <li><a href="https://symphony.com/events">Events</a></li>
            <li><a href="https://symphony.com/company/organization">Organization</a></li>
            <li><a href="https://symphony.com/company/careers">Careers</a></li>
            <li><a href="https://symphony.com/company/innovation-award">Innovation Award</a></li>
            <li><a href="https://symphony.com/contact-us">Contact Us</a></li>
          </ul>
        </li>

        <li><a href="https://symphony.com/blog">Blog</a></li>

        <li><a href="https://symphony.com/sign-in">Sign In</a></li>

        <li id="sym-nav-signup">
          <div class="btn-group btn-block">
            <a href="https://symphony.com/signup" class="btn btn-block btn-default-ghost">Try it Now</a>
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
