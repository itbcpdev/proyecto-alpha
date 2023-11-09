<template>
    <span>
        <Navbar />

        <div class="container">
            <CardResultLook
                :color_hex_1="color_hex_1"
                :color_hex_2="color_hex_2"
                :color_hex_3="color_hex_3"
                :description_text_1="description_text_1"
                :description_text_2="description_text_2"
                :description_text_3="description_text_3"
                :imagen_look="imagen_url"
                :look_saved="look_saved"
                :look_id="look_id"
            />
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <button @click="getOtherLooks" class="btn btn-blanco mb-3">
                        Generar otro look
                    </button>
                </div>
            </div>
        </div>
    </span>
</template>

<script>
import CardResultLook from "./components/CardResultLook.vue";
import Navbar from '../../shared/Navbar.vue';

export default {
    data() {
        return {
            appPath: process.env.MIX_APP_URL,
            look_id: "",
            color_hex_1: "",
            color_hex_2: "",
            color_hex_3: "",
            description_text_1: "",
            description_text_2: "",
            description_text_3: "",
            imagen_url: "",
            look_saved: false,
        };
    },
    components: {
        CardResultLook,
        Navbar
    },
    created: function () {
        this.getLookByUser();
    },
    methods: {
        getLookByUser() {
            axios.get(`${this.appPath + "/getLookByUser"}`).then((response) => {
                let responseDataLook = response.data;

                window.STORE = {
                    looks_id: [responseDataLook.data.id],
                };
                if (response.data.success == true) {
                    this.look_saved = responseDataLook.look_status;
                    this.look_id = responseDataLook.data.id;
                    this.color_hex_1 = responseDataLook.data.color_hex_1;
                    this.color_hex_2 = responseDataLook.data.color_hex_2;
                    this.color_hex_3 = responseDataLook.data.color_hex_3;
                    this.description_text_1 =
                        responseDataLook.data.description_text_1;
                    this.description_text_2 =
                        responseDataLook.data.description_text_2;
                    this.description_text_3 =
                        responseDataLook.data.description_text_3;
                    this.imagen_url = responseDataLook.data.imagen_url;
                }
            });
        },
        getOtherLooks() {
            let arrayOtherLooks = window.STORE.looks_id;
            axios
                .post(`${this.appPath + "/getOtherLooks"}`, {
                    looks_id: arrayOtherLooks,
                })
                .then((response) => {
                    let responseDataOtherLook = response.data;
                    arrayOtherLooks.push(responseDataOtherLook.data.id);
                    window.STORE.looks_id = arrayOtherLooks;
                    if (response.data.success == true) {
                        if (response.data.info == false) {
                            window.STORE.looks_id = [
                                responseDataOtherLook.data.id,
                            ];
                        }
                        this.look_id = responseDataOtherLook.data.id;
                        this.color_hex_1 =
                            responseDataOtherLook.data.color_hex_1;
                        this.color_hex_2 =
                            responseDataOtherLook.data.color_hex_2;
                        this.color_hex_3 =
                            responseDataOtherLook.data.color_hex_3;
                        this.description_text_1 =
                            responseDataOtherLook.data.description_text_1;
                        this.description_text_2 =
                            responseDataOtherLook.data.description_text_2;
                        this.description_text_3 =
                            responseDataOtherLook.data.description_text_3;
                        this.imagen_url = responseDataOtherLook.data.imagen_url;
                        this.look_saved = responseDataOtherLook.look_status;
                    }
                });
        },
        saveLookByUser() {
            axios.post(`${this.appPath + "/saveLookByUser"}`, {
                    look_id: this.look_id,
                })
                .then((response) => {
                    if (response.data.success == true) {
                        this.look_saved = response.data.look_status;
                    } else {
                        alert(response.data.message);
                    }
                });
        }
    },
    computed: {
        getStateSaveLook() {
            return this.look_saved
                ? "btn btn-blanco mb-3 look-guardado"
                : "btn btn-blanco mb-3 ";
        },
    },
};
</script>

<style></style>
