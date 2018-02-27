
<template>
  <div class="container-fluid">
    <div class="container">
      <div class="sym-display-table">
        <div class="sym-display-table-cell">
          <h1>Symphony Market</h1>
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
  background-color: #25354A;
}
.container {
  height: 180px;
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
}
h1 {
  font-weight: 100;
}
</style>