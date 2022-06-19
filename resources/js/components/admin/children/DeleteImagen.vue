<template>
  <v-row justify="center">
    <v-dialog persistent v-model="dialogDeleteImagen" max-width="400">
      <v-card>
        <v-card-title class="headline">Eliminar Imagen</v-card-title>
        <v-card-text> Are you sure you want to delete? </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="green darken-1" text @click="hideDialog()"> No </v-btn>
          <v-btn color="red darken-1" text @click="DeleteImagen()"> Yes </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
export default {
  props: ["dialogDeleteImagen", "authUser", "id_imagen"],
  data() {
    return {
      config: {
        headers: {
          Authorization: "Bearer " + this.authUser.api_token,
          Accept: "application/json",
          "Content-Type": "application/json",
        },
      },
    };
  },
  methods: {
    hideDialog() {
      this.$parent.$emit("hide_dialog");
    },
    async DeleteImagen() {
      try {
        const res = await axios.post(
          "/api/delete_imagen",
          { id_imagen: this.id_imagen },
          this.config
        );
        if (res) {
          this.$parent.$emit("register_medida");
          this.$swal("Elimnado", "Se Elimino con exito", "success");
        }
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>