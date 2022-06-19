<template>
  <div>
    <v-app>
      <v-container grid-list-xs>
        <v-row
          class="flex-column"
          v-for="item in ArrayData"
          :key="item.id_menu"
        >
          <v-col class="d-flex child-flex">
            <v-card color="indigo lighten-2" dark tile flat>
              <v-btn
                @click.stop="(dialogDescuento = true),(objects = item), (id_menu = item.id_menu)"
              >
                <v-card-text
                  >{{ item.names }} : Descuento {{ item.porcentaje_desc }} % / Aumento {{ item.porcentaje_aume }} %</v-card-text >
              </v-btn>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-app>

    <ModalDiscount
      :dialogDescuento="dialogDescuento"
      :authUser="authUser"
      :id_menu="id_menu"
      :objects="objects"
    />
  </div>
</template>

<script>
import ModalDiscount from "./children/ModalDiscount";

export default {
  components: {
    ModalDiscount,
  },

  props: ["authUser"], //recibe la var del edit energi
  data() {
    return {
      dialogDescuento: false,
      id_menu: "",
       objects: "",
      ArrayData: [],
      config: {
        headers: {
          Authorization: "Bearer " + this.authUser.api_token,
          Accept: "application/json",
          "Content-Type": "application/json",
        },
      },
    };
  },
  mounted() {
    this.$on("hide_dialog", () => {
      this.dialogDescuento = false;
      this.fetchData();
    });
  },
  computed: {},
  created() {
    this.fetchData();
  },
  methods: {
    async fetchData() {
    
      try {
        const res = await axios.get("/api/list_menu", this.config);
        if (res) {
          this.ArrayData = res.data;
        }
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>

<style lang="scss" scoped>
</style>