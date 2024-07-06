<template>
<div>


<div class="modal show mt-5 p-3" id="exampleModal" tabindex="-1" style="display: block;" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body pt-5 pb-5">
        <p class="fs-1 text-center">😍</p>
        <h5 class="text-dark fw-light text-center">Preparing for you...</h5>
      </div>
    </div>
  </div>



</div>

<div class="modal-backdrop show"></div>

</div>
</template>

<script>
export default {
    name: 'loading'
}
</script>

<style scoped>
.loading {
    position: absolute;
    width: 100vw;
    height: 100vh;
}
.modal-backdrop {
    position: absolute;
}
</style>
