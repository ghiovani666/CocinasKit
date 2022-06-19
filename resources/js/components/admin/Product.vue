<template>
  <div>
    <v-card class="mx-auto" width="95%" v-show="authUser.role === '1'">
      <v-card-title>
        <v-spacer></v-spacer>
        <v-tooltip bottom>
          <template v-slot:activator="{ on, attrs }">
            <span v-bind="attrs" v-on="on">
              <v-btn
                class="mx-2"
                fab
                dark
                small
                color="primary"
                @click.stop="(dialogProduct = true), (isvalue = 1)"
              >
                <v-icon dark> mdi-plus </v-icon>
              </v-btn>
            </span>
          </template>
          <span>Nuevo Producto</span>
        </v-tooltip>

        <v-tooltip bottom>
          <template v-slot:activator="{ on, attrs }">
            <span v-bind="attrs" v-on="on">
              <v-btn
                class="mx-2"
                fab
                dark
                small
                color="primary"
                @click="filterShow = !filterShow"
              >
                <v-icon>mdi-filter-variant </v-icon>
              </v-btn>
            </span>
          </template>
          <span>Filtrar</span>
        </v-tooltip>

        <v-tooltip bottom>
          <template v-slot:activator="{ on, attrs }">
            <span v-bind="attrs" v-on="on">
              <v-btn class="mx-2" fab dark small color="primary">
                <v-icon>mdi-file-excel</v-icon>
              </v-btn>
            </span>
          </template>
          <span>Exportar</span>
        </v-tooltip>

        <v-tooltip bottom>
          <template v-slot:activator="{ on, attrs }">
            <span v-bind="attrs" v-on="on">
              <v-btn class="mx-2" fab dark small color="primary">
                <v-icon>mdi-printer</v-icon>
              </v-btn>
            </span>
          </template>
          <span>Imprimir</span>
        </v-tooltip>
      </v-card-title>
      <v-divider></v-divider>

      <v-alert
        :value="filterShow"
        color="#8091a5!important"
        dark
        icon="mdi-filter-outline"
        transition="scale-transition"
      >
        <v-form>
          <v-container>
            <v-row>
              <v-col cols="4" sm="4">
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
              <v-col cols="4" sm="4">
                <v-select
                  :items="listCategory"
                  label="Categoria"
                  item-text="names"
                  item-value="id_cat"
                  v-model="valueCategory"
                  @change="selectItem(valueCategory)"
                  filled
                ></v-select>
              </v-col>
              <v-col cols="4" sm="4">
                <v-select
                  :items="listItem"
                  label="Items"
                  item-text="names"
                  item-value="id_item"
                  v-model="valueItems"
                  filled
                ></v-select>
              </v-col>
            </v-row>
          </v-container>
        </v-form>
      </v-alert>

      <v-card-title>
        <v-spacer></v-spacer>
        <v-text-field
          v-model="search"
          append-icon="mdi-magnify"
          label="Search"
          single-line
          hide-details
        ></v-text-field>
      </v-card-title>

      <v-data-table
        :headers="headers"
        :items-per-page="5"
        :items="ArrayRequeri"
        :search="search"
      >
        <template v-slot:[`item.actions`]="{ item }">
          <v-row align="center" justify="center">
            <v-btn-toggle>
              <v-tooltip bottom>
                <template v-slot:activator="{ on, attrs }">
                  <span v-bind="attrs" v-on="on">
                    <v-btn @click.stop="RedirectMedidas(item.id)">
                      <v-icon color="black" small>
                        mdi-plus-circle-outline
                      </v-icon>
                    </v-btn>
                  </span>
                </template>
                <span>Agregar Imagen</span>
              </v-tooltip>

              <v-tooltip bottom>
                <template v-slot:activator="{ on, attrs }">
                  <span v-bind="attrs" v-on="on">
                    <v-btn
                      @click.stop="
                        (dialogProduct = true),
                          (dataProduct = item),
                          (isvalue = 2)
                      "
                    >
                      <v-icon color="red" small> mdi-table-edit </v-icon>
                    </v-btn>
                  </span>
                </template>
                <span>Editar</span>
              </v-tooltip>

              <v-tooltip bottom>
                <template v-slot:activator="{ on, attrs }">
                  <span v-bind="attrs" v-on="on">
                    <v-btn
                      @click.stop="
                        (dialogDeleteProduct = true), (id_product = item.id)
                      "
                    >
                      <v-icon color="red" small> mdi-delete </v-icon>
                    </v-btn>
                  </span>
                </template>
                <span>Delete</span>
              </v-tooltip>
            </v-btn-toggle>
          </v-row>
        </template>
      </v-data-table>
    </v-card>

    <v-container>
      <v-alert
        border="right"
        colored-border
        type="error"
        elevation="2"
        v-show="authUser.role !== '1'"
      >
        Unauthorized action.
      </v-alert>
    </v-container>

    <ModalProduct
      :dialogProduct="dialogProduct"
      :authUser="authUser"
      :dataProduct="dataProduct"
      :isvalue="isvalue"
    />
    <DeleteProduct
      :dialogDeleteProduct="dialogDeleteProduct"
      :authUser="authUser"
      :id_product="id_product"
    />
  </div>
