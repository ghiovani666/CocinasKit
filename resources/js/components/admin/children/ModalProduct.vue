<template>
  <v-row justify="center">
    <v-dialog persistent v-model="modalProduct" max-width="500">
      <v-card>
        <v-card-title class="regular">Gestionar Producto</v-card-title>

        <v-card-text>
          <v-col cols="12" sm="12">
            <v-select
              :items="listMenu"
              label="Menu"
              item-text="names"
              item-value="id_menu"
              v-model="dataCombo.id_menu"
              @change="selectCategory(`${dataCombo.id_menu}`)"
              filled
            ></v-select>
          </v-col>

          <v-col cols="12" sm="12">
            <v-select
              :items="listCategory"
              label="Categoria"
              item-text="names"
              item-value="id_cat"
              v-model="dataCombo.id_cate"
              @change="selectItem(`${dataCombo.id_cate}`)"
              filled
            ></v-select>
          </v-col>

          <v-col cols="12" sm="12">
            <v-select
              :items="listItem"
              label="Items"
              item-text="names"
              item-value="id_item"
              v-model="dataCombo.id_item"
              filled
            ></v-select>
          </v-col>

          <v-col cols="12" sm="12">
            <v-text-field
              label="Nombre"
              v-model="dataCombo.asunto"
            ></v-text-field>
          </v-col>

          <v-col cols="12" sm="12">
            <v-textarea
              outlined
              name="input-7-4"
              label="Descripcion"
              value=""
              v-model="dataCombo.descripcion"
            ></v-textarea>
          </v-col>
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn color="green darken-1" text @click="hideDialog()">
            Cancelar
          </v-btn>

          <v-btn
            color="green darken-1"
            text
            @click="UpdateProduct()"
            v-if="this.isvalue == 2"
          >
            Actualizar
          </v-btn>
          <v-btn color="green darken-1" text @click="registerProduct()" v-else>
            Registrar
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
export default {
  props: ["dialogProduct", "authUser", "dataProduct", "isvalue"], //recibe la var del edit energi
  data() {
    return {
      url: "",
      config: {
        headers: {
          Authorization: "Bearer " + this.authUser.api_token,
          Accept: "application/json",
          "Content-Type": "application/json",
        },
      },
      listMenu: [],
      listCategory: [],
      listItem: [],

      dataCombo: {
        id_menu: "",
        id_cate: "",
        id_item: "",
        descripcion: "",
        asunto: "",
      },
    };
  },
  computed: {
    modalProduct() {
      if (this.dialogProduct) {

        if (this.isvalue == 2) {
          this.dataCombo.id_menu = this.dataProduct.id_menu;
          // this.dataCombo.id_cate = this.dataProduct.id_cat;
          // this.dataCombo.id_item = this.dataProduct.id_item;
          this.selectCategory(this.dataProduct.id_menu);
          this.selectItem(this.dataProduct.id_cat);
          this.dataCombo.id_cate = this.dataProduct.id_cat;
          this.dataCombo.id_item = this.dataProduct.id_item;

          this.dataCombo.asunto = this.dataProduct.pro_name;
          this.dataCombo.descripcion = this.dataProduct.pro_info;
        } else {
          this.dataCombo = {
            id_menu: "",
            id_cate: "",
            id_item: "",
            descripcion: "",
            asunto: "",
          };
        }

        return this.dialogProduct;
      } else {
        return false;
      }
    },
  },
  created() {
    this.fetchMenu();
  },
  methods: {
    hideDialog() {
      this.$parent.$emit("hide_dialog"); // emite el cierre del modal
    },

    fetchMenu() {
      axios
        .get("/api/list_menu", this.config)
        .then((res) => (this.listMenu = res.data))
        .catch((err) => console.log(err));
    },

    selectCategory(id_menu) {
      axios
        .post("/api/list_category", { id_menu: id_menu }, this.config)
        .then((res) => (this.listCategory = res.data))
        .catch((err) => console.log(err));
    },
    selectItem(id_cat) {
      axios
        .post("/api/list_item", { id_cat: id_cat }, this.config)
        .then((res) => (this.listItem = res.data))
        .catch((err) => console.log(err));
    },

    registerProduct() {
      const object = {
        id_item: this.dataCombo.id_item,
        pro_info: this.dataCombo.descripcion,
        pro_name: this.dataCombo.asunto,
      };

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
          axios
            .post(
              "/api/register_product",
              JSON.parse(JSON.stringify(object)),
              this.config
            )
            .then((res) => {
              if (res.data.posts) {
                this.$swal("Registrado", "Se registro con exito", "success");

                this.$parent.$emit("register_emit"); //Envia el mensaje para que actualize la tabla
              }
            })
            .catch((err) => console.log(err));
        } else {
          this.$swal("Cancelado", "Se cancelo el Registro", "info");
        }
      });
    },

    UpdateProduct() {
      const object = {
        id_product: this.dataProduct.id,
        id_item: this.dataCombo.id_item,
        pro_info: this.dataCombo.descripcion,
        pro_name: this.dataCombo.asunto,
      };

      axios
        .post("/api/update_product", object, this.config)
        .then((res) => {
          if (res.data) this.$parent.$emit("register_emit");
          this.$swal("Actualizando", "Se Actualizo con exito", "success");
        })
        .catch((err) => console.log(err));
    },
  },
};
</script>