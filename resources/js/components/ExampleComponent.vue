<template>
  <div class="d-inline-flex ">
    <button  type="button" data-bs-toggle="modal"
      data-bs-target="#staticBackdropCreated" class="d-inline-flex col btn btn-primary m-3">
      <i class="bi bi-person-add"></i>Crear Usuario
    </button>
  </div>
  <div class="table-responsive">
    <table class="table table-hover table-bordered" id="sampleTable">
      <thead>
        <tr>
          <th>Id</th>
          <th>Foto</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Cédula</th>
          <th>Teléfono</th>
          <th>Fecha de Creación</th>
          <th>Aciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="estudiante in usuarios" :key="estudiante.id">
          <td>{{ estudiante.id }}</td>
          <td><img :src="estudiante.foto" alt="Foto" width="90"></td>
          <td>{{ estudiante.nombre }}</td>
          <td>{{ estudiante.apellido }}</td>
          <td>{{ estudiante.cedula }}</td>
          <td>{{ estudiante.telefono }}</td>
          <td>{{ new Date(estudiante.created_at).toLocaleDateString('en-US') }}</td>

          <td>
            <div class="d-inline-flex ">
              <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                class="d-inline-flex col btn btn-primary m-1">
                <i class="bi bi-eye me-2"></i>
              </button>

              <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit"
                class="d-inline-flex col btn btn-success m-1">
                <i class="bi bi-pen me-2"></i>
              </button>


              <button @click="swal" class="d-inline-flex col btn btn-danger m-1">
                <i class="bi bi-trash me-2"></i>
              </button>

            </div>

          </td>


        </tr>

      </tbody>
    </table>
  </div>
  <!-- created User -->
  <div class="modal fade" id="staticBackdropCreated" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h1 class="modal-title fs-5 " id="staticBackdropLabel">Crear Usuario</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div v-if="this.cargando" class="text-center">
            <div class="spinner-border mb-3 " style="width: 3rem; height: 3rem;" role="status">
            </div>
            <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
            </div>
          </div>
          <form>
            <div class=" d-grid col-6 mx-auto mb-3">
              <img v-if="this.foto" height="150" :src="this.foto"  id="fotoimg" class="img-thumbnail" alt="">
              <img v-else height="150"
                src="https://cdn3.iconfinder.com/data/icons/leto-user-group/64/__man_user_person-512.png"
                class="img-thumbnail" id="fotoimg">
            </div>
            <div class="input-group  mb-3">
              <label for="fristname" class="input-group-text"><i class="bi bi-person-fill"></i></label>
              <div class="col-sm-10 text-center">
                <input type="text" v-model="CrearUsuario.nombre" class="form-control" name="fristname"
                  placeholder="Ingrese su Nombre">
              </div>
            </div>
            <div class="input-group mb-3">
              <label for="lastname" class="input-group-text"><i class="bi bi-people-fill"></i></label>
              <div class="col-sm-10">
                <input type="text" v-model="CrearUsuario.apellido" class="form-control" id="nombre" name="lastname"
                  placeholder="Ingrese su apellido">
              </div>
            </div>
            <div class="input-group mb-3">
              <label for="cedula" class="input-group-text"><i class="bi bi-person-vcard-fill"></i></label>
              <div class="col-sm-10">
                <input type="text" v-model="CrearUsuario.cedula" class="form-control" id="cedula" name="cedula"
                  placeholder="Ingrese su número de cédula">
              </div>
            </div>
            <div class="input-group  mb-3">
              <label for="phone" class="input-group-text"><i class="bi bi-telephone-inbound-fill"></i></label>
              <div class="col-sm-10">
                <input type="text" v-model="CrearUsuario.telefono" class="form-control" id="telefono" name="phone"
                  placeholder="Ingrese su número de teléfono">
              </div>
            </div>
            <div class=" input-group mb-3">
              <span class="input-group-text"><i class="bi bi-camera-fill"></i></span>
              <div class="col-sm-10">
                <input v-on:change="previsualizarFoto"  type="file" accept="image/png, image/jpeg, image/gif"
                  class="form-control">

              </div>
            </div>

          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" @click.prevent="crear" class="btn btn-success" data-bs-dismiss="modal">Registrar</button>

        </div>
      </div>
    </div>
  </div>
  <!-- View to User -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h1 class="modal-title fs-5 " id="staticBackdropLabel">Vista Del Usuauario</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="text-center">
            <div class="spinner-border mb-3 " style="width: 3rem; height: 3rem;" role="status">
            </div>
            <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
            </div>
          </div>
          <form>
            <div class=" d-grid col-6 mx-auto mb-3">
              <img v-if="this.foto" height="150" :src="this.foto" id="fotoimg" class="img-thumbnail" alt="">
              <img v-else height="150"
                src="https://cdn3.iconfinder.com/data/icons/leto-user-group/64/__man_user_person-512.png"
                class="img-thumbnail" id="fotoimg">
            </div>
            <div class="input-group  mb-3">
              <label for="fristname" class="input-group-text"><i class="bi bi-person-fill"></i></label>
              <div class="col-sm-10 text-center">
                <input type="text" class="form-control " disabled v-model="CrearUsuario.nombre" id="nombre"
                  name="fristname" placeholder="Ingrese su Nombre">
              </div>
            </div>
            <div class="input-group mb-3">
              <label for="lastname" class="input-group-text"><i class="bi bi-people-fill"></i></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" disabled v-model="CrearUsuario.apellido" id="apellido"
                  name="lastname" placeholder="Ingrese su apellido">
              </div>
            </div>
            <div class="input-group mb-3">
              <label for="cedula" class="input-group-text"><i class="bi bi-person-vcard-fill"></i></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" disabled v-model="CrearUsuario.cedula" id="cedula" name="cedula"
                  placeholder="Ingrese su número de cédula">
              </div>
            </div>
            <div class="input-group  mb-3">
              <label for="phone" class="input-group-text"><i class="bi bi-telephone-inbound-fill"></i></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" disabled v-model="CrearUsuario.telefono" id="telefono"
                  name="phone" placeholder="Ingrese su número de teléfono">
              </div>
            </div>

          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>

        </div>
      </div>
    </div>
  </div>
  <!-- Edit to user -->
  <div class="modal fade" id="staticBackdropEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h1 class="modal-title fs-5 " id="staticBackdropLabel">Editar Usuauario</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div v-if="this.cargando" class="text-center">
            <div class="spinner-border mb-3 " style="width: 3rem; height: 3rem;" role="status">
            </div>
            <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
            </div>
          </div>
          <form>
            <div class=" d-grid col-6 mx-auto mb-3">
              <img v-if="this.foto" height="150" :src="this.foto" id="fotoimg" class="img-thumbnail" alt="">
              <img v-else height="150"
                src="https://cdn3.iconfinder.com/data/icons/leto-user-group/64/__man_user_person-512.png"
                class="img-thumbnail" id="fotoimg">
            </div>
            <div class="input-group  mb-3">
              <label for="fristname" class="input-group-text"><i class="bi bi-person-fill"></i></label>
              <div class="col-sm-10 text-center">
                <input type="text" v-model="CrearUsuario.nombre" class="form-control" name="nombre"
                  placeholder="Ingrese su Nombre">
              </div>
            </div>
            <div class="input-group mb-3">
              <label for="lastname" class="input-group-text"><i class="bi bi-people-fill"></i></label>
              <div class="col-sm-10">
                <input type="text" v-model="CrearUsuario.apellido" class="form-control" id="apellido" name="lastname"
                  placeholder="Ingrese su apellido">
              </div>
            </div>
            <div class="input-group mb-3">
              <label for="cedula" class="input-group-text"><i class="bi bi-person-vcard-fill"></i></label>
              <div class="col-sm-10">
                <input type="text" v-model="CrearUsuario.cedula" class="form-control" id="cedula" name="cedula"
                  placeholder="Ingrese su número de cédula">
              </div>
            </div>
            <div class="input-group  mb-3">
              <label for="phone" class="input-group-text"><i class="bi bi-telephone-inbound-fill"></i></label>
              <div class="col-sm-10">
                <input type="text" v-model="CrearUsuario.telefono" class="form-control" id="telefono" name="phone"
                  placeholder="Ingrese su número de teléfono">
              </div>
            </div>
            <div class=" input-group mb-3">
              <span class="input-group-text"><i class="bi bi-camera-fill"></i></span>
              <div class="col-sm-10">
                <input v-on:change="previsualizarFoto" type="file" accept="image/png, image/jpeg, image/gif"
                  class="form-control">

              </div>
            </div>

          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" @click.prevent="crear" class="btn btn-success" data-bs-dismiss="modal">Guardar</button>

        </div>
      </div>
    </div>
  </div>
