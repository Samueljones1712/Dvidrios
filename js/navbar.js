let urlActual = window.location.href;

const tabs = ["muro", "calculadora", "listaOrdenes", "inventario", "listaClientes", "perfil", "login"];

tabs.forEach(e => {
    /// Agregar .php y ver si lo contiene en la url
    if (urlActual.indexOf(e + ".php") !== -1) {
        /// Agregar tab- para hacer que coincida la Id
        setActive("tab-" + e);
    }

});

/// Funcion que asigna la clase active
function setActive(id) {
    document.getElementById(id).setAttribute("class", "navbar-item-activo");
}