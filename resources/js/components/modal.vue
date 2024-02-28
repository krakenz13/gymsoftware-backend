
<template>
<div class="d-inline-flex ">
              <button type="button" @click="showModalView " data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                class="d-inline-flex col btn btn-primary m-1">
                <i class="bi bi-eye me-2"></i>
              </button>

              <button type="button" @click="abrirModalEditar(estudiante) " data-bs-toggle="modal" data-bs-target="#staticBackdropEdit"
                class="d-inline-flex col btn btn-success m-1">
                <i class="bi bi-pen me-2"></i>
              </button>


              <button @click="showModalDelete"  class="d-inline-flex col btn btn-danger m-1">
                <i class="bi bi-trash me-2"></i>
              </button>

            </div>
            <teleport to="#app">
                <div v-show="showModalView">modal</div>
                <div v-show="abrirModalEditar">modal</div>
                <div v-show="showModalDelete">modal</div>

            </teleport>
</template>



<script setup>
import { ref } from 'vue';

const showModalView = ref(false);
const abrirModalEditar = ref(false);
const showModalDelete = ref(false);
</script>