</template>

<script>
import ModalProduct from "./children/ModalProduct";
import DeleteProduct from "./children/DeleteProduct";
import Medidas from "./Medidas";

export default {
  components: {
    ModalProduct,
    Medidas,
    DeleteProduct,
  },
  props: ["config", "authUser"],

  mounted() {
    this.$on("hide_dialog", () => {
      //Recibe el cierre del modal
      this.dialogProduct = false; //Cierra el modal de Eliminar
      this.dialogDeleteProduct = false; //Cierra el modal de Eliminar
    });

    //Escuchara el evento lara actualizar
    this.$on("register_emit", () => {
      this.dialogProduct = false;
      this.dialogDeleteProduct = false;
      this.fetchProduct();
    });
  },
  data() {
    return {
      caloriesList: [
        { text: "All", value: null },
        { text: "Only 237", value: 237 },
        { text: "Only 305", value: 305 },
      ],
      listMenu: [],
      listCategory: [],
      listItem: [],

      dataProduct: "",
      isvalue: "",

      dataCombo: {
        id_menu: "",
        id_cate: "",
        id_item: "",
        descripcion: "",
        asunto: "",
      },

      valueItems: null,
      valueCategory: null,

      id_product: 0,

      filterShow: false,
      search: "",
      dialogProduct: false, //Cierra el Modal Por defecto
      dialogDeleteProduct: false, //Cierra el Modal Por defecto

      showDeleteModal: false,
      ArrayRequeri: [],
      headers: [
        { text: "ID", value: "id" },
        { text: "ID_CAT", value: "id_cat", filter: this.filterCategory , align: ' d-none'},
        { text: "ID_ITEM", value: "id_item", filter: this.filterItem, align: ' d-none' },
        { text: "MENU", value: "menus" },
        { text: "CATEGORIA", value: "categoria" },
        { text: "ITEMS", value: "items" },
        { text: "NOMBRE", value: "pro_name" },
        { text: "DESCRIPCION", value: "pro_info" },
        { text: "CODIGO", value: "pro_code" },
        { text: "CANTIDAD IMAGEN", value: "1" },
        { text: "", value: "actions", sortable: false },
      ],
    };
  },
  created() {
    this.fetchProduct();
    this.fetchMenu();
  },
  methods: {
    filterCategory(value) {
      if (!this.valueCategory) {
        return true;
      }
      return value === this.valueCategory;
    },

    filterItem(value) {
      if (!this.valueItems) {
        return true;
      }
      return value === this.valueItems;
    },

    RedirectMedidas(id_product) {
      this.$router.push({ name: "medidas", params: { id: id_product } });
    },

    fetchProduct() {
      axios
        .get("/api/list_product", this.config)
        .then((res) => {
          this.ArrayRequeri = res.data;
        })
        .catch((err) => console.log(err));
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
      console.log(id_cat);
      axios
        .post("/api/list_item", { id_cat: id_cat }, this.config)
        .then((res) => (this.listItem = res.data))
        .catch((err) => console.log(err));
    },
  },
};
</script>

<style lang="scss" scoped>
</style>