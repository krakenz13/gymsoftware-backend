<template>

 
<!-- Modal function the user's created  -->
<div class="d-inline-flex ">
    <button type="button" @click="showModalCreated" data-bs-toggle="modal" data-bs-target="#staticBackdropCreated"
      class="d-inline-flex col btn btn-primary m-4">
      <i class="bi bi-person-add "> Crear Usuario</i>
    </button>
  </div>
<!-- Datatable User's -->
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
          <td><img v-if="estudiante.foto" style="width:100px !important;" :src="estudiante.foto" class="img-thumbnail">
                <img v-else style="height:80px !important;"
                  src="https://cdn3.iconfinder.com/data/icons/leto-user-group/64/__man_user_person-512.png"
                  class="img-thumbnail"></td>
          <td>{{ estudiante.nombre }}</td>
          <td>{{ estudiante.apellido }}</td>
          <td>{{ estudiante.cedula }}</td>
          <td>{{ estudiante.telefono }}</td>
          <td>{{ new Date(estudiante.created_at).toLocaleString('en-US') }}</td>
          

          <td>
            <div class="d-inline-flex ">
              <button type="button" @click="abrirModalEditar(estudiante) " data-bs-toggle="modal" data-bs-target="#staticBackdropView"
                class="d-inline-flex col btn btn-primary m-1">
                <i class="bi bi-eye me-2"></i>
              </button>

              <button type="button" @click="abrirModalEditar(estudiante) " data-bs-toggle="modal" data-bs-target="#staticBackdropCreated"
                class="d-inline-flex col btn btn-success m-1">
                <i class="bi bi-pen me-2"></i>
              </button>


              <button @click="DeleteUser(estudiante.id, estudiante.nombre)"  class="d-inline-flex col btn btn-danger m-1">
                <i class="bi bi-trash me-2"></i>
              </button>

              <button  class="d-inline-flex col btn btn-warning m-1" data-bs-toggle="modal" data-bs-target="#staticBackdropUser">
                <i class="bi bi-calendar me-2"></i>
              </button>

            </div> 
           
          </td>


        </tr>

      </tbody>
    </table>
  </div>

  <!-- created to User's -->
  <div class="modal fade" id="staticBackdropCreated" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h1 class="modal-title fs-5 " id="staticBackdropLabel">{{ titulo }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="text-center">
            <!-- puede ir un cargando para modal -->
          </div>
          <form>
            <div class=" d-grid col-6 mx-auto mb-3">
              <img v-if="foto" height="150" :src="this.foto" id="fotoimg" class="img-thumbnail" alt="">
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
                <input v-on:change="previsualizarFoto" type="file" accept="image/png, image/jpeg, image/gif"
                  class="form-control">

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" @click="crear" v-if="btnCrear" class="btn btn-success" data-bs-dismiss="modal">Registrar</button>
              <button type="submit" @click="editar" v-if="btnEditar" class="btn btn-success" data-bs-dismiss="modal">Editar</button>

            </div>

          </form>

        </div>

      </div>
    </div>
  </div>

  <!-- View to User's -->
  <div class="modal fade" id="staticBackdropView" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h1 class="modal-title fs-5 " id="staticBackdropLabel">Vista Del Usuario</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="text-center">

          </div>
          <form>
            <div class=" d-grid col-6 mx-auto mb-3">
              <img v-if="foto" height="150" :src="this.foto" id="fotoimg" class="img-thumbnail" alt="">
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
            <div class="input-group mb-3">
              <label for="duration" class="input-group-text"><i class="bi bi-clock-history"></i></label>
              <div class="col-sm-10">
                <input type="number" v-model="CrearUsuario.duracion" class="form-control" id="duration" name="duration"
                       placeholder="Duración (en meses)">
              </div>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="bi bi-calendar2-check"></i></span>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control" :value="fechaTermino" placeholder="Fecha de Término" disabled>
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

  <!-- update the User's with dateDuration -->
  <div class="modal fade" id="staticBackdropUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h1 class="modal-title fs-5 " id="staticBackdropLabel">Duración Mentoria</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="text-center">
            <!-- puede ir un cargando para modal -->
          </div>
          <form>
            <div class="input-group  mb-3">
              <label for="fristname" class="input-group-text"><i class="bi bi-person-fill"></i></label>
              <div class="col-sm-10 text-center">
                <input type="text"  class="form-control" name="fristname"
                  placeholder="Ingrese su Nombre">
              </div>
            </div>
            <div class="input-group  mb-3">
            <label for="fristname" class="input-group-text"><i class="bi bi-battery-full"></i></label>
            <div class="col-sm-10 text-center">
            <select class="form-select" aria-label="Default select example">
              <option selected>Seleccionar Tipo De Mentoria</option>
              <option value="1">Mes </option>
              <option value="2">Trimestre</option>
              <option value="3">año</option>
           </select>
          </div>

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Registrar</button>
              

            </div>


          </form>

        </div>

      </div>
    </div>
  </div>
 
</template>

<script>
import axios from 'axios';
import $ from 'jquery';
import Swal from 'sweetalert2';
import DataTable from 'datatables.net-vue3';
import datatable from 'datatables.net-bs5';
import DataTablesCore from 'datatables.net';
import jszip from 'jszip';
import pdfmake, { ID } from 'pdfmake/build/pdfmake';
import print from 'datatables.net-buttons-bs5';
import pdfFonts from 'pdfmake/build/vfs_fonts';
import 'datatables.net-buttons/js/dataTables.buttons';
import 'datatables.net-buttons/js/buttons.html5';
import 'sweetalert2/dist/sweetalert2.min.css';
import moment from 'moment';




window.JSZip = jszip;
DataTable.use(Swal);
DataTable.use(DataTablesCore);
DataTable.use(datatable);
DataTable.use(jszip);
DataTable.use(pdfmake);
DataTable.use(print);
DataTable.use(pdfFonts);


export default {
  components: {
    
    
    
  },
  data() {
    return {
      CrearUsuario: { nombre: '', apellido: '', cedula: '', telefono: '' },
      pdfMake: pdfMake,
      foto:'',
      usuarios: [],
      dataTable: null,
      btnCrear: false,
      btnEditar: false,
      idEstudiante: '',
      titulo:'',
      fechaInicio: null,
      duracion: null,




    };
    
  },
  
  mounted() {
    this.getEstudiantes();
    this.pdfMake.vfs = pdfFonts.pdfMake.vfs;

  },
  watch: {
    usuarios: 'initializeDataTable',

  },
  methods: {

    initializeDataTable() {
      if (this.dataTable) {
        this.dataTable.destroy();
      }
      this.$nextTick(() => {
        this.dataTable = $('#sampleTable').DataTable({
          dom: "<'row'<'col-sm-12 mb-3 text-center'B>><'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6 'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 text-center col-md-7'p>>",
          buttons: [
            {
              "extend": 'copyHtml5',
              "text": '<i class="bi bi-clipboard-check-fill"></i>Copiar',
              "titleAttr": 'Copiar',
              "ClassName": 'btn btn-primary'
            },
            {
              "extend": 'excelHtml5',
              "text": '<i class="bi bi-file-earmark-excel"></i> Excel',
              "titleAttr": 'exportar a excel',
              "className": 'btn btn-success d-flex'
            },
            {
              "extend": 'pdfHtml5',
              "text": '<i class="bi bi-file-earmark-pdf "></i> PDF',
              "titleAttr": 'exportar pdf',
              "className": 'btn btn-danger '
            },
            
          ]

        });
        
      });   
    },
    getEstudiantes() {
      axios.get('http://127.0.0.1:8000/estudiantes/search').then((res) => {
        this.usuarios = res.data;
      }).catch((error) => {
        console.error("Error al obtener estudiantes:", error);
      });

    },
    crear(event) {
      event.preventDefault()
      var miFoto = document.getElementById("fotoimg");
      this.foto = miFoto.src;

      axios.post('http://127.0.0.1:8000/estudiantes', this.CrearUsuario)
        .then((res) => {
          this.getEstudiantes();
          this.usuarios = res.data;
          window.location.reload();

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
   previsualizarFoto(event){
            var reader = new FileReader();
            reader.readAsDataURL(event.target.files[0]);
            reader.onload =function(){
                var miFoto = document.getElementById("fotoimg");
                miFoto.src = reader.result;
                this.foto = miFoto.src;

            }

   },    
    DeleteUser(id, nombre) {
      Swal.fire({
        title: '¿Estás seguro de eliminar a ' + nombre + '?',
        text: 'Esta acción no se puede deshacer',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar'
      }).then((result) => {
        if (result.isConfirmed) {
          axios.delete('http://127.0.0.1:8000/estudiantes/' + id)
            .then(() => {
              Swal.fire('¡Eliminado!', 'El usuario ha sido eliminado correctamente', 'success');
              this.getEstudiantes();
            })
            .catch(error => {
              console.error('Error al eliminar usuario:', error);
              Swal.fire('Error', 'Hubo un problema al intentar eliminar al usuario', 'error');
            });
        }
      });
   },
   showModalCreated(){
    this.CrearUsuario = { nombre: '', apellido: '', cedula: '', telefono: '' },
    this.titulo = ' Crear Usuario'
    this.btnCrear = true 
    this.btnEditar = false
    

   },
   abrirModalEditar(datos){
    this.CrearUsuario = { nombre: datos.nombre , apellido: datos.apellido, cedula: datos.cedula, telefono: datos.telefono },
    this.titulo = ' Editar Usuario'
    this.btnCrear = false
    this.btnEditar = true
    this.idEstudiante = datos.id
    $('#staticBackdropCreated').modal('show')
   },
   editar(){
    event.preventDefault()
      var miFoto = document.getElementById("fotoimg");
      this.foto = miFoto.src;

      axios.put('http://127.0.0.1:8000/estudiantes/'+ this.idEstudiante , this.CrearUsuario)
        .then((res) => {
          this.getEstudiantes();
          this.usuarios = res.data;
          window.location.reload();

          Swal.fire({
            title: '¡Felicidades!',
            text: 'Usuario Actualizado Exitosamente',
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
            const reader = new FileReader();
            const file = event.target.files[0];

            reader.onload = e => {
                var miFoto = document.getElementById("fotoimg");
                miFoto.src = e.target.result;
                this.foto = miFoto.src;
                // e.target.onloadstart(e, this.cargando = true)
                e.target.onloadend(e, this.cargando = false)
            }
            reader.readAsDataURL(event.target.files[0]);

   },
     
  }
   
}

</script>