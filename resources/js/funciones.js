import { inject } from "vue";
const Swal = inject("$swal");

import axios from "axios";

export function mostrarAlerta(titulo, icono, foco = "") {
    if (foco != "") {
        document.getElementById(foco).focus();
    }

    Swal.fire({
        title: titulo,
        icon: icono,
        customClass: {
            confirmButton: "btn btn-primary",
            popup: "animated zoomIn",
        },
        buttonsStyling: false,
    });
}

export function confirmar(urlConSlash, id, titulo, mensaje) {
    let url = urlConSlash + id;
    const swalWithBootstrapButton = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success me-3",
            cancelButton: "btn btn-danger",
        },
    });

    swalWithBootstrapButton
        .fire({
            title: titulo,
            text: mensaje,
            icon: "question",
            showCancelButton: true,
            confirmButtonText: '<i class="fa-solid fa-check"></i> Si, Eliminar',
            cancelButtonText: '<i class="fa-solid fa-ban"></i> Cancelar',
        })
        .then((res) => {
            if (res.isConfirmed) {
                enviarSolicitud(
                    "DELETE",
                    { id: id },
                    url,
                    "Eliminado con exito"
                );
            } else {
                mostrarAlerta("Operacion cancelada", "info");
            }
        });
}

export function enviarSolicitud(metodo, parametros, url, mensaje) {
    axios({ method: metodo, url: url, data: parametros })
        .then(function (res) {
            console.log(res);
            let estado = res.status;
            if (estado == 200 || estado == 201) {
                mostrarAlerta(mensaje, "success");
                window.setTimeout(function () {
                    window.location.href = "/";
                }, 1000);
            } else {
                mostrarAlerta("No se logró la eliminacion", "error");
            }
        })
        .catch(function (error) {
            console.log(error);
            mostrarAlerta("Error de servidor", "error");
        });
}
