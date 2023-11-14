<template>
    <div class="row mt-3">
        <div class="col-lg-8 offset-lg-2">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Codigo</th>
                            <th>Contenido</th>
                            <th>Tipo</th>
                            <th>Proceso</th>
                            <th>Registro</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider" id="contenido">
                        <tr v-if="this.cargando">
                            <td colspan="9"><h3>cargando..</h3></td>
                        </tr>
                        <tr
                            v-else
                            v-for="(doc, i) in this.documentos"
                            :key="doc.id"
                        >
                            <td v-text="i + 1"></td>
                            <td v-text="doc.doc_id"></td>
                            <td v-text="doc.doc_nombre"></td>
                            <td v-text="doc.doc_codigo"></td>
                            <td v-text="doc.doc_contenido"></td>
                            <td v-text="doc.doc_id_tipo"></td>
                            <td v-text="doc.doc_id_proceso"></td>
                            <td
                                v-text="
                                    new Date(doc.created_at).toLocaleDateString(
                                        'en-US'
                                    )
                                "
                            ></td>
                            <td>
                                <router-link
                                    :to="{ path: 'vistaD/' + doc.doc_id }"
                                    class="btn btn-info"
                                >
                                    <i class="fa-solid fa-eye"></i>
                                </router-link>
                                &nbsp;
                                <router-link
                                    :to="{ path: 'editD/' + doc.doc_id }"
                                    class="btn btn-warning"
                                >
                                    <i class="fa-solid fa-edit"></i>
                                </router-link>
                                &nbsp;
                                <button
                                    class="btn btn-danger"
                                    v-on:click="
                                        eliminar(doc.doc_id, doc.doc_nombre)
                                    "
                                >
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { confirmar } from "../funciones";

export default {
    data() {
        return {
            documentos: null,
            cargando: true,
        };
    },
    mounted() {
        this.getDocumentos();
    },
    methods: {
        getDocumentos() {
            this.cargando = true;
            axios.get("http://127.0.0.1:8000/api/documentos").then((res) => {
                this.documentos = res.data;
                this.cargando = false;
            });
        },
        eliminar(id, nombre) {
            confirmar(
                "http://127.0.0.1:8000/api/documentos/",
                id,
                "Eliminar registro",
                "Deseas elimiar: " + nombre + " ?"
            );
            this.cargando = false;
        },
    },
};
</script>
