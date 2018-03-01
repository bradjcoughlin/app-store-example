<template>
  <div class="container-fluid" id="sym-bottom">
    <div class="container">

      <div class="sym-menu">
        <a href="https://symphony.com/legal/privacy">Privacy Policy</a>
        <a href="https://symphony.com/legal/terms-of-service">Terms of Service</a>
        <a href="https://symphony.com/support" target="_blank">Support</a>
        <a href="https://symphony.com/developers">Developers</a>
        <a href="https://symphony.com/partners">Partners</a>
      </div>

      <div class="sym-social-icons">
        <a href="https://twitter.com/symphony" target="_blank" class="sym-twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a>
        <a href="https://www.facebook.com/SymphonyComm/" target="_blank" class="sym-facebook"><i class="fab fa-facebook" aria-hidden="true"></i></a>
        <a href="https://www.linkedin.com/company/symphonycomm" target="_blank" class="sym-linkedin"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
        <a href="https://www.youtube.com/channel/UCbTXcU2U3IOEuVeqKbdOXCA" target="_blank" class="sym-youtube"><i class="fab fa-youtube" aria-hidden="true"></i></a>
      </div>

      <p class="sym-copyright">Copyright © 2018 Symphony Communication Services, LLC. All Rights Reserved</p>

    </div>
  </div>
</template>

<script>
    export default {
        name: 'CardExpanded'
    }
</script>

<style scoped lang="scss">
#sym-bottom {
  text-align: center;
  padding-top: 60px;
  padding-bottom: 60px;
  background-color: #222;
  div.sym-menu {
    margin-bottom: 20px;
    a {
      color: #777;
      margin: 0 18px 0 0;
      @media (max-width: 767px) {
        display: block;
        margin-bottom: 20px;
      }
      transition: margin-bottom 0.8s;
      &:hover {
        text-decoration: none;
      }
    }
  }
  div.sym-social-icons {
    a {
      display: inline-block;
      /*color: #898989;*/
      color: #777;
      background-color: transparent;
      margin: 0 8px 0 0;
      width: 36px;
      height: 36px;
      line-height: 36px;
      font-size: 18px;
      border-radius: 0;
      &:hover {
        color: #fff;
        transition: color 0.2s;
        transition: background-color 0.4s;
      }
      &.sym-twitter:hover {
        background-color: #55acee;
      }
      &.sym-facebook:hover {
        background-color: #3b5998;
      }
      &.sym-linkedin:hover {
        background-color: #0077b5;
      }
      &.sym-youtube:hover {
        background-color: #e52d27;
      }
    }
  }
  p.sym-copyright {
    color: #777;
    margin-top: 20px;
    margin-bottom: 0;
  }
}
</style>