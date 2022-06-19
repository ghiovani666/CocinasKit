<template>
  <v-row justify="center">
    <v-dialog persistent v-model="modalImagen" max-width="500">
      <v-card>
        <v-card-title class="regular">Crear Imagen</v-card-title>

        <v-card-text>
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
            @change="fileChange"
            name="image"
            id="image"
            show-size
          ></v-file-input>

          <v-row style="margin-top: unset !important">
            <v-card-title>Primera Imagen?</v-card-title>
            <v-radio-group v-model="radio.check" row>
              <v-radio label="Si" :value="1"></v-radio>
              <v-radio label="No" :value="0"></v-radio>
            </v-radio-group>
          </v-row>

         

          <v-row
            style="margin-top: unset !important"
            v-if="this.isvalueImagen == 2"
          >
            <v-card-title>Tenga Color?</v-card-title>
            <v-radio-group v-model="radio.color" row>
              <v-radio label="Si" :value="1"></v-radio>
              <v-radio label="No" :value="0"></v-radio>
            </v-radio-group>
          </v-row>
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn color="green darken-1" text @click="hideDialog()">
            Cancelar
          </v-btn>

          <v-btn
            color="green darken-1"
            text
            @click="updateImagen()"
            v-if="this.isvalueImagen == 2"
          >
            Actualizar
          </v-btn>
          <v-btn color="green darken-1" text @click="registerImagen()" v-else>
            Registrar
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
export default {
  props: ["dialogImagen", "authUser", "isvalueImagen", "id_imagen"], //recibe la var del edit energi
  data() {
    return {
      row: null,
      filenames: null,
      radio: {
        check: "",
        color: "",
      },
      imageFile: "",

      url: "",
      config: {
        headers: {
          Authorization: "Bearer " + this.authUser.api_token,
          Accept: "application/json",
          "Content-Type": "multipart/form-data",
        },
      },
    };
  },
  computed: {
    modalImagen() {
      if (this.dialogImagen) {
        if (this.isvalueImagen == 2) {
          this.url = this.id_imagen.url_image;
          this.radio.check = this.id_imagen.check;

          // this.radio.derecha = this.id_imagen.derecha;
          // this.radio.izquierda = this.id_imagen.izquierda;
          // this.radio.doble = this.id_imagen.doble;
          // this.radio.abatible = this.id_imagen.abatible;

          this.filenames = null;
        } else {
          this.url = "";
          this.radio = {
            check: "",
            // derecha: 0,
            // izquierda: 0,
            // doble: 0,
            // abatible: 0,
          };
        }

        return this.dialogImagen;
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

    registerImagen() {
      const form = new FormData();
      form.append("id_product", this.$route.params.id);
      form.append("image", this.imageFile);
      form.append("check", this.radio.check);

      // form.append(
      //   "derecha",
      //   this.radio.derecha == null ? 0 : this.radio.derecha
      // );
      // form.append(
      //   "izquierda",
      //   this.radio.izquierda == null ? 0 : this.radio.izquierda
      // );
      // form.append("doble", this.radio.doble == null ? 0 : this.radio.doble);
      // form.append(
      //   "abatible",
      //   this.radio.abatible == null ? 0 : this.radio.abatible
      // );

      axios
        .post("/api/create_imagen", form, this.config)
        .then((res) => {
          if (res.data) this.$parent.$emit("register_medida");
          this.$swal("Registrado", "Se Registro con exito", "success");
        })
        .catch((err) => console.log(err));
    },

    updateImagen() {
      const form = new FormData();
      form.append("id_imagen", this.id_imagen.id_imagen);
      form.append("image", this.imageFile);
      form.append("check", this.radio.check);

      // form.append(
      //   "derecha",
      //   this.radio.derecha == null ? 0 : this.radio.derecha
      // );
      // form.append(
      //   "izquierda",
      //   this.radio.izquierda == null ? 0 : this.radio.izquierda
      // );
      // form.append("doble", this.radio.doble == null ? 0 : this.radio.doble);
      // form.append(
      //   "abatible",
      //   this.radio.abatible == null ? 0 : this.radio.abatible
      // );

      form.append("color", this.radio.color);
      axios
        .post("/api/update_imagen", form, this.config)
        .then((res) => {
          if (res.data) this.$parent.$emit("register_medida");
          this.$swal("Actualizando", "Se Actualizo con exito", "success");
        })
        .catch((err) => console.log(err));
    },

    fileChange(e) {
      if (e) {
        this.imageFile = e;
        this.url = URL.createObjectURL(e);
      } else {
        this.url = "";
      }
    },
  },
};
</script>