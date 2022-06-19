<template>
  <v-row justify="center">
    <v-dialog persistent v-model="modalMedida" max-width="500">
      <v-card>
        <v-card-title class="regular">Gestionar Medida</v-card-title>
        <v-spacer></v-spacer>

        <v-container>
          <v-row>
            <v-col cols="12" sm="6">
              <v-text-field
                label="Ancho"
                outlined
                dense
                v-model="medida.ancho"
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="6">
              <v-text-field
                label="cm/mm/etc"
                outlined
                dense
                v-model="medida.unidad_ancho"
              ></v-text-field>
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="12" sm="6">
              <v-text-field
                label="Alto"
                outlined
                dense
                v-model="medida.alto"
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="6">
              <v-text-field
                label="cm/mm/etc"
                outlined
                dense
                v-model="medida.unidad_alto"
              ></v-text-field>
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="12" sm="6">
              <v-text-field
                label="Fondo"
                outlined
                dense
                v-model="medida.fondo"
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="6">
              <v-text-field
                label="cm/mm/etc"
                outlined
                dense
                v-model="medida.unidad_fondo"
              ></v-text-field>
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="12" sm="6">
              <v-text-field
                label="Largo"
                outlined
                dense
                v-model="medida.largo"
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="6">
              <v-text-field
                label="cm/mm/etc"
                outlined
                dense
                v-model="medida.unidad_largo"
              ></v-text-field>
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="12" sm="6">
              <v-text-field
                label="Precio"
                outlined
                dense
                v-model="medida.price"
              ></v-text-field>
            </v-col>
          </v-row>

          <v-row style="margin-top: unset !important">
            <v-card-title>Seleccione Apertura</v-card-title>
            <v-container fluid>
              <v-checkbox
                v-model="iderecha"
                label="Derecha"
                @change="check_1($event)"
              ></v-checkbox>
              <v-checkbox
                v-model="izquierda"
                label="Izquierda"
                @change="check_2($event)"
              ></v-checkbox>
              <v-checkbox
                v-model="doble"
                label="Doble"
                @change="check_3($event)"
              ></v-checkbox>
              <v-checkbox
                v-model="abatible"
                label="Abatible"
                @change="check_4($event)"
              ></v-checkbox>
              <v-checkbox
                v-model="extraible"
                label="Extraible"
                @change="check_5($event)"
              ></v-checkbox>
            </v-container>
          </v-row>

          <v-row style="margin-top: unset !important" v-if="this.isvalue == 2">
            <v-card-title>Seleccione Sub Imagen</v-card-title>
            <v-avatar size="avatarSize" style="overflow: unset !important">
              <img
                :src="url ? url : '/img/blankProfile.jpg'"
                alt="alt"
                class="w-50"
              />
            </v-avatar>

            <v-file-input
              v-model="filenames"
              label="Upload Image"
              filled
              prepend-icon="mdi-camera"
              @change="fileChanges"
              name="image"
              id="image"
              show-size
            ></v-file-input>
          </v-row>
        </v-container>

        <v-card-actions>
          <v-btn color="green darken-1" text @click="hideDialog()">
            Cancelar
          </v-btn>

          <v-btn
            color="green darken-1"
            text
            @click="UpdateMedida()"
            v-if="this.isvalue == 2"
          >
            Actualizar
          </v-btn>
          <v-btn color="green darken-1" text @click="registerMedida()" v-else>
            Registrar
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
export default {
  props: ["dialogMedida", "authUser", "id_imagen", "id_medida", "isvalue"], //recibe la var del edit energi
  data() {
    return {
      filenames: null,
      imageFile: "",
      url: "",

      iderecha: 0,
      izquierda: 0,
      doble: 0,
      abatible: 0,
      extraible: 0,

      medida: {
        ancho: "",
        alto: "",
        fondo: "",
        largo: "",
        price: "",

        unidad_ancho: "",
        unidad_alto: "",
        unidad_fondo: "",
        unidad_largo: "",
      },

      config: {
        headers: {
          Authorization: "Bearer " + this.authUser.api_token,
          Accept: "application/json",
          "Content-Type": "application/json",
        },
      },
    };
  },
  mounted() {},
  computed: {
    modalMedida() {
      if (this.dialogMedida) {
        if (this.isvalue == 2) {
          this.editMedida(this.id_medida);
        } else {
          //this.clearMedida();
          (this.iderecha = 0), (this.izquierda = 0);
          this.doble = 0;
          this.abatible = 0;
          this.extraible = 0;

          this.medida = "";
          this.medida = {
            unidad_ancho: "cm",
            unidad_alto: "cm",
            unidad_fondo: "cm",
            unidad_largo: "cm",
          };
        }
        return this.dialogMedida;
      } else {
        return false;
      }
    },
  },
  created() {},
  methods: {
    hideDialog() {
      this.$parent.$emit("hide_dialog"); // emite el cierre del modal
    },
    async editMedida(dataMedida) {
      (this.iderecha = dataMedida.apert_derecha),
        (this.izquierda = dataMedida.apert_izquierda);
      this.doble = dataMedida.apert_doble;
      this.abatible = dataMedida.apert_abatible;
      this.extraible = dataMedida.apert_extraible;

      this.medida = dataMedida;
    },

    check_1(e) {
      if (e) {
        this.iderecha = 1;
      } else {
        this.iderecha = 0;
      }
    },
    check_2(e) {
      if (e) {
        this.izquierda = 1;
      } else {
        this.izquierda = 0;
      }
    },
    check_3(e) {
      if (e) {
        this.doble = 1;
      } else {
        this.doble = 0;
      }
    },
    check_4(e) {
      if (e) {
        this.abatible = 1;
      } else {
        this.abatible = 0;
      }
    },
    check_5(e) {
      if (e) {
        this.extraible = 1;
      } else {
        this.extraible = 0;
      }
    },

    async registerMedida() {
      this.$swal({
        title: "Esta seguro de Registrar?",
        text: "Usted no prodra Revertir!",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar",
        showCloseButton: true,
        showLoaderOnConfirm: true,
      }).then((result) => {
        if (result.value) {
          try {
            const objects = Object.assign(this.medida, {
              id_imagen: this.id_imagen,
              derecha: this.iderecha,
              izquierda: this.izquierda,
              doble: this.doble,
              abatible: this.abatible,
              extraible: this.extraible,
            });

            const res = axios.post("/api/insert_medida", objects, this.config);
            if (res) {
              this.$swal("Registrado", "Se registro con exito", "success");
              this.$parent.$emit("register_medida"); //Envia el mensaje para que actualize la tabla
            }
          } catch (error) {
            console.log(error);
          }
        } else {
          this.$swal("Cancelado", "Se cancelo el Registro", "info");
        }
      });
    },

    async UpdateMedida() {
      this.$swal({
        title: "Esta seguro de Actualizar?",
        text: "Usted prodra Revertir!",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar",
        showCloseButton: true,
        showLoaderOnConfirm: true,
      }).then((result) => {
        if (result.value) {
          try {
            const objects = Object.assign(this.medida, {
              id_medida: this.id_medida.id_medida,
              derecha: this.iderecha,
              izquierda: this.izquierda,
              doble: this.doble,
              abatible: this.abatible,
              extraible: this.extraible,
            });

            const res = axios.post("/api/update_medida", objects, this.config);
            if (res) {
              this.$swal("Actualizado", "Se Actualizo con exito", "success");
              this.$parent.$emit("update_medida"); //Envia el mensaje para que actualize la tabla

              this.updateImagenSub()
            }
          } catch (error) {
            console.log(error);
          }
        } else {
          this.$swal("Cancelado", "Se cancelo la Actualizacion", "info");
        }
      });
    },

    fileChanges(e) {
      if (e) {
        this.imageFile = e;
        this.url = URL.createObjectURL(e);
      } else {
        this.url = "";
      }
    },

    updateImagenSub() {
      console.log(this.imageFile)

      const form = new FormData();
      form.append("id_medida", this.id_medida.id_medida);
      form.append("image", this.imageFile);

      axios
        .post("/api/update_imagen_sub", form, this.config)
        .then((res) => {
          if (res.data) console.log('Exitoso')
        })
        .catch((err) => console.log(err));
    },

  },
};
</script>