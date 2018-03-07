
<template>
  <div class="container-fluid">
    <div class="container">
      <div class="sym-display-table">
        <div class="sym-display-table-cell">
          <h1>App Directory</h1>
          <h5>Apps, bots, integrations, and partners</h5>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        name: 'Hero',
        props: ['title'],
        methods: {
            // no methods
        }
    }
</script>

<style scoped>
.container-fluid {
  color: #fff;
  background-color: #213f67;
  background-image: url('/images/fractals_2560.jpg');
  background-position: center;
  background-size: cover;
}
.container {
  height: 220px;
  position: relative;
}
.sym-display-table {
  height: 100%;
  float: none;
  display: table;
}
.sym-display-table-cell {
  display: table-cell;
  float: none;
  vertical-align: bottom;
  padding-bottom: 20px;
}
h1 {
  font-weight: 100;
}
h5 {
  text-transform: uppercase;
  font-weight: 100;
}
</style>