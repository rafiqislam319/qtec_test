<template>
    <div class="container" :class="{ loading: loading }">
        <div class="row">
            <div class="col-lg-3 mb-4">
                <h1 class="mt-4">Filters</h1>

                <h3 class="mt-2">Roles</h3>
                <div class="form-check" v-for="(role, index) in roles">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        :value="role.id"
                        :id="'role' + index"
                        v-model="selected.roles"
                    />
                    <label class="form-check-label" :for="'role' + index">
                        {{ role.role }} ({{ role.roles_count }})
                    </label>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="row mt-4">
                <h1>All Users :</h1>
                <div class="col-lg-4 col-md-6 mb-4" v-for="userInfo in userInfo">
                
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">{{ userInfo.name }}</a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            roles: [],
            userInfo: [],
            loading: true,
            selected: {
                roles: [],
            },
        };
    },

    mounted() {
        this.loadRoles();
        this.loadUserInfos();
    },

    methods: {
        loadRoles: function () {
            axios
                .get("/api/user-roles", {
                    params: _.omit(this.selected, "roles"),
                })
                .then((response) => {
                    this.roles = response.data.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        loadUserInfos: function () {
            axios
                .get("/api/user-infos", {
                    params: this.selected,
                })
                .then((response) => {
                    this.userInfo = response.data.data;
                    this.loading = false;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
};
</script>
