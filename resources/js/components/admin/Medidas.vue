<template>
  <div>
    <v-container>
      <Toasts
        :rtl="true"
        :max-messages="7"
        :time-out="3000"
        :closeable="false"
      ></Toasts>

      <v-row class="mb-12">
        <v-col>
          <v-card class="pa-2" outlined tile>
            <v-btn
              class="mx-2"
              fab
              dark
              small
              color="primary"
              @click.stop="(dialogImagen = true), (isvalueImagen = 1)"
            >
              <v-icon dark> mdi-plus </v-icon>
            </v-btn>

            <v-simple-table>
              <template v-slot:default>
                <thead>
                  <tr>
                    <th class="text-left">Id</th>
                    <th class="text-left">Imagen</th>
                    <th class="text-left">Check</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="item in ArrayImagen" :key="item.id_imagen">
                    <td>{{ item.id_imagen }}</td>
                    <td>
                      <img :src="item.url_image" style="width: 60px" />
                    </td>
                    <td>{{ item.check }}</td>

                    <td>
                      <v-tooltip bottom>
                        <template v-slot:activator="{ on, attrs }">
                          <span v-bind="attrs" v-on="on">
                            <v-btn
                              @click.stop="
                                fetchMedidas(item.id_imagen),
                                  (id_imagen = item.id_imagen)
                              "
                            >
                              <v-icon color="black" small> mdi-magnify </v-icon>
                            </v-btn>
                          </span>
                        </template>
                        <span>Medida</span>
                      </v-tooltip>
                    </td>
                    <td>
                      <v-tooltip bottom>
                        <template v-slot:activator="{ on, attrs }">
                          <span v-bind="attrs" v-on="on">
                            <v-btn
                              @click.stop="
                                (dialogImagen = true),
                                  (id_imagen = item),
                                  (isvalueImagen = 2)
                              "
                            >
                              <v-icon color="black" small>
                                mdi-table-edit
                              </v-icon>
                            </v-btn>
                          </span>
                        </template>
                        <span>Editar</span>
                      </v-tooltip>
                    </td>
                    <td>
                      <v-tooltip bottom>
                        <template v-slot:activator="{ on, attrs }">
                          <span v-bind="attrs" v-on="on">
                            <v-btn
                              @click.stop="
                                (dialogDeleteImagen = true),
                                  (id_imagen = item.id_imagen)
                              "
                            >
                              <v-icon color="black" small>
                                mdi-delete-empty
                              </v-icon>
                            </v-btn>
                          </span>
                        </template>
                        <span>Eliminar</span>
                      </v-tooltip>
                    </td>
                  </tr>
                </tbody>
              </template>
            </v-simple-table>
          </v-card>
        </v-col>

        <v-col>
          <v-card class="pa-2" outlined tile>
            <v-btn
              v-if="isValueImagen"
              class="mx-2"
              fab
              dark
              small
              color="primary"
              @click.stop="(dialogMedida = true), (isvalue = 1)"
            >
              <v-icon dark> mdi-plus </v-icon>
            </v-btn>

            <v-simple-table>
              <template v-slot:default>
                <thead>
                  <tr>
                    <th class="text-left">Id</th>
                    <th class="text-left">Ancho</th>
                    <th class="text-left">Alto</th>
                    <th class="text-left">Fondo</th>
                    <th class="text-left">Largo</th>
                    <th class="text-left">Precio</th>
                  </tr>
                </thead>
                <tbody>
                  <div v-if="isValueMedida == false">
                    <v-alert color="red lighten-2" dark>
                      No hay medidas..{{
                        isValueImagen
                          ? "Agregue una Medida "
                          : "Seleccione una Imgen!"
                      }}
                    </v-alert>
                  </div>

                  <tr v-for="item in ArrayMedida" :key="item.id_medida" v-else>
                    <td>{{ item.id_medida }}</td>
                    <td>
                      <v-btn @click.stop="changeMedida(item.id_medida, 1)">
                        {{ item.ancho }}
                        <v-icon color="black" small> mdi-delete-empty </v-icon>
                      </v-btn>
                    </td>
                    <td>
                      <v-btn @click.stop="changeMedida(item.id_medida, 2)">
                        {{ item.alto }}
                        <v-icon color="black" small> mdi-delete-empty </v-icon>
                      </v-btn>
                    </td>
                    <td>
                      <v-btn @click.stop="changeMedida(item.id_medida, 3)">
                        {{ item.fondo }}
                        <v-icon color="black" small> mdi-delete-empty </v-icon>
                      </v-btn>
                    </td>
                    <td>
                      <v-btn @click.stop="changeMedida(item.id_medida, 4)">
                        {{ item.largo }}
                        <v-icon color="black" small> mdi-delete-empty </v-icon>
                      </v-btn>
                    </td>
                    <td>{{ item.price }}</td>
                    <td>
                      <v-tooltip bottom>
                        <template v-slot:activator="{ on, attrs }">
                          <span v-bind="attrs" v-on="on">
                            <v-btn
                              @click.stop="
                                (dialogMedida = true),
                                  (id_medida = item),
                                  (isvalue = 2)
                              "
                            >
                              <v-icon color="black" small>
                                mdi-table-edit
                              </v-icon>
                            </v-btn>
                          </span>
                        </template>
                        <span>Editar</span>
                      </v-tooltip>
                    </td>
                    <td>
                      <v-tooltip bottom>
                        <template v-slot:activator="{ on, attrs }">
                          <span v-bind="attrs" v-on="on">
                            <v-btn
                              @click.stop="
                                (dialogDeleteMedida = true),
                                  (id_medida = item.id_medida)
                              "
                            >
                              <v-icon color="black" small>
                                mdi-delete-empty
                              </v-icon>
                            </v-btn>
                          </span>
                        </template>
                        <span>Eliminar</span>
                      </v-tooltip>
                    </td>
                  </tr>
                </tbody>
              </template>
            </v-simple-table>
          </v-card>
        </v-col>
      </v-row>
    </v-container>

    <ModalImagen
      :dialogImagen="dialogImagen"
      :authUser="authUser"
      :isvalueImagen="isvalueImagen"
      :id_imagen="id_imagen"
    />
    <DeleteImagen
      :dialogDeleteImagen="dialogDeleteImagen"
      :authUser="authUser"
      :id_imagen="id_imagen"
    />
    <ModalMedida
      :dialogMedida="dialogMedida"
      :authUser="authUser"
      :id_imagen="id_imagen"
      :id_medida="id_medida"
      :isvalue="isvalue"
    />
    <DeleteMedida
      :dialogDeleteMedida="dialogDeleteMedida"
      :authUser="authUser"
      :id_medida="id_medida"
    />
  </div>
</template>

<script>
import ModalImagen from "./children/ModalImagen";
import ModalMedida from "./children/ModalMedida";
import DeleteMedida from "./children/DeleteMedida";
import DeleteImagen from "./children/DeleteImagen";

export default {
  components: {
    ModalImagen,
    ModalMedida,
    DeleteMedida,
    DeleteImagen,
  },
  props: ["authUser"],

  mounted() {
    this.$on("hide_dialog", () => {
      this.dialogMedida = false;
      this.dialogImagen = false;
      this.dialogDeleteMedida = false;
      this.dialogDeleteImagen = false;
    });

    this.$on("register_medida", () => {
      this.dialogMedida = false;
      this.dialogImagen = false;
      this.dialogDeleteImagen = false;
      this.fetchMedidas(this.id_imagen);
      this.fetchImages(this.$route.params.id);
    });

    this.$on("update_medida", () => {
      this.dialogMedida = false;
      this.fetchMedidas(this.id_imagen);
    });



    this.fetchImages(this.$route.params.id);
  },
  data() {
    return {
      isvalue: Number,
      isvalueImagen: Number,
      id_imagen: "",
      id_medida: Object,
      dialogImagen: false,
      dialogMedida: false,
      dialogDeleteMedida: false,
      dialogDeleteImagen: false,

      isValueMedida: false,
      isValueImagen: false,
      config: {
        headers: {
          Authorization: "Bearer " + this.authUser.api_token,
          Accept: "application/json",
        },
      },
      ArrayImagen: [],
      ArrayMedida: [],
    };
  },
  created() {},
  methods: {
    async fetchImages(id_product) {
      try {
        const res = await axios.post(
          "/api/list_images",
          { id_product: id_product },
          this.config
        );
        if (res) {
          this.ArrayImagen = res.data;
        }
      } catch (error) {
        console.log(error);
      }
    },

    async fetchMedidas(id_imagen) {
      this.isValueImagen = true;
      try {
        const res = await axios.post(
          "/api/list_medidas",
          { id_imagen: id_imagen },
          this.config
        );
        if (res) {
          if (res.data.length > 0) {
            this.isValueMedida = true;
            this.ArrayMedida = res.data;
          } else {
            this.isValueMedida = false;
          }
        }
      } catch (error) {
        console.log(error);
      }
    },

    async changeMedida(id_medida, valor) {
      try {
        const res = await axios.post(
          "/api/change_medida",
          { id_medida: id_medida, valor: valor },
          this.config
        );
        if (res) {
          this.$toast.success("Se elimino..!");
          this.fetchMedidas(this.id_imagen);
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