</template>
  
<script>
import axios from 'axios';
import $ from 'jquery';


import DataTable from 'datatables.net-vue3';
import datatable from 'datatables.net-bs5';
import DataTablesCore from 'datatables.net';
import jszip from 'jszip';
import pdfmake from 'pdfmake/build/pdfmake';
import print from 'datatables.net-buttons-bs5'
import pdfFonts from "pdfmake/build/vfs_fonts";
import 'datatables.net-buttons/js/dataTables.buttons'
import 'datatables.net-buttons/js/buttons.html5'
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';






window.JSZip = jszip

DataTable.use(Swal)

DataTable.use(DataTablesCore);
DataTable.use(datatable);
DataTable.use(jszip);
DataTable.use(pdfmake);
DataTable.use(print);
DataTable.use(pdfFonts);









export default {
  data() {
    return {
      CrearUsuario: { foto: '', nombre: '', apellido: '', cedula: '', telefono: '' },
      usuarios: [],
      dataTable: null,
      pdfMake: pdfMake



    };
  },
  mounted() {
    this.getEstudiantes();
    this.pdfMake.vfs = pdfFonts.pdfMake.vfs;

    // const route = useRoute();
    // this.id = route.params.id;
    // this.url += '/' + this.id;

  },
  watch: {
    usuarios:'initializeDataTable',
    usuarios: function () {
      // Destruir la instancia DataTable existente y recrearla con los nuevos datos
      if (this.dataTable) {
        this.dataTable.destroy();
      }
      this.$nextTick(() => {
        this.initializeDataTable();
      });
    },
  },
  methods: {

    initializeDataTable() {
      this.dataTable = $('#sampleTable').DataTable({
        dom: "<'row'<'col-sm-12 mb-3 text-center'B>><'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6 'f>>" +
          "<'row'<'col-sm-12'tr>>" +
          "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 text-center col-md-7'p>>",
        buttons: [
          {
            "extend": "copyHtml5",
            "text": "Copiar",
            "titleAttr": "Copiar",
            "ClassName": "btn btn-secundary"
          },
          {
            "extend": "excelHtml5",
            "text": "Excel",
            "titleAttr": "exportar a excel",
            "className": "btn btn-success"
          },
          {
            "extend": "pdfHtml5",
            "text": "Pdf",
            "titleAttr": "exportar pdf",
            "className": "btn btn-danger"
          },


        ]

      });


    },

    getEstudiantes() {
      axios.get('http://127.0.0.1:8000/estudiantes/search').then((res) => {
        this.usuarios = res.data;
      });

    },
    crear() {
      event.preventDefault()
      var miFoto = document.getElementById("fotoimg");
      this.foto = miFoto.src;
      console.log(this.CrearUsuario);
      axios.post('http://127.0.0.1:8000/estudiantes', this.CrearUsuario)
    .then((res) => {
      this.getEstudiantes();
      $('#staticBackdropCreated').modal('hide');
      
      Swal.fire({
        title: '¡Felicidades!',
        text: 'Usuario Creado Exitosamente',
        icon: 'success',
        confirmButtonText: '¡Entendido!'
      });
      
         
    })
    .catch(() => {
      Swal.fire({
        title: '¡Error!',
        text: '500 (Error En Su Servidor)',
        icon: 'error',
        confirmButtonText: 'OK'
      });
     
    });

},
    previsualizarFoto(event) {
      var reader = new FileReader();
      reader.readAsDataURL(event.target.files[0]);
      reader.onload = () => {
        var miFoto = document.getElementById("fotoimg");
        miFoto.src = reader.result;
        this.foto = miFoto.src;

      }
     
    }
    
  },
};
</script>
  