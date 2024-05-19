<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4>EDIT PRODUK</h4>
                        <hr>

                        <form @submit.prevent="update">
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label font-weight-bold">Nama Produk</label>
                                <input type="text" class="form-control" v-model="produk.nama_produk"
                                    placeholder="Masukkan Nama Produk" />
                                <!-- Validation -->
                                <div v-if="validation.nama_produk" class="mt-2 alert alert-danger">
                                    {{ validation.nama_produk[0] }}
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label font-weight-bold">Harga</label>
                                <input type="text" class="form-control" v-model="produk.harga"
                                    placeholder="Masukkan Harga" />
                                <!-- Validation -->
                                <div v-if="validation.harga" class="mt-2 alert alert-danger">
                                    {{ validation.harga[0] }}
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="kategori_id" class="form-label font-weight-bold">Kategori</label>
                                <select class="form-select" v-model="produk.kategori_id" placeholder="Pilih Kategori">
                                    <option value="" disabled>Pilih Kategori</option>
                                    <option v-for="kategori in kategoris" :key="kategori.id_kategori"
                                        :value="kategori.id_kategori">
                                        {{ kategori.nama_kategori }}
                                    </option>
                                </select>
                                <!-- Validation -->
                                <div v-if="validation.kategori_id" class="mt-2 alert alert-danger">
                                    {{ validation.kategori_id[0] }}
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="status_id" class="form-label font-weight-bold">Status</label>
                                <select class="form-select" v-model="produk.status_id" placeholder="Pilih Status">
                                    <option value="" disabled>Pilih Kategori</option>
                                    <option v-for="status in statuss" :key="status.id_status" :value="status.id_status">
                                        {{ status.nama_status }}
                                    </option>
                                </select>
                                <!-- Validation -->
                                <div v-if="validation.status_id" class="mt-2 alert alert-danger">
                                    {{ validation.status_id[0] }}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                            <router-link :to="{ name: 'produk.index' }" class="btn btn-secondary ms-2">KEMBALI</router-link>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { reactive, ref, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import axios from 'axios'

export default {
    name: 'ProdukEdit',

    setup() {

        //state produk
        const produk = reactive({
            nama_produk: "",
            harga: "",
            kategori_id: "",
            status_id: "",
        })

        //state validation
        const validation = ref([])

        //state kategoris
        const kategoris = ref([]);
        //state statuss
        const statuss = ref([]);

        //vue router
        const router = useRouter()

        //vue router
        const route = useRoute()

        //mounted
        onMounted(() => {

            //get API from Laravel Backend
            axios.get(`http://localhost:8000/api/produk/${route.params.id}`)
                .then(response => {

                    //assign state posts with response data
                    produk.nama_produk = response.data.data.nama_produk
                    produk.harga = response.data.data.harga
                    produk.kategori_id = response.data.data.kategori_id
                    produk.status_id = response.data.data.status_id

                }).catch(error => {
                    console.log(error.response.data)
                })

        })

        //load kategoris when component is mounted
        onMounted(() => {
            axios
                .get("http://localhost:8000/api/kategori") // Assuming there is an endpoint to fetch kategoris
                .then((response) => {
                    kategoris.value = response.data.data;
                })
                .catch((error) => {
                    console.log(error.response.data);
                });
        });
        //load statuss when component is mounted
        onMounted(() => {
            axios
                .get("http://localhost:8000/api/status") // Assuming there is an endpoint to fetch kategoris
                .then((response) => {
                    statuss.value = response.data.data;
                })
                .catch((error) => {
                    console.log(error.response.data);
                });
        });

        //method update
        function update() {

            let nama_produk = produk.nama_produk;
            let harga = produk.harga;
            let kategori_id = produk.kategori_id;
            let status_id = produk.status_id;

            axios.put(`http://localhost:8000/api/produk/${route.params.id}`, {
                nama_produk: nama_produk,
                harga: harga,
                kategori_id: kategori_id,
                status_id: status_id
            }).then(() => {

                //redirect ke produk index
                router.push({
                    name: 'produk.index'
                })

            }).catch(error => {
                //assign state validation with error 
                validation.value = error.response.data
            })

        }

        //return
        return {
            produk,
            validation,
            router,
            update,
            kategoris,
            statuss
        }

    }

}
</script>

<style>
body {
    background: lightgray;
}
</style>