const mongoose = require('mongoose');

const usuarioSchema = mongoose.Schema({
    nombre: String,
    apellido: String,
    nombre_usuario: String,
    rango_cliente: String,
    numero_compras: Number,
    pass: String,
});

module.exports = mongoose.model('Usuario', usuarioSchema);