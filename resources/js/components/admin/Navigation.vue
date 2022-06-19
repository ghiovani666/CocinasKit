<template>
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      app
      color="white"
      style="background: #e4e4e4 !important"
    >
      <v-list dense>
        <v-list-item link @click="homepage()">
          <v-list-item-action>
            <v-icon>mdi-arrow-left</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>
              <div class="subtitle-1">CocinasKits</div>
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link>
          <v-list-item-content>
            <v-list-item-title class="text-center">
              <v-avatar size="avatarSize">
                <img
                  src="/img/blankProfile.jpg"
                  alt="alt"
                  class="w-50"
                  v-if="!profile.image"
                />
                <img
                  :src="profile.image"
                  alt="alt"
                  class="w-50"
                  v-if="profile.image"
                />
              </v-avatar>

              <div class="regular mt-3 mb-5">
                {{ authuser.name }}
              </div>
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <router-link :to="{ name: 'dashboard' }">
          <v-list-item link>
            <v-list-item-action>
              <v-icon>mdi-home</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>Dashboard</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </router-link>

        <router-link :to="{ name: 'users' }" v-show="authuser.role === 'admin'">
          <v-list-item link>
            <v-list-item-action>
              <v-icon>mdi-account-group</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>Usuario</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </router-link>

        <router-link :to="{ name: 'product' }">
          <v-list-item link>
            <v-list-item-action>
              <v-icon>mdi-account-group</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>Productos</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </router-link>

        <router-link :to="{ name: 'descuento' }">
          <v-list-item link>
            <v-list-item-action>
              <v-icon>mdi-account-group</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>Descuento/Aumento</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </router-link>
        <router-link :to="{ name: 'masivos' }">
          <v-list-item link>
            <v-list-item-action>
              <v-icon>mdi-account-group</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>Masivos</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </router-link>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar app color="white">
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title> CocinasKits V02</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon>mdi-magnify</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-apps</v-icon>
      </v-btn>

      <v-menu transition="slide-x-transition" bottom right>
        <template v-slot:activator="{ on, attrs }">
          <v-btn icon>
            <v-icon v-bind="attrs" v-on="on">mdi-dots-vertical</v-icon>
          </v-btn>
        </template>

        <v-list>
          <v-list-item>
            <v-list flat>
              <v-subheader>
                <v-list-item>
                  <v-list-item-avatar>
                    <v-img
                      src="https://cdn.vuetifyjs.com/images/john.png"
                    ></v-img>
                  </v-list-item-avatar>
                </v-list-item>
              </v-subheader>

              <v-list-item-group v-model="selectedItem" color="primary">
                <router-link :to="{ name: 'profile' }">
                  <v-list-item>
                    <v-list-item-icon>
                      <v-icon>mdi-face-profile</v-icon>
                    </v-list-item-icon>

                    <v-list-item-content>
                      <v-list-item-title> Profile</v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                </router-link>

                <router-link :to="{ name: 'account' }">
                  <v-list-item>
                    <v-list-item-icon>
                      <v-icon>mdi-face-profile</v-icon>
                    </v-list-item-icon>

                    <v-list-item-content>
                      <v-list-item-title> Settings</v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                </router-link>

                <v-list-item @click="logout()">
                  <v-list-item-icon>
                    <v-icon>mdi-power</v-icon>
                  </v-list-item-icon>

                  <v-list-item-content>
                    <v-list-item-title> Logout</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </v-list-item-group>
            </v-list>
          </v-list-item>
        </v-list>
      </v-menu>
    </v-app-bar>

    <v-main>
      <router-view
        :authUser="authuser"
        :config="config"
        :user_profile="user_profile"
        :users_count="users_count"
        :posts_count="posts_count"
      ></router-view>
    </v-main>

    <v-footer color="white" app>
      <span>Inventario &copy; {{ new Date().getFullYear() }}</span>
    </v-footer>
  </v-app>
</template>

<script>
export default {
  props: ["authuser", "user_profile", "users_count", "posts_count"],
  data() {
    return {
      selectedItem: 1,
      items: [
        { text: "Real-Time", icon: "mdi-clock" },
        { text: "Audience", icon: "mdi-account" },
        { text: "Conversions", icon: "mdi-flag" },
      ],

      drawer: null,
      config: {
        headers: {
          Authorization: "Bearer " + this.authuser.api_token,
          Accept: "application/json",
        },
      },
      profile: JSON.parse(this.user_profile),
    };
  },
  methods: {
    logout() {
      axios
        .post("/logout")
        .then((res) => {
          console.log(res);
          window.location.href = "/";
        })
        .catch((err) => console.log(err));
    },
    homepage() {
      window.location.href = "/";
    },
  },
};
</script>