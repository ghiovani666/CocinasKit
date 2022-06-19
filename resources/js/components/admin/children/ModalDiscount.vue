<template>
  <v-row justify="center">
    <v-dialog persistent v-model="modalDescuento" max-width="500">
      <v-card>
        <v-card-title class="regular">Reducir Precio</v-card-title>
        <v-spacer></v-spacer>

        <v-container>
          <v-row>
            <v-col cols="12" sm="6">
              <v-text-field
                label="Precio Descuento %"
                outlined
                dense
                v-model="precioDescuento"
              ></v-text-field>
            </v-col>
              <v-col cols="12" sm="6">
              <v-text-field
                label="Precio Aumento %"
                outlined
                dense
                v-model="precioAumento"
              ></v-text-field>
            </v-col>
          </v-row>
        </v-container>

        <v-card-actions>
          <v-btn color="green darken-1" text @click="hideDialog()">
            Cancelar
          </v-btn>

          <v-btn color="green darken-1" text @click="UpdateDescuento()">
            Actualizar
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
export default {
  props: ["dialogDescuento", "authUser", "id_menu", "objects"], //recibe la var del edit energi
  data() {
    return {
      precioDescuento: "",
       precioAumento: "",
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
    modalDescuento() {
      if (this.dialogDescuento) {
        this.precioDescuento = this.objects.porcentaje_desc;
         this.precioAumento = this.objects.porcentaje_aume;
        return this.dialogDescuento;
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

    async UpdateDescuento() {
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
            const res = axios.post(
              "/api/descuento_price",
              { id_menu: this.id_menu, desc_price: this.precioDescuento, aume_price: this.precioAumento },
              this.config
            );
            if (res) {
              this.$swal("Actualizado", "Se Actualizo con exito", "success");
              this.$parent.$emit("hide_dialog"); //Envia el mensaje para que actualize la tabla
            }
          } catch (error) {
            console.log(error);
          }
        } else {
          this.$swal("Cancelado", "Se cancelo la Actualizacion", "info");
        }
      });
    },
  },
};
</script>