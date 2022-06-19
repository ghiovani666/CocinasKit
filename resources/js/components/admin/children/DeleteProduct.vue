<template>
  <v-row justify="center">
    <v-dialog persistent v-model="dialogDeleteProduct" max-width="400">
      <v-card>
        <v-card-title class="headline">Eliminar Producto</v-card-title>
        <v-card-text> Are you sure you want to delete? </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="green darken-1" text @click="hideDialog()"> No </v-btn>
          <v-btn color="red darken-1" text @click="DeleteMedida()"> Yes </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
export default {
  props: ["dialogDeleteProduct", "authUser", "id_product"],
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
    async DeleteMedida() {
      try {
        const res = await axios.post(
          "/api/delete_product",
          { id: this.id_product },
          this.config
        );
        if (res) {
          this.$parent.$emit("register_emit");
          this.$swal("Elimnado", "Se Elimino con exito", "success");
        }
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>