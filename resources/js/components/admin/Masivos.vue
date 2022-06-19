<template>
  <v-card class="mx-auto" max-width="644" outlined>
    <v-col cols="12" sm="12">
      <v-select
        :items="listMenu"
        label="Menu"
        item-text="names"
        item-value="id_menu"
        v-model="dataCombo.id_menu"
        filled
      ></v-select>
    </v-col>

    <v-col cols="12" sm="12">
      <form ref="form">
        <div v-for="(line, index) in lines" :key="index">
          <v-row>
            <v-col cols="2">
              <v-text-field
                label="Ancho"
                outlined
                dense
                v-model="line.ancho"
              ></v-text-field>
            </v-col>
            <v-col cols="2">
              <v-text-field
                label="Alto"
                outlined
                dense
                v-model="line.alto"
              ></v-text-field>
            </v-col>
            <v-col cols="2">
              <v-text-field
                label="Fondo"
                outlined
                dense
                v-model="line.fondo"
              ></v-text-field>
            </v-col>
            <v-col cols="2">
              <v-text-field
                label="Largo"
                outlined
                dense
                v-model="line.largo"
              ></v-text-field>
            </v-col>
            <v-col cols="2" style="margin-top: 10px">
              <v-icon
                slot="append"
                color="red"
                v-if="index + 1 === lines.length"
                @click="addLine"
                >mdi-playlist-plus
              </v-icon>
              <v-icon slot="prepend" color="green" @click="removeLine(index)">
                mdi-delete-circle
              </v-icon>
            </v-col>
          </v-row>
        </div>
      </form>
    </v-col>

    <v-card-actions>
      <v-btn depressed color="primary" @click="registerMedidas()">
        Registrar
      </v-btn>
    </v-card-actions>
  </v-card>
</template>


<script>
export default {
  props: ["authUser"], //recibe la var del edit energi

  data() {
    return {
      //---------add-------
      config: {
        headers: {
          Authorization: "Bearer " + this.authUser.api_token,
          Accept: "application/json",
          "Content-Type": "application/json",
        },
      },
      listMenu: [],
      dataCombo: {
        id_menu: "",
      },
      line: {
        alto: "",
        ancho: "",
        fondo: "",
        largo: "",
      },
      //------------------
      lines: [],
      blockRemoval: true,
    };
  },
  watch: {
    lines() {
      this.blockRemoval = this.lines.length <= 1;
    },
  },
  created() {
    this.fetchMenu();
  },
  methods: {
    addLine() {
      this.lines.push({
        ancho: null,
        alto: null,
        fondo: null,
        largo: null,
      });
    },
    removeLine(lineId) {
      if (!this.blockRemoval) {
        this.lines.splice(lineId, 1);
      }
    },

    fetchMenu() {
      axios
        .get("/api/list_menu_filter", this.config)
        .then((res) => (this.listMenu = res.data))
        .catch((err) => console.log(err));
    },

    async registerMedidas() {
      let list = [];
      $.each(this.lines, function (key, value) {
        list.push({
          alto: value.alto,
          ancho: value.ancho,
          fondo: value.fondo,
          largo: value.largo,
        });
      });

      try {
        const res = await axios.post(
          "/api/masivo_insert_medidas",
          { id_menu: this.dataCombo.id_menu, data: list },
          this.config
        );
        if (res.status == 200) {
          this.$swal("Insertado", "Se inserto con exito", "success");
        }
      } catch (error) {
        alert("Complete los campos:"+error)
      }
    },
  },
  mounted() {
    this.addLine();
  },
};
</